<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//core_loader.php
//MMXXVI MSCRATCH

$core_loader_files = [
'config' => [
config_path. '/allowed_frontend_sections.php', //autonomous
config_path. '/allowed_backend_sections.php', //autonomous
config_path. '/app_loader_permissions.php', //autonomous
],
'includes' => [
includes_path. '/PHPMailer/src/Exception.php', //autonomous
includes_path. '/PHPMailer/src/PHPMailer.php', //autonomous
includes_path. '/PHPMailer/src/SMTP.php', //autonomous
],
'core_functions' => [
core_functions_path. '/authentication.php', //autonomous
core_functions_path. '/load_activated_theme.php', //$db
],
'security_functions' => [
security_functions_path. '/csrf_token.php', //autonomous
security_functions_path. '/make_safe_url.php', //autonomous
security_functions_path. '/manage_login_attempts.php', //$db
security_functions_path. '/rate_limiter.php', //$db
],
'user_functions' => [
user_functions_path. '/check_username.php', //$db
user_functions_path. '/log_requests.php', //$db
user_functions_path. '/update_last_activity.php', //$db
user_functions_path. '/public_notifications.php',
],
'file_functions' => [
file_functions_path. '/handle_file_requests.php', //$db & $text_functions
],
'message_functions' => [
message_functions_path. '/frontend_system_message.php', //$settings, $activated_theme
message_functions_path. '/backend_system_message.php', //$settings
],
'helper_functions' => [
helper_functions_path. '/parse_bb_code.php', //$db & $text_functions
helper_functions_path. '/pagination.php', //autonomous
helper_functions_path. '/cct.php', //$text_functions
helper_functions_path. '/format_file_size.php', //autonomous
helper_functions_path. '/render_performance_stats.php', //$text_functions
],
'mail_functions' => [
mail_functions_path. '/verify_email.php', //$db
mail_functions_path. '/public_emails.php', //$db, $text_functions
],
'auth_functions' => [
auth_functions_path. '/login.php', //$db, $text_functions & manage_login_attempts.php
auth_functions_path. '/register.php', //$db, $text_functions & $settings
auth_functions_path. '/logout.php', //autonomous
],
];

$missing_core_loader_files = array();

foreach ($core_loader_files as $grouped_core_loader_files => $core_files) {
foreach ($core_files as $core_file) {

$core_file_name = basename($core_file);

if ($feature_flags['registration_enabled'] !== 1 && $core_file_name === 'register.php') {
continue;
}

if ($feature_flags['rate_limiter_enabled'] !== 1 && $core_file_name === 'rate_limiter.php') {
continue;
}

if ($feature_flags['cct_enabled'] !== 1 && $core_file_name === 'cct.php') {
continue;
}

if ($feature_flags['log_requests_enabled'] !== 1 && $core_file_name === 'log_requests.php') {
continue;
}

if ($feature_flags['notifications_enabled'] !== 1 && $core_file_name === 'public_notifications.php') {
continue;
}

if (file_exists($core_file)) {
require_once $core_file;
} else {
$missing_core_loader_files [] = $core_file;
}
}
}

if (! empty($missing_core_loader_files)) {

foreach ($missing_core_loader_files as $missing_core_loader_file) {
$file_name = 'missing_core_loader_files_'. date('Y_m_d'). '.txt';
$file_path = file_system_logs_path;
$log = 'missing_core_loader_file_'. date('Y_m_d_H_i_s'). '_' . $missing_core_loader_file. "\r\n";

if (is_writable($file_path)) {
file_put_contents($file_path . '/' . $file_name, $log, FILE_APPEND | LOCK_EX);
}
}

$fatal_error_message = ([
'message_title' => $text_fatal_error_message['fatal_error_message_core_loader_title'],
'message_additional_title' => $text_fatal_error_message['fatal_error_message_core_loader_additional_title'],
'message_text'    => $text_fatal_error_message['fatal_error_message_core_loader_text'],
'message_missing_files'     =>  $missing_core_loader_files,
]);
fatal_error_message($fatal_error_message, $text_fatal_error_message);
}
