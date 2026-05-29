<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//backend_login_handler.php
//MMXXVI MSCRATCH

//Administrator or moderator access only.
if (user_is_administrator_or_moderator() === false) {
header('Location:'. BASE_URL. 'login');
exit();
}

if (backend_access_is_verified() === true) {
header('Location:'. BASE_URL. 'dashboard');
exit();
}
//Administrator or moderator access only.

if (isset($_POST['csrf_token'])) {
if (isset($_POST['backend_login'])) {
if (validate_token('backend_login', $_POST['csrf_token'])) {

$backend_login_name_form = '';
if (isset($_POST['backend_login_name_form'])) {
$backend_login_name_form = trim($_POST['backend_login_name_form']);
}

$backend_login_password_form = '';
if (isset($_POST['backend_login_password_form'])) {
$backend_login_password_form = trim($_POST['backend_login_password_form']);
}

$result = backend_login($db, $text_functions, $backend_login_name_form, $backend_login_password_form);
if ($result === true) {
if (user_is_administrator() === true) {
$backend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => $text_handlers['backend_login_handler_successful_authorized_to_access_backend'],
'message_url'     => BASE_URL . 'dashboard',
'message_button_text'  => $text_handlers['backend_login_handler_btn_go_to_the_dashboard'],
]);
backend_system_message($backend_system_message, $settings);
}
if (user_is_moderator() === true) {
$backend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => $text_handlers['backend_login_handler_successful_authorized_to_access_backend'],
'message_url'     => BASE_URL . 'dashboard_moderator',
'message_button_text'  => $text_handlers['backend_login_handler_btn_go_to_the_dashboard'],
]);
backend_system_message($backend_system_message, $settings);
}
} else {
$errors = $result;
}
} else {
$backend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => $text_handlers['csrf_text'],
'message_url'     => BASE_URL . 'backend_login',
'message_button_text'  => $text_handlers['csrf_btn'],
]);
backend_system_message($backend_system_message, $settings);
}
}
}

render_page($db, $settings, $text_functions, $text_handlers, $text_templates, $text_fatal_error_message, 'backend_templates', 'backend_theme', 'backend_layout_secondary', [
'template_name' => 'backend_login_template',
'errors'        => $errors ?? [],
]);
