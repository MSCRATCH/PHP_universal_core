<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//login_handler.php
//MMXXVI MSCRATCH

//Access only by users who are not logged in.
if (user_is_logged_in() === true) {
header('Location:'. BASE_URL. 'blog');
exit();
}
//Access only by users who are not logged in.

if (isset($_POST['csrf_token'])) {
if (isset($_POST['login'])) {
if (validate_token('login', $_POST['csrf_token'])) {

$username_form = '';
if (isset($_POST['username_form'])) {
$username_form = trim($_POST['username_form']);
}

$user_password_form = '';
if (isset($_POST['user_password_form'])) {
$user_password_form = trim($_POST['user_password_form']);
}

$result = login($db, $text_functions, $username_form, $user_password_form);
if ($result === true) {
$frontend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => $text_handlers['login_handler_successful_login'],
'message_url'     => BASE_URL . 'blog',
'message_button_text'  => $text_handlers['login_handler_btn_return'],
]);
frontend_system_message($frontend_system_message, $settings, $activated_theme);
} else {
$errors = $result;
}
} else {
$frontend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => $text_handlers['csrf_text'],
'message_url'     => BASE_URL . 'login',
'message_button_text'  => $text_handlers['csrf_btn'],
]);
frontend_system_message($frontend_system_message, $settings, $activated_theme);
}
}
}

if ($settings['maintenance_mode_enabled'] === "yes") {
render_page($db, $settings, $text_functions, $text_handlers, $text_templates, $text_fatal_error_message, 'frontend_templates', $activated_theme['theme_key'], 'layout_tertiary', [
'template_name' => 'login_template',
'errors'        => $errors ?? [],
]);
} else {
render_page($db, $settings, $text_functions, $text_handlers, $text_templates, $text_fatal_error_message, 'frontend_templates', $activated_theme['theme_key'], 'layout_secondary', [
'template_name' => 'login_template',
'errors'        => $errors ?? [],
]);
}
