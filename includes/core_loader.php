<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//core_loader.php
//MMXXVI MSCRATCH

$core_loader_files = [
'auth_functions' => [
auth_functions_path. '/authentication.php', //autonomous
],
'core_functions' => [
core_functions_path. '/db.php', //autonomous
core_functions_path. '/register_error_handler.php', //$db
core_functions_path. '/load_settings.php', //$db
],
'config' => [
config_path. '/allowed_frontend_sections.php', //autonomous
config_path. '/allowed_backend_sections.php', //autonomous
],
'security_functions' => [
security_functions_path. '/sanitize_functions.php', //autonomous
security_functions_path. '/csrf_token.php', //autonomous
security_functions_path. '/make_safe_url.php', //autonomous
security_functions_path. '/manage_login_attempts.php', //$db
security_functions_path. '/verify_email_address.php', //$db
],
'user_functions' => [
user_functions_path. '/check_username.php', //$db
user_functions_path. '/log_requests.php', //$db
user_functions_path. '/update_last_activity.php', //$db
],
'includes' => [
includes_path. '/lang_files.php', //autonomous
includes_path. '/PHPMailer/src/Exception.php', //autonomous
includes_path. '/PHPMailer/src/PHPMailer.php', //autonomous
includes_path. '/PHPMailer/src/SMTP.php', //autonomous
],
'file_functions' => [
file_functions_path. '/manage_themes.php', //$db
],
];

$missing_core_loader_files = array();

foreach ($core_loader_files as $grouped_core_loader_files => $core_files) {
foreach ($core_files as $core_file) {
if (file_exists($core_file)) {
require_once $core_file;
} else {
$missing_core_loader_files [] = $core_file;
}
}
}

if (! empty($missing_core_loader_files)) {
$fatal_error_message = ([
'message_title' => $text_fatal_error_message['fatal_error_message_core_loader_title'],
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => $text_fatal_error_message['fatal_error_message_core_loader'],
'view_missing_files'     =>  'yes',
'missing_files'     =>  $missing_core_loader_files,
]);
fatal_error_message($fatal_error_message, $text_fatal_error_message);
}
