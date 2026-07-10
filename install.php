<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//install.php
//MMXXVI MSCRATCH

$install_step = isset($_GET['install_step']) ? (INT) $_GET['install_step'] : 1;
$allowed_install_steps = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11];

if (! in_array($install_step, $allowed_install_steps, true)) {
$install_step = 1;
}

if ($install_step >= 2 && empty($_SESSION['install_step_1'])) {
header('Location: ?install_step=1');
exit();
}

if ($install_step >= 3 && empty($_SESSION['install_step_2'])) {
header('Location: ?install_step=2');
exit();
}

if ($install_step >= 4 && empty($_SESSION['install_step_3'])) {
header('Location: ?install_step=3');
exit();
}

if ($install_step >= 5 && empty($_SESSION['install_step_4'])) {
header('Location: ?install_step=4');
exit();
}

if ($install_step >= 6 && empty($_SESSION['install_step_5'])) {
header('Location: ?install_step=5');
exit();
}

if ($install_step >= 7 && empty($_SESSION['install_step_6'])) {
header('Location: ?install_step=6');
exit();
}

if ($install_step >= 8 && empty($_SESSION['install_step_7'])) {
header('Location: ?install_step=7');
exit();
}

if ($install_step >= 9 && empty($_SESSION['install_step_8'])) {
header('Location: ?install_step=8');
exit();
}

if ($install_step >= 10 && empty($_SESSION['install_step_9'])) {
header('Location: ?install_step=9');
exit();
}

if ($install_step >= 11 && empty($_SESSION['install_step_10'])) {
header('Location: ?install_step=10');
exit();
}

define('INSTALLER_NAME', 'PINA');
define('INSTALLER_FULL_NAME', 'PHP installer agent');
define('INSTALLER_VERSION', '1.0.0');
define('INSTALLER_SCRIPTNAME', 'PHP universal core');
define('INSTALLER_SCRIPTVERSION', '1.2.1');
define('BASE_URL', '/');

define('root_path', __DIR__);
define('install_folder', root_path . '/install');
define('install_functions', install_folder . '/install_functions');
define('install_templates', install_folder . '/install_templates');
define('includes_path', root_path . '/includes');

require_once install_folder . '/system_folders.php';
require_once install_folder . '/system_files.php';
require_once install_folder . '/writable_folders.php';
require_once install_folder . '/install_lang.php';

require_once includes_path. '/PHPMailer/src/Exception.php';
require_once includes_path. '/PHPMailer/src/PHPMailer.php';
require_once includes_path. '/PHPMailer/src/SMTP.php';

require_once install_functions. '/manage_install.php';

/*
if (file_exists(root_path. '/install_locked')) {
die("PHPUC is already installed. Remove the configuration to reinstall PHPUC. This only works for a new database. Alternatively, the current database must be completely emptied.");
}
*/

if (config_exists() === true) {
require_once root_path . '/config/config.php';
$db = new mysqli (SERVERNAME, USERNAME, PASSWORD, DB_NAME);
}

if (isset($_POST['create_config'])) {

$servername_form = '';
if (isset($_POST['servername_form'])) {
$servername_form = trim($_POST['servername_form']);
}

$username_form = '';
if (isset($_POST['username_form'])) {
$username_form = trim($_POST['username_form']);
}

$db_password_form = '';
if (isset($_POST['db_password_form'])) {
$db_password_form = trim($_POST['db_password_form']);
}

$database_name_form = '';
if (isset($_POST['database_name_form'])) {
$database_name_form = $_POST['database_name_form'];
}

$result_create_config = create_config($text_install, $servername_form, $username_form, $db_password_form, $database_name_form);

if ($result_create_config !== true) {
$create_config_errors = $result_create_config;
}

}

if (isset($_POST['insert_sql_tables'])) {

$result_insert_sql_tables = insert_sql_tables($text_install, $db);

if ($result_insert_sql_tables !== true) {
$insert_sql_tables_errors = $result_insert_sql_tables;
}
}

