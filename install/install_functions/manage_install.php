<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//manage_install.php
//MMXXVI MSCRATCH

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function php_version_compatible() {
if (version_compare(PHP_VERSION, '8.0.0', '>=')) {
return true;
} else {
return false;
}
}

function mysqli_enabled() {
if (extension_loaded('mysqli')) {
return true;
} else {
return false;
}
}

function fileinfo_enabled() {
if (extension_loaded('fileinfo')) {
return true;
} else {
return false;
}
}

function config_exists() {
if (file_exists(root_path . '/config/config.php')) {
return true;
} else {
return false;
}
}

function check_system_folders($system_folders) {
$missing_system_folders = array();
foreach ($system_folders as $system_folder) {
if (! is_dir($system_folder)) {
$missing_system_folders [] = $system_folder;
}
}
return $missing_system_folders;
}

function check_system_files($system_files) {
$missing_system_files = array();
foreach ($system_files as $system_file) {
if (! file_exists($system_file)) {
$missing_system_files [] = $system_file;
}
}
return $missing_system_files;
}

function check_if_folders_are_writable($writable_folders) {
$not_writable_folders = array();
foreach ($writable_folders as $writable_folder) {
if (! is_writeable($writable_folder)) {
$not_writable_folders [] = $writable_folder;
}
}
return $not_writable_folders;
}

function tables_exist($db) {

$tables = [
'blocklist',
'blog',
'blog_comments',
'custom_pages',
'error_log',
'files',
'login_attempts',
'mail_config',
'primary_nav',
'request_log',
'secondary_nav',
'settings',
'users',
'user_activity_log',
'user_profiles',
];

foreach ($tables as $table) {
$result = $db->query("SHOW TABLES LIKE '" . $db->real_escape_string($table) . "'");
if (! $result or $result->num_rows === 0) {
return false;
}
}
return true;
}

function administrator_already_exists($db) {
$administrator_user_level = "administrator";
$stmt = $db->prepare("SELECT user_id FROM users WHERE user_level = ?");
$stmt->bind_param('s', $administrator_user_level);
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows === 1) {
return true;
} else {
return false;
}
}

function email_config_exists($db) {
$mail_config_id = 1;
$stmt = $db->prepare("SELECT smtp_host, smtp_port, smtp_user, smtp_password, smtp_encryption, from_email, from_name FROM mail_config WHERE mail_config_id = ?");
$stmt->bind_param('i', $mail_config_id);
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows === 1) {
return true;
} else {
return false;
}
}

function settings_exist($db) {
$stmt = $db->prepare("SELECT setting_id FROM settings LIMIT 1");
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows >= 1) {
return true;
} else {
return false;
}
}

function create_config($text_install, $servername_form, $username_form, $db_password_form, $database_name_form) {

$create_config_errors = [];

if (empty($servername_form)) {
$create_config_errors []  = $text_install['message_create_config_server_name_missing'];
}

if (empty($username_form)) {
$create_config_errors []  = $text_install['message_create_config_username_missing'];
}

if (empty($db_password_form)) {
$create_config_errors []  = $text_install['message_create_config_db_password_missing'];
}

if (empty($database_name_form)) {
$create_config_errors []  = $text_install['message_create_config_db_name_missing'];
}

if (! empty($servername_form) && ! empty($username_form) && ! empty($db_password_form) && ! empty($database_name_form)) {
mysqli_report(MYSQLI_REPORT_OFF);
$db = @new mysqli($servername_form, $username_form, $db_password_form, $database_name_form);
if ($db->connect_error) {
$create_config_errors [] = $db->connect_error;
} else {
$db->close();
}
}

if (empty($create_config_errors)) {
$config_path = root_path . '/config';
$config_name = 'config.php';
$config  = "<?php\n";
$config .= "defined('CORE_LOADED') or die('Direct access to this file is restricted.');\n";
$config .= "//This file is part of PHPUC\n";
$config .= "//config.php\n";
$config .= "//MMXXVI MSCRATCH\n\n";
$config .= "define('SERVERNAME', '" . addslashes($servername_form) . "');\n";
$config .= "define('USERNAME', '" . addslashes($username_form) . "');\n";
$config .= "define('PASSWORD', '" . addslashes($db_password_form) . "');\n";
$config .= "define('DB_NAME', '" . addslashes($database_name_form) . "');\n";
file_put_contents($config_path. '/'. $config_name, $config);
return true;
} else {
return $create_config_errors;
}
}

