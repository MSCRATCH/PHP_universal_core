<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//register_handler.php
//MMXXVI MSCRATCH

//Access only by users who are not logged in.
if (user_is_logged_in() === true) {
header('Location:'. BASE_URL. 'blog');
exit();
}
//Access only by users who are not logged in.

if ($settings['disable_registration'] === "yes") {
$frontend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => $text_handlers['register_handler_registration_deactivated'],
'message_url'     => BASE_URL . 'blog',
'message_button_text'  => $text_handlers['register_handler_btn_return'],
]);
frontend_system_message($frontend_system_message, $settings, $activated_theme);
}

if (isset($_POST['csrf_token'])) {
if (isset($_POST['register'])) {
if (validate_token('register', $_POST['csrf_token'])) {

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

$security_question_answer_form = '';
if (isset($_POST['security_question_answer_form'])) {
$security_question_answer_form = trim($_POST['security_question_answer_form']);
}

$result = register($db, $text_templates, $text_functions, $username_form, $user_password_form, $user_password_confirm_form, $user_email_form, $security_question_answer_form, $settings);
if ($result === true) {
$frontend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => $text_handlers['register_handler_successful_registered'],
'message_url'     => BASE_URL . 'blog',
'message_button_text'  => $text_handlers['register_handler_btn_back_to_the_homepage'],
]);
frontend_system_message($frontend_system_message, $settings, $activated_theme);
} else {
$errors = $result;
}
} else {
$frontend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => $text_handlers['csrf_text'],
'message_url'     => BASE_URL . 'register',
'message_button_text'  => $text_handlers['csrf_btn'],
]);
frontend_system_message($frontend_system_message, $settings, $activated_theme);
}
}
}

render_page($db, $settings, $text_functions, $text_handlers, $text_templates, $text_fatal_error_message, 'frontend_templates', $activated_theme['theme_key'], 'layout_secondary', [
'template_name' => 'register_template',
'errors'  => $errors ?? [],
]);
