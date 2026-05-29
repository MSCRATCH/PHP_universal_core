<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//front_controller.php
//MMXXVI MSCRATCH

function front_controller(mysqli $db, array $settings, array $allowed_frontend_sections, array $allowed_backend_sections, array $text_functions, array $text_handlers, array $text_templates, array $text_fatal_error_message, array $activated_theme) {

$section = $_GET['p'] ?? '';
$section = basename($section);

if (empty($section)) {
$section = 'blog';
}

//intercept 404 and 403 messages.

if ($section === 'error_404') {
http_error_message(404, $activated_theme);
}

if ($section === 'error_403') {
http_error_message(403, $activated_theme);
}

//arrays for special cases.

$allowed_maintenance_sections = ['login', 'logout', 'verify_email_address'];

$allowed_sections_for_not_activated_users = ['logout', 'verify_email_address'];

$allowed_sections_for_users_email_not_verified = ['logout', 'verify_email_address'];

//check if maintenance mode is enabled.

if ($settings['maintenance_mode_enabled'] === "yes" && user_is_administrator() === false) {
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

if (user_is_logged_in() === true) {
$user_id_users_email_not_verified = get_user_id();
if (users_email_is_not_verified($db, $user_id_users_email_not_verified) === true && user_is_administrator() === false) {
if (! in_array($section, $allowed_sections_for_users_email_not_verified, true)) {
require_once frontend_handlers_path. '/resend_verification_email_handler.php';
require_once templates_path. '/frontend_templates/user_not_verified_email_template.php';
return;
}
}
}

//include frontend handler, if available

if (in_array($section, $allowed_frontend_sections, true)) {
$frontend_file = frontend_handlers_path . "/{$section}_handler.php";
$real_frontend = realpath($frontend_file);

if ($real_frontend && str_starts_with($real_frontend, realpath(frontend_handlers_path)) && file_exists($real_frontend)) {
require_once $real_frontend;
return;
}
}

//include backend handler, if available.

if (in_array($section, $allowed_backend_sections, true)) {
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
render_page($db, $settings, $text_functions, $text_handlers, $text_templates, $text_fatal_error_message, 'frontend_templates', $activated_theme['theme_key'], 'layout', [
'template_name' => 'custom_page_template',
'custom_page' => $custom_page,
]);
return;
}

//404 if no handler or custom page is present.

http_error_message(404, $activated_theme);

}
