<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//create_custom_widget_handler.php
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

if (isset($_POST['csrf_token'])) {
if (isset($_POST['create_custom_widget'])) {
if (validate_token('create_custom_widget', $_POST['csrf_token'])) {

$custom_widget_content_form = '';
if (isset($_POST['custom_widget_content_form'])) {
$custom_widget_content_form = trim($_POST['custom_widget_content_form']);
}

$custom_widget_placeholder_form = '';
if (isset($_POST['custom_widget_placeholder_form'])) {
$custom_widget_placeholder_form = trim($_POST['custom_widget_placeholder_form']);
}

$result_save_custom_widget = save_custom_widget($db, $text_functions, $custom_widget_content_form, $custom_widget_placeholder_form);
if ($result_save_custom_widget  === true) {
$backend_system_message = ([
'message_text'    => $text_handlers['create_custom_widget_handler_saved'],
'message_url'     => BASE_URL . 'show_custom_widgets',
'message_button_text'  => $text_handlers['create_custom_widget_handler_btn_return'],
]);
backend_system_message($backend_system_message, $settings);
} else {
$errors = $result_save_custom_widget;
}
} else {
$backend_system_message = ([
'message_text'    => $text_handlers['csrf_text'],
'message_url'     => BASE_URL . 'create_custom_widget',
'message_button_text'  => $text_handlers['csrf_btn'],
]);
backend_system_message($backend_system_message, $settings);
}
}
}

render_page($db, $settings, $feature_flags, $text_functions, $text_handlers, $text_templates, $text_fatal_error_message, 'backend_theme', 'backend_layout', [
'template_name' => 'create_custom_widget_template',
'template_directory' => 'backend_templates',
'errors'  => $errors ?? [],
]);
