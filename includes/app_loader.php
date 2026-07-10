<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//app_loader.php
//MMXXVI MSCRATCH

$app_loader_files = [
'frontend_functions' => [
frontend_functions_path. '/public_blog.php', //$db & $text_functions
frontend_functions_path. '/public_comments.php', //$db & $text_functions
frontend_functions_path. '/public_custom_pages.php', //$db & $text_functions
frontend_functions_path. '/public_custom_widgets.php', //$db & $text_functions
frontend_functions_path. '/public_navigations.php', //$db & $text_functions
frontend_functions_path. '/public_profile_image_upload.php', //$db & $text_functions
frontend_functions_path. '/public_profile.php', //$db & $text_functions
],
'widgets' => [
widgets_path. '/get_profile_widget.php',
],
'backend_functions' => [
backend_functions_path. '/backend_login.php', //$db & $text_functions
backend_functions_path. '/backend_logout.php', //$db & $text_functions
backend_functions_path. '/manage_blog.php', //$db & $text_functions
backend_functions_path. '/manage_comments.php', //$db & $text_functions
backend_functions_path. '/manage_custom_pages.php', //$db & $text_functions
backend_functions_path. '/manage_custom_widgets.php', //$db & $text_functions
backend_functions_path. '/manage_dashboard_stats.php', //$db & $text_functions
backend_functions_path. '/manage_emails.php', //$db & $text_functions
backend_functions_path. '/manage_error_log.php', //$db & $text_functions
backend_functions_path. '/manage_feature_flags.php', //$db & $text_functions
backend_functions_path. '/manage_navigations.php', //$db & $text_functions
backend_functions_path. '/manage_request_log.php', //$db & $text_functions
backend_functions_path. '/manage_settings.php', //$db & $text_functions
backend_functions_path. '/manage_themes.php', //$db & $text_functions
backend_functions_path. '/manage_uploaded_files.php', //$db & $text_functions
backend_functions_path. '/manage_users.php', //$db & $text_functions
backend_functions_path. '/render_backend_navigation.php', //$db & $text_functions
],
'core_functions' => [
core_functions_path. '/render_page.php', //$db & $text_functions
core_functions_path. '/front_controller.php', //$db, $settings, $allowed_frontend_sections, $allowed_backend_sections, $text_functions, $text_handlers, $text_templates, $text_fatal_error_message & $activated_theme
],
];

$missing_app_loader_files = array();

foreach ($app_loader_files as $grouped_app_loader_files => $app_files) {
foreach ($app_files as $app_file) {


$app_file_name = basename($app_file);

if (user_is_administrator() === false) {
if (in_array($app_file_name, $administrator_only_files, true)) {
continue;
}
}

if (user_is_administrator_or_moderator() === false) {
if (in_array($app_file_name, $administrator_and_moderator_only_files, true)) {
continue;
}
}

if ($feature_flags['log_requests_enabled'] !== 1 && $app_file_name === 'manage_request_log.php') {
continue;
}

if ($feature_flags['user_profile_system_enabled'] !== 1 && $app_file_name === 'public_profile_image_upload.php') {
continue;
}

if ($feature_flags['user_profile_system_enabled'] !== 1 && $app_file_name === 'public_profile.php') {
continue;
}

if ($feature_flags['user_comments_enabled'] !== 1 && $app_file_name === 'public_comments.php') {
continue;
}

if ($feature_flags['user_comments_enabled'] !== 1 && $app_file_name === 'manage_comments.php') {
continue;
}

if (file_exists($app_file)) {
require_once $app_file;
} else {
$missing_app_loader_files [] = $app_file;
}
}
}

if (! empty($missing_app_loader_files)) {

foreach ($missing_app_loader_files as $missing_app_loader_file) {
$file_name = 'missing_app_loader_files_'. date('Y_m_d'). '.txt';
$file_path = file_system_logs_path;
$log = 'missing_app_loader_file_'. date('Y_m_d_H_i_s'). '_' . $missing_app_loader_file. "\r\n";

if (is_writable($file_path)) {
file_put_contents($file_path . '/' . $file_name, $log, FILE_APPEND | LOCK_EX);
}
}

$fatal_error_message = ([
'message_title' => $text_fatal_error_message['fatal_error_message_app_loader_title'],
'message_additional_title' => $text_fatal_error_message['fatal_error_message_app_loader_additional_title'],
'message_text'    => $text_fatal_error_message['fatal_error_message_app_loader_text'],
'message_missing_files'     =>  $missing_app_loader_files,
]);
fatal_error_message($fatal_error_message, $text_fatal_error_message);
}
