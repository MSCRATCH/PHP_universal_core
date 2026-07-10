<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//front_controller.php
//MMXXVI MSCRATCH

function front_controller(mysqli $db, array $settings, array $feature_flags, array $allowed_frontend_sections, array $allowed_backend_sections, array $text_functions, array $text_handlers, array $text_templates, array $text_fatal_error_message, array $activated_theme) {

$section = $_GET['p'] ?? '';
$section = basename($section);

if (empty($section)) {
$section = $settings['default_start_page'];
}

//intercept 404 and 403 messages.

if ($section === 'error_404') {
http_error_message(404, $settings, $activated_theme);
}

if ($section === 'error_403') {
http_error_message(403, $settings, $activated_theme);
}

//arrays for special cases.

$allowed_maintenance_sections = ['login', 'logout', 'verify_email_address'];

$allowed_sections_for_not_activated_users = ['logout', 'verify_email_address'];

$allowed_sections_when_email_unverified = ['logout', 'verify_email_address'];

//check if maintenance mode is enabled.

if ($feature_flags['maintenance_mode_enabled'] === 1 && user_is_administrator() === false) {
if (! in_array($section, $allowed_maintenance_sections, true)) {
require_once templates_path. '/frontend_templates/maintenance_mode_template.php';
return;
}
}

//check if the user account is activated.

if (user_is_not_activated() === true && user_is_administrator() === false) {
if (! in_array($section, $allowed_sections_for_not_activated_users, true)) {
require_once templates_path. '/frontend_templates/user_not_activated_template.php';
return;
}
}

//check if the email address is verified & include a handler for resending the registration email.

if ($feature_flags['email_verification_enabled'] === 1 && user_is_logged_in() === true) {
$user_id_email_unverified = get_user_id();
if (users_email_is_not_verified($db, $user_id_email_unverified) === true && user_is_administrator() === false) {
if (! in_array($section, $allowed_sections_when_email_unverified, true)) {
require_once frontend_handlers_path. '/resend_verification_email_handler.php';
require_once templates_path. '/frontend_templates/user_email_unverified_template.php';
return;
}
}
}

//check if any sections have been deactivated.

$deactivated_sections = array();

if ($feature_flags['registration_enabled'] !== 1) {
$deactivated_sections [] = 'register';
}

if ($feature_flags['contact_form_enabled'] !== 1) {
$deactivated_sections [] = 'contact';
}

if ($feature_flags['log_requests_enabled'] !== 1) {
$deactivated_sections [] = 'request_log';
}

if ($feature_flags['user_profile_system_enabled'] !== 1) {
$deactivated_sections [] = 'profile';
$deactivated_sections [] = 'manage_profile';
}

if ($feature_flags['notifications_enabled'] !== 1) {
$deactivated_sections [] = 'notifications';
}

if (in_array($section, $deactivated_sections, true)) {
http_error_message(404, $settings, $activated_theme);
}

//include frontend handler, if available

if (in_array($section, $allowed_frontend_sections, true)) {

$allowed_sections_for_users = [
'logout',
'manage_profile',
'notifications',
'resend_verification_email_handler',
];

if (in_array($section, $allowed_sections_for_users, true) && user_is_logged_in() === false) {
http_error_message(403, $settings, $activated_theme);
}

$frontend_file = frontend_handlers_path . "/{$section}_handler.php";
$real_frontend = realpath($frontend_file);

if ($real_frontend && str_starts_with($real_frontend, realpath(frontend_handlers_path)) && file_exists($real_frontend)) {
require_once $real_frontend;
return;
}
}

//include backend handler, if available
//only allow handlers if the necessary permission exists

if (in_array($section, $allowed_backend_sections, true)) {

if ($section === 'dashboard_moderator' && user_is_moderator() === false) {
http_error_message(404, $settings, $activated_theme);
}

if ($section === 'dashboard_moderator' && user_is_administrator() === true) {
http_error_message(404, $settings, $activated_theme);
}

if (user_is_moderator() === true && user_is_administrator() === false) {

$allowed_sections_for_moderators = [
'backend_login',
'dashboard_moderator',
'show_blog_articles',
'edit_blog_article',
'create_blog_article',
'upload_file',
'show_uploaded_files',
'edit_uploaded_file',
];

if (! in_array($section, $allowed_sections_for_moderators, true)) {
http_error_message(404, $settings, $activated_theme);
}
}

if (user_is_administrator_or_moderator() === false) {
http_error_message(404, $settings, $activated_theme);
}

$backend_file = backend_handlers_path . "/{$section}_handler.php";
$real_backend = realpath($backend_file);

if ($real_backend && str_starts_with($real_backend, realpath(backend_handlers_path)) && file_exists($real_backend)) {
require_once $real_backend;
return;
}
}

//include custom page from DB, if available.

$custom_page = get_custom_page($db, $section);

if ($custom_page !== false) {

$layout = $activated_theme['layout_config']['layouts']['custom_page_handler'] ?? 'layout';
$template_directory = $activated_theme['template_config']['templates']['template_directory'] ?? 'frontend_templates';
$template = $activated_theme['template_config']['templates']['custom_page_handler'] ?? 'custom_page_template';

render_page($db, $settings, $feature_flags, $text_functions, $text_handlers, $text_templates, $text_fatal_error_message, $activated_theme['theme_key'], $layout, [
'template_name' => $template,
'template_directory' => $template_directory,
'custom_page' => $custom_page,
]);
return;
}

//404 if no handler or custom page is present.

http_error_message(404, $settings, $activated_theme);

}