if (isset($_POST['register_administrator'])) {

$username_form = '';
if (isset($_POST['username_form'])) {
$username_form = trim($_POST['username_form']);
}

$user_password_form = '';
if (isset($_POST['user_password_form'])) {
$user_password_form = trim($_POST['user_password_form']);
}

$user_password_confirm_form = '';
if (isset($_POST['user_password_confirm_form'])) {
$user_password_confirm_form = trim($_POST['user_password_confirm_form']);
}

$user_email_form = '';
if (isset($_POST['user_email_form'])) {
$user_email_form = trim($_POST['user_email_form']);
}

$result_register_administrator = register_administrator($db, $text_install, $username_form, $user_password_form, $user_password_confirm_form, $user_email_form);

if ($result_register_administrator !== true) {
$register_administrator_errors = $result_register_administrator;
}

}

if (isset($_POST['create_email_config'])) {

$smtp_host_form = '';
if (isset($_POST['smtp_host_form'])) {
$smtp_host_form = trim($_POST['smtp_host_form']);
}

$smtp_port_form = '';
if (isset($_POST['smtp_port_form'])) {
$smtp_port_form = (INT) $_POST['smtp_port_form'];
}

$smtp_user_form = '';
if (isset($_POST['smtp_user_form'])) {
$smtp_user_form = trim($_POST['smtp_user_form']);
}

$smtp_password_form = '';
if (isset($_POST['smtp_password_form'])) {
$smtp_password_form = trim($_POST['smtp_password_form']);
}

$smtp_encryption_form = '';
if (isset($_POST['smtp_encryption_form'])) {
$smtp_encryption_form = trim($_POST['smtp_encryption_form']);
}

$from_email_form = '';
if (isset($_POST['from_email_form'])) {
$from_email_form = trim($_POST['from_email_form']);
}

$from_name_form = '';
if (isset($_POST['from_name_form'])) {
$from_name_form = trim($_POST['from_name_form']);
}

$result_save_email_config = save_email_config($db, $smtp_host_form, $smtp_port_form, $smtp_user_form, $smtp_password_form, $smtp_encryption_form, $from_email_form, $from_name_form, $text_install);

if ($result_save_email_config !== true) {
$create_email_config_errors = $result_save_email_config;
}
}

if (isset($_POST['save_settings'])) {

$settings_form = [];
if (isset($_POST['settings_form'])) {
$settings_form = $_POST['settings_form'];
}

$result_save_settings = save_settings($db, $text_install, $settings_form);

if ($result_save_settings !== true) {
$save_settings_errors = $result_save_settings;
}
}

if (isset($_POST['complete_installation_routine'])) {
$result_complete_installation_routine = complete_installation_routine();

if ($result_complete_installation_routine === true) {
unset($_SESSION['install_step_1']);
unset($_SESSION['install_step_2']);
unset($_SESSION['install_step_3']);
unset($_SESSION['install_step_4']);
unset($_SESSION['install_step_5']);
unset($_SESSION['install_step_6']);
unset($_SESSION['install_step_7']);
unset($_SESSION['install_step_8']);
unset($_SESSION['install_step_9']);
unset($_SESSION['install_step_10']);
register_shutdown_function(function () {
unlink(__FILE__);
});
header('Location:'. BASE_URL. 'blog');
exit();
}
}

?>

<?php require_once install_templates . '/install_header_template.php'; ?>
<?php if ($install_step === 1) { ?>
<?php require_once install_templates . '/install_step_1_template.php'; ?>
<?php } elseif ($install_step === 2) { ?>
<?php require_once install_templates . '/install_step_2_template.php'; ?>
<?php } elseif ($install_step === 3) { ?>
<?php require_once install_templates . '/install_step_3_template.php'; ?>
<?php } elseif ($install_step === 4) { ?>
<?php require_once install_templates . '/install_step_4_template.php'; ?>
<?php } elseif ($install_step === 5) { ?>
<?php require_once install_templates . '/install_step_5_template.php'; ?>
<?php } elseif ($install_step === 6) { ?>
<?php require_once install_templates . '/install_step_6_template.php'; ?>
<?php } elseif ($install_step === 7) { ?>
<?php require_once install_templates . '/install_step_7_template.php'; ?>
<?php } elseif ($install_step === 8) { ?>
<?php require_once install_templates . '/install_step_8_template.php'; ?>
<?php } elseif ($install_step === 9) { ?>
<?php require_once install_templates . '/install_step_9_template.php'; ?>
<?php } elseif ($install_step === 10) { ?>
<?php require_once install_templates . '/install_step_10_template.php'; ?>
<?php } elseif ($install_step === 11) { ?>
<?php require_once install_templates . '/install_step_11_template.php'; ?>
<?php } ?>
<?php require_once install_templates . '/install_footer_template.php'; ?>
