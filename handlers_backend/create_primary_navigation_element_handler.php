<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//create_primary_navigation_element_handler.php
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
if (isset($_POST['save_primary_nav_element'])) {
if (validate_token('save_primary_nav_element', $_POST['csrf_token'])) {

$primary_nav_url_form = '';
if (isset($_POST['primary_nav_url_form'])) {
$primary_nav_url_form = make_safe_url($_POST['primary_nav_url_form']);
}

$primary_nav_name_form = '';
if (isset($_POST['primary_nav_name_form'])) {
$primary_nav_name_form = trim($_POST['primary_nav_name_form']);
}

$primary_nav_order_form = '';
if (isset($_POST['primary_nav_order_form'])) {
$primary_nav_order_form = (INT) $_POST['primary_nav_order_form'];
}

$result_save_primary_nav_element = save_primary_nav_element($db, $allowed_frontend_sections, $allowed_backend_sections, $text_functions, $primary_nav_url_form, $primary_nav_name_form, $primary_nav_order_form);
if ($result_save_primary_nav_element === true) {
$backend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => $text_handlers['create_primary_navigation_element_handler_successful_created'],
'message_url'     => BASE_URL . 'show_primary_navigation',
'message_button_text'  => $text_handlers['create_primary_navigation_element_handler_btn_return'],
]);
backend_system_message($backend_system_message, $settings);
} else {
$errors = $result_save_primary_nav_element;
}
} else {
$backend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => $text_handlers['csrf_text'],
'message_url'     => BASE_URL . 'show_primary_navigation',
'message_button_text'  => $text_handlers['csrf_btn'],
]);
backend_system_message($backend_system_message, $settings);
}
}
}


render_page($db, $settings, $text_functions, $text_handlers, $text_templates, $text_fatal_error_message, 'backend_templates', 'backend_theme', 'backend_layout', [
'template_name' => 'create_primary_navigation_element_template',
'errors'  => $errors ?? [],
]);
