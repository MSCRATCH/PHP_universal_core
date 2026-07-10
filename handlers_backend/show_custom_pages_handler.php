<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//show_custom_pages_handler.php
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

$custom_pages = view_custom_pages($db);

if (isset($_POST['csrf_token'])) {
if (isset($_POST['remove_custom_page'])) {
if (validate_token('remove_custom_page', $_POST['csrf_token'])) {

$custom_page_id_form = '';
if (isset($_POST['custom_page_id_form'])) {
$custom_page_id_form = (INT) $_POST['custom_page_id_form'];
}

$result_remove_custom_page = remove_custom_page($db, $custom_page_id_form);
if ($result_remove_custom_page  === true) {
$backend_system_message = ([
'message_text'    => $text_handlers['show_custom_pages_handler_successful_removed'],
'message_url'     => BASE_URL . 'show_custom_pages',
'message_button_text'  => $text_handlers['show_custom_pages_handler_btn_return'],
]);
backend_system_message($backend_system_message, $settings);
}
} else {
$backend_system_message = ([
'message_text'    => $text_handlers['csrf_text'],
'message_url'     => BASE_URL . 'show_custom_pages',
'message_button_text'  => $text_handlers['csrf_btn'],
]);
backend_system_message($backend_system_message, $settings);
}
}
}

render_page($db, $settings, $feature_flags, $text_functions, $text_handlers, $text_templates, $text_fatal_error_message, 'backend_theme', 'backend_layout', [
'template_name' => 'show_custom_pages_template',
'template_directory' => 'backend_templates',
'custom_pages' => $custom_pages,
]);
