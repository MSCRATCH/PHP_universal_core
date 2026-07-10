<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//email_config_handler.php
//MMXXVI MSCRATCH

//Administrator access only.
if (user_is_administrator() === false) {
die("Direct access to this file is restricted.");
}

if (backend_access_is_verified() === false) {
header('Location:'. BASE_URL. 'backend_login');
exit();
}
//Administrator access only.

$result_email_config = get_email_config($db);

if (isset($_POST['csrf_token'])) {
if (isset($_POST['update_mail_config'])) {
if (validate_token('update_mail_config', $_POST['csrf_token'])) {

$smtp_host_form = '';
if (isset($_POST['smtp_host_form'])) {
$smtp_host_form = trim($_POST['smtp_host_form']);
}

$smtp_port_form = '';
if (isset($_POST['smtp_port_form'])) {
$smtp_port_form = (INT) $_POST['smtp_port_form'];
}

$smtp_user_form = '';
if (isset($_POST['smtp_user_form'])) {
$smtp_user_form = trim($_POST['smtp_user_form']);
}

$smtp_password_form = '';
if (isset($_POST['smtp_password_form'])) {
$smtp_password_form = trim($_POST['smtp_password_form']);
}

$smtp_encryption_form = '';
if (isset($_POST['smtp_encryption_form'])) {
$smtp_encryption_form = trim($_POST['smtp_encryption_form']);
}

$from_email_form = '';
if (isset($_POST['from_email_form'])) {
$from_email_form = trim($_POST['from_email_form']);
}

$from_name_form = '';
if (isset($_POST['from_name_form'])) {
$from_name_form = trim($_POST['from_name_form']);
}

$result_update_email_config = update_email_config($db, $text_functions, $smtp_host_form, $smtp_port_form, $smtp_user_form, $smtp_password_form, $smtp_encryption_form, $from_email_form, $from_name_form);

if ($result_update_email_config === true) {
$backend_system_message = ([
'message_text'    => $text_handlers['email_config_handler_successful_edited'],
'message_url'     => BASE_URL . 'email_config',
'message_button_text'  => $text_handlers['email_config_handler_btn_return'],
]);
backend_system_message($backend_system_message, $settings);
} else {
$errors = $result_update_email_config;
}
} else {
$backend_system_message = ([
'message_text'    => $text_handlers['csrf_text'],
'message_url'     => BASE_URL . 'email_config',
'message_button_text'  => $text_handlers['csrf_btn'],
]);
backend_system_message($backend_system_message, $settings);
}
}
}

render_page($db, $settings, $feature_flags, $text_functions, $text_handlers, $text_templates, $text_fatal_error_message, 'backend_theme', 'backend_layout', [
'template_name' => 'email_config_template',
'template_directory' => 'backend_templates',
'result_email_config' => $result_email_config,
'errors' => $errors ?? [],
]);