function insert_sql_tables($text_install, $db) {

$insert_sql_tables_errors = array();

if (file_exists(install_folder . '/install.sql')) {
$sql_path = install_folder . '/install.sql';
} else {
$insert_sql_tables_errors [] = $text_install['message_insert_sql_tables_sql_file_missing'];
}

if (empty($insert_sql_tables_errors)) {
$sql_file = file_get_contents($sql_path);

if (! $db->multi_query($sql_file)) {
$insert_sql_tables_errors [] = $db->error;
}
do {
if ($result = $db->store_result()) {
$result->free();
}
} while ($db->more_results() && $db->next_result());

if (empty($insert_sql_tables_errors)) {
return true;
}
} else {
return $insert_sql_tables_errors;
}
}

function register_administrator($db, $text_install, $username_form, $user_password_form, $user_password_confirm_form, $user_email_form) {

$register_administrator_errors = array();

if (empty($username_form)) {
$register_administrator_errors [] = $text_install['message_register_administrator_no_username'];
}

if (empty($user_password_form)) {
$register_administrator_errors [] = $text_install['message_register_administrator_no_password'];
}

if (empty($user_password_confirm_form)) {
$register_administrator_errors [] = $text_install['message_register_administrator_no_password_confirmation'];
}

if (empty($user_email_form)) {
$register_administrator_errors [] = $text_install['message_register_administrator_no_email_address'];
}

if (! empty($username_form) && strlen($username_form) > 30) {
$register_administrator_errors [] = $text_install['message_register_administrator_username_length'];
}

if (! empty($username_form) && strlen($username_form) < 5) {
$register_administrator_errors [] = $text_install['message_register_administrator_username_short'];
}

if (! empty($username_form) && ! ctype_alnum($username_form)) {
$register_administrator_errors [] = $text_install['message_register_administrator_username_special_characters'];
}

if (! empty($user_password_form) && strlen($user_password_form) > 30) {
$register_administrator_errors [] = $text_install['message_register_administrator_password_length'];
}

if (! empty($user_password_form) && strlen($user_password_form) < 8) {
$register_administrator_errors [] = $text_install['message_register_administrator_password_short'];
}

if ($user_password_form !== $user_password_confirm_form) {
$register_administrator_errors [] = $text_install['message_register_administrator_password_no_match'];
}

if (! empty($user_email_form) && ! filter_var($user_email_form, FILTER_VALIDATE_EMAIL)) {
$register_administrator_errors [] = $text_install['message_register_administrator_email_address_invalid'];
}

$options = ['cost' => 12];
$hashed_user_password = password_hash($user_password_form, PASSWORD_BCRYPT, $options);

if (empty($register_administrator_errors)) {
$administrator_user_level = "administrator";
$email_verification_token = bin2hex(random_bytes(32));
$email_is_verified = 1;
$save_user = $db->prepare("INSERT INTO users(username, user_password, user_email, user_level, email_verification_token, email_is_verified, user_date) VALUES(?, ?, ?, ?, ?, ?, NOW())");
$save_user->bind_param('sssssi', $username_form, $hashed_user_password, $user_email_form, $administrator_user_level, $email_verification_token, $email_is_verified);
$save_user_result = $save_user->execute();
if ($save_user_result) {
$new_user_id = $save_user->insert_id;
$save_profile = $db->prepare("INSERT INTO user_profiles(user_id) VALUES(?)");
$save_profile->bind_param('i', $new_user_id);
$save_profile_result = $save_profile->execute();
if ($save_user_result && $save_profile_result) {
$registration_process_result = true;
} else {
$register_administrator_errors [] = $text_install['message_register_administrator_critical_error'];
}
$save_profile->close();
} else {
$register_administrator_errors [] = $text_install['message_register_administrator_critical_error'];
}
$save_user->close();
}

if (empty($register_administrator_errors)) {
return $registration_process_result;
} else {
return $register_administrator_errors;
}
}

function check_email_connection($db, $smtp_host_form, $smtp_port_form, $smtp_user_form, $smtp_password_form, $smtp_encryption_form, $text_install) {

$mail = new PHPMailer(true);

if ($smtp_encryption_form === "ssl") {
$smtp_encryption = PHPMailer::ENCRYPTION_SMTPS;
} elseif ($smtp_encryption_form === "tls") {
$smtp_encryption = PHPMailer::ENCRYPTION_STARTTLS;
} else {
return $text_install['message_check_email_connection_invalid_smtp'];
}

try {
$mail->isSMTP();
$mail->Host = $smtp_host_form;
$mail->Port = $smtp_port_form;
$mail->SMTPAuth = true;
$mail->Username = $smtp_user_form;
$mail->Password = $smtp_password_form;
$mail->SMTPSecure = $smtp_encryption;

$mail->Timeout = 10;

$mail->smtpConnect();
$mail->smtpClose();

return true;

} catch (Exception $e) {
return $e->getMessage();
}
}

