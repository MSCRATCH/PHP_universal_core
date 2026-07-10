<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//edit_custom_widget_handler.php
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

$custom_widget_id_get = '';
if (isset($_GET['custom_widget_id'])) {
$custom_widget_id_get = (INT) $_GET['custom_widget_id'];
} else {
http_error_message(404, $settings, $activated_theme);
}

$result_check_custom_widget_id = check_custom_widget_id($db, $custom_widget_id_get);

if ($result_check_custom_widget_id  === false) {
$backend_system_message = ([
'message_text'    => $text_handlers['edit_custom_widget_handler_page_dont_exist'],
'message_url'     => BASE_URL . 'show_custom_widgets',
'message_button_text'  => $text_handlers['edit_custom_widget_handler_btn_return'],
]);
backend_system_message($backend_system_message, $settings);
}

$custom_widget = get_custom_widget_by_id($db, $custom_widget_id_get);

if (isset($_POST['csrf_token'])) {
if (isset($_POST['update_custom_widget'])) {
if (validate_token('update_custom_widget', $_POST['csrf_token'])) {

$custom_widget_content_update_form = '';
if (isset($_POST['custom_widget_content_update_form'])) {
$custom_widget_content_update_form = trim($_POST['custom_widget_content_update_form']);
}

$custom_widget_placeholder_update_form = '';
if (isset($_POST['custom_widget_placeholder_update_form'])) {
$custom_widget_placeholder_update_form = trim($_POST['custom_widget_placeholder_update_form']);
}

$result_update_custom_widget = update_custom_widget($db, $text_functions, $custom_widget_content_update_form, $custom_widget_placeholder_update_form, $custom_widget_id_get);
if ($result_update_custom_widget === true) {
$backend_system_message = ([
'message_text'    => $text_handlers['edit_custom_widget_handler_successful_edited'],
'message_url'     => BASE_URL . 'edit_custom_widget/' . $custom_widget_id_get,
'message_button_text'  => $text_handlers['edit_custom_widget_handler_btn_return'],
]);
backend_system_message($backend_system_message, $settings);
} else {
$errors = $result_update_custom_widget;
}
} else {
$backend_system_message = ([
'message_text'    => $text_handlers['csrf_text'],
'message_url'     => BASE_URL . 'edit_custom_widget/' . $custom_widget_id_get,
'message_button_text'  => $text_handlers['csrf_btn'],
]);
backend_system_message($backend_system_message, $settings);
}
}
}

render_page($db, $settings, $feature_flags, $text_functions, $text_handlers, $text_templates, $text_fatal_error_message, 'backend_theme', 'backend_layout', [
'template_name' => 'edit_custom_widget_template',
'template_directory' => 'backend_templates',
'custom_widget' => $custom_widget ?? false,
'errors'  => $errors ?? [],
]);
