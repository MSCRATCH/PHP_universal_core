<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//edit_custom_page_handler.php
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

$custom_page_id_get = '';
if (isset($_GET['custom_page_id'])) {
$custom_page_id_get = (INT) $_GET['custom_page_id'];
} else {
http_error_message(404, $activated_theme);
}

$result_check_custom_page_id = check_custom_page_id($db, $custom_page_id_get);

if ($result_check_custom_page_id === false) {
$backend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => $text_handlers['edit_custom_page_handler_page_dont_exist'],
'message_url'     => BASE_URL . 'show_custom_pages',
'message_button_text'  => $text_handlers['edit_custom_page_handler_btn_return'],
]);
backend_system_message($backend_system_message, $settings);
}

$custom_page = get_custom_page_by_id($db, $custom_page_id_get);

if (isset($_POST['csrf_token'])) {
if (isset($_POST['update_custom_page'])) {
if (validate_token('update_custom_page', $_POST['csrf_token'])) {

$custom_page_url_update_form = '';
if (isset($_POST['custom_page_url_update_form'])) {
$custom_page_url_update_form = make_safe_url($_POST['custom_page_url_update_form']);
}

$custom_page_title_update_form = '';
if (isset($_POST['custom_page_title_update_form'])) {
$custom_page_title_update_form = trim($_POST['custom_page_title_update_form']);
}

$custom_page_content_update_form = '';
if (isset($_POST['custom_page_content_update_form'])) {
$custom_page_content_update_form = trim($_POST['custom_page_content_update_form']);
}

$result_update_custom_page = update_custom_page($db, $allowed_frontend_sections, $allowed_backend_sections, $text_functions, $custom_page_url_update_form, $custom_page_title_update_form, $custom_page_content_update_form, $custom_page_id_get);
if ($result_update_custom_page === true) {
$backend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => $text_handlers['edit_custom_page_handler_successful_edited'],
'message_url'     => BASE_URL . 'edit_custom_page/' . $custom_page_id_get,
'message_button_text'  => $text_handlers['edit_custom_page_handler_btn_return'],
]);
backend_system_message($backend_system_message, $settings);
} else {
$errors = $result_update_custom_page;
}
} else {
$backend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => $text_handlers['csrf_text'],
'message_url'     => BASE_URL . 'edit_custom_page/' . $custom_page_id_get,
'message_button_text'  => $text_handlers['csrf_btn'],
]);
backend_system_message($backend_system_message, $settings);
}
}
}


render_page($db, $settings, $text_functions, $text_handlers, $text_templates, $text_fatal_error_message, 'backend_templates', 'backend_theme', 'backend_layout', [
'template_name' => 'edit_custom_page_template',
'custom_page' => $custom_page ?? false,
'errors'  => $errors ?? [],
]);