function save_email_config($db, $smtp_host_form, $smtp_port_form, $smtp_user_form, $smtp_password_form, $smtp_encryption_form, $from_email_form, $from_name_form, $text_install) {

$create_email_config_errors = array();

if (empty($smtp_host_form)) {
$create_email_config_errors [] = $text_install['message_save_email_config_no_host'];
}

if (empty($smtp_port_form)) {
$create_email_config_errors [] = $text_install['message_save_email_config_no_port'];
}

if (empty($smtp_user_form)) {
$create_email_config_errors [] = $text_install['message_save_email_config_no_user'];
}

if (empty($smtp_password_form)) {
$create_email_config_errors [] = $text_install['message_save_email_config_no_password'];
}

if (empty($smtp_encryption_form)) {
$create_email_config_errors [] = $text_install['message_save_email_config_no_encryption'];
}

if (empty($from_email_form)) {
$create_email_config_errors [] = $text_install['message_save_email_config_no_from_email'];
}

if (empty($from_name_form)) {
$create_email_config_errors [] = $text_install['message_save_email_config_no_from_name'];
}

if (! empty($smtp_host_form) && ! empty($smtp_port_form) && ! empty($smtp_user_form) && ! empty($smtp_password_form) && ! empty($smtp_encryption_form) && ! empty($from_email_form) && ! empty($from_name_form)) {
$email_connection = check_email_connection($db, $smtp_host_form, $smtp_port_form, $smtp_user_form, $smtp_password_form, $smtp_encryption_form, $text_install);
if ($email_connection !== true) {
$create_email_config_errors [] = $email_connection;
}
}

if (empty($create_email_config_errors)) {
$stmt = $db->prepare("INSERT INTO mail_config(smtp_host, smtp_port, smtp_user, smtp_password, smtp_encryption, from_email, from_name) VALUES(?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param('sisssss', $smtp_host_form , $smtp_port_form, $smtp_user_form, $smtp_password_form, $smtp_encryption_form, $from_email_form, $from_name_form);
if ($stmt->execute()) {
$stmt->close();
return true;
} else {
$stmt->close();
return false;
}
} else {
return $create_email_config_errors;
}
}

function save_settings($db, $text_install, $settings_form) {

$save_settings_errors = array();

$allowed_keys_for_settings_form = array(
'page_title',
'system_message_title',
'footer_text',
'page_description',
'page_keywords',
'website_domain',
);

$hidden_settings = [
'security_question' => 'What is something nobody wants to be, but everyone will be?',
'security_question_answer' => 'old',
'disable_registration' => 'no',
'language' => 'en',
'maintenance_mode_enabled' => 'no',
'disable_contact_form' => 'no',
];

$settings_title = [
'page_title' => 'Page title',
'security_question' => 'Security question',
'security_question_answer' => 'Answer to the security question',
'system_message_title' => 'Title of the system message in the frontend',
'disable_registration' => 'Disable registration',
'footer_text' => 'Footer text',
'page_description' => 'Page description for search engines',
'page_keywords' => 'Keywords for search engines',
'language' => 'Language of the page',
'maintenance_mode_enabled' => 'Activate maintenance mode',
'disable_contact_form' => 'Disable the contact form',
'website_domain' => 'Website domain',
];

if (empty($settings_form)) {
$save_settings_errors [] = $text_install['message_save_settings_no_settings'];
}

foreach ($settings_form as $setting_key_form => $setting_value_form) {

if (! in_array($setting_key_form, $allowed_keys_for_settings_form)) {
$save_settings_errors [] = $text_install['message_save_settings_invalid_key'];
}

if (empty($setting_value_form)) {
$save_settings_errors [] = $text_install['message_save_settings_no_value'];
}

if (empty($setting_key_form)) {
$save_settings_errors [] = $text_install['message_save_settings_no_key'];
}
}

if (! empty($save_settings_errors)) {
return $save_settings_errors;
}

$complete_settings = array_merge($hidden_settings, $settings_form);

$stmt = $db->prepare("INSERT INTO settings(setting_title, setting_key, setting_value) VALUES(?, ?, ?)");

foreach ($complete_settings as $complete_setting_key => $complete_setting_value) {

$complete_setting_title = trim($settings_title[$complete_setting_key] ?? $complete_setting_key);

$complete_setting_key = trim($complete_setting_key);
$complete_setting_value = trim($complete_setting_value);

$stmt->bind_param('sss', $complete_setting_title, $complete_setting_key, $complete_setting_value);
$stmt->execute();
}
return true;
}

function complete_installation_routine() {
$install_locked_file = file_put_contents(root_path. '/install_locked', '');
if ($install_locked_file === false) {
return false;
}
return true;
}
