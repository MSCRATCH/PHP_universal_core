<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//app_loader.php
//MMXXVI MSCRATCH

$app_loader_files = [
'message_functions' => [
message_functions_path. '/frontend_system_message.php', //$settings, $activated_theme
message_functions_path. '/backend_system_message.php', //$settings
],
'helper_functions' => [
helper_functions_path. '/manage_emails.php', //$db & $text_functions & PHPMailer
helper_functions_path. '/parse_bb_code.php', //$db & $text_functions
helper_functions_path. '/pagination.php', //autonomous
helper_functions_path. '/cct.php', //$text_functions
helper_functions_path. '/format_file_size.php', //autonomous
helper_functions_path. '/render_performance_stats.php', //$text_functions
],
'security_functions' => [
security_functions_path. '/check_blocklist.php', //$db & $text_functions
],
'auth_functions' => [
auth_functions_path. '/login.php', //$db, $text_functions & manage_login_attempts.php
auth_functions_path. '/backend_login.php', //$db, $text_functions & manage_login_attempts.php
auth_functions_path. '/register.php', //$db, $text_functions & $settings
auth_functions_path. '/logout.php', //autonomous
auth_functions_path. '/backend_logout.php', //autonomous
],
'file_functions' => [
file_functions_path. '/handle_file_requests.php', //$db & $text_functions
file_functions_path. '/clearing_request_log.php', //$db & $text_functions
file_functions_path. '/upload_files.php', //$db & $text_functions
file_functions_path. '/upload_profile_image.php', //$db & $text_functions
],
'user_functions' => [
user_functions_path. '/user_activity_log.php', //$db & $text_functions
user_functions_path. '/manage_users.php', //$db, $text_functions & user_activity_log.php
user_functions_path. '/manage_profile.php', //$db & $text_functions
],
'content_functions' => [
content_functions_path. '/manage_blocklist.php', //$db & $text_functions
content_functions_path. '/get_dashboard_stats.php', //$db
content_functions_path. '/manage_settings.php', //$db & $text_functions
content_functions_path. '/get_request_log.php', //$db & $text_functions
content_functions_path. '/manage_comments.php', //$db, $text_functions & user_activity_log.php
content_functions_path. '/manage_error_log.php', //$db
content_functions_path. '/manage_custom_pages.php', //$db & $text_functions
content_functions_path. '/manage_navigations.php', //$db & $text_functions
content_functions_path. '/manage_blog.php', //$db & $text_functions
],
'widgets' => [
widgets_path. '/get_profile_widget.php',
],
'core_functions' => [
core_functions_path. '/front_controller.php', //$db, $settings, $allowed_frontend_sections, $allowed_backend_sections, $text_functions, $text_handlers, $text_templates, $text_fatal_error_message & $activated_theme
core_functions_path. '/render_page.php', //$db & $text_functions
],
];


$missing_app_loader_files = array();

foreach ($app_loader_files as $grouped_app_loader_files => $app_files) {
foreach ($app_files as $app_file) {
if (file_exists($app_file)) {
require_once $app_file;
} else {
$missing_app_loader_files [] = $app_file;
}
}
}

if (! empty($missing_app_loader_files)) {
$fatal_error_message = ([
'message_title' => $text_fatal_error_message['fatal_error_message_app_loader_title'],
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => $text_fatal_error_message['fatal_error_message_app_loader'],
'view_missing_files'     =>  'yes',
'missing_files'     =>  $missing_app_loader_files,
]);
fatal_error_message($fatal_error_message, $text_fatal_error_message);
}
