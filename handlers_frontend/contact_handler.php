<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//contact_handler.php
//MMXXVI MSCRATCH

//No access for administrator.
if (user_is_administrator() === true) {
header('Location:'. BASE_URL. $settings['default_start_page']);
exit();
}
//No access for administrator.

if (isset($_POST['csrf_token'])) {
if (isset($_POST['contact'])) {
if (validate_token('contact', $_POST['csrf_token'])) {

$spam_trap_form = '';
if (isset($_POST['homepage'])) {
$spam_trap_form = trim($_POST['homepage']);
}

$from_email_form = '';
if (isset($_POST['from_email_form'])) {
$from_email_form = trim($_POST['from_email_form']);
}

$from_name_form = '';
if (isset($_POST['from_name_form'])) {
$from_name_form = trim($_POST['from_name_form']);
}

$email_text_form = '';
if (isset($_POST['email_text_form'])) {
$email_text_form = trim($_POST['email_text_form']);
}

$subject_form = '';
if (isset($_POST['subject_form'])) {
$subject_form = trim($_POST['subject_form']);
}

$contact_security_question_answer_form = '';
if (isset($_POST['contact_security_question_answer_form'])) {
$contact_security_question_answer_form = trim($_POST['contact_security_question_answer_form']);
}

$subject = $settings['page_title'];
ob_start();
require templates_path . '/email_templates/contact_email_template.php';
$html_body = ob_get_clean();

$result_receive_email_from_contact_form = receive_email_from_contact_form($db, $settings, $text_functions, $spam_trap_form, $from_email_form , $from_name_form, $email_text_form, $subject_form, $contact_security_question_answer_form, $html_body);
if ($result_receive_email_from_contact_form === true) {
$frontend_system_message = ([
'message_text'    => $text_handlers['contact_handler_successful_received'],
'message_url'     => BASE_URL. $settings['default_start_page'],
'message_button_text'  => $text_handlers['contact_handler_btn_return'],
]);
frontend_system_message($frontend_system_message, $settings, $activated_theme);
}  else {
$errors = $result_receive_email_from_contact_form ;
}
} else {
$frontend_system_message = ([
'message_text'    => $text_handlers['csrf_text'],
'message_url'     => BASE_URL. $settings['default_start_page'],
'message_button_text'  => $text_handlers['csrf_btn'],
]);
frontend_system_message($frontend_system_message, $settings, $activated_theme);
}
}
}

$layout = $activated_theme['layout_config']['layouts']['contact_handler'] ?? 'layout';
$template_directory = $activated_theme['template_config']['templates']['template_directory'] ?? 'frontend_templates';
$template = $activated_theme['template_config']['templates']['contact_handler'] ?? 'contact_template';

render_page($db, $settings, $feature_flags, $text_functions, $text_handlers, $text_templates, $text_fatal_error_message, $activated_theme['theme_key'], $layout, [
'template_name' => $template,
'template_directory' => $template_directory,
'errors'  => $errors ?? [],
]);
