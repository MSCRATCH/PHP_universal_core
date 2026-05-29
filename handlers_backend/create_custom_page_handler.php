<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//create_custom_page_handler.php
//MMXXVI MSCRATCH

//Administrator access only.
if (user_is_administrator() === false) {
header('Location:'. BASE_URL. 'login');
exit();
}

if (backend_access_is_verified() === false) {
header('Location:'. BASE_URL. 'backend_login');
exit();
}
//Administrator access only.

if (isset($_POST['csrf_token'])) {
if (isset($_POST['create_custom_page'])) {
if (validate_token('create_custom_page', $_POST['csrf_token'])) {

$custom_page_url_form = '';
if (isset($_POST['custom_page_url_form'])) {
$custom_page_url_form = make_safe_url($_POST['custom_page_url_form']);
}

$custom_page_title_form = '';
if (isset($_POST['custom_page_title_form'])) {
$custom_page_title_form = trim($_POST['custom_page_title_form']);
}

$custom_page_content_form = '';
if (isset($_POST['custom_page_content_form'])) {
$custom_page_content_form = trim($_POST['custom_page_content_form']);
}

$result_save_custom_page = save_custom_page($db, $allowed_frontend_sections, $allowed_backend_sections, $text_functions, $custom_page_url_form, $custom_page_title_form, $custom_page_content_form);
if ($result_save_custom_page  === true) {
$backend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => $text_handlers['create_custom_page_handler_saved'],
'message_url'     => BASE_URL . 'show_custom_pages',
'message_button_text'  => $text_handlers['create_custom_page_handler_btn_return'],
]);
backend_system_message($backend_system_message, $settings);
} else {
$errors = $result_save_custom_page;
}
} else {
$backend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => $text_handlers['csrf_text'],
'message_url'     => BASE_URL . 'show_custom_pages',
'message_button_text'  => $text_handlers['csrf_btn'],
]);
backend_system_message($backend_system_message, $settings);
}
}
}


render_page($db, $settings, $text_functions, $text_handlers, $text_templates, $text_fatal_error_message, 'backend_templates', 'backend_theme', 'backend_layout', [
'template_name' => 'create_custom_page_template',
'errors'  => $errors ?? [],
]);
