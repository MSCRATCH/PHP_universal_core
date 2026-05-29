<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//edit_primary_navigation_element_handler.php
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

$primary_navigation_element_id_get = '';
if (isset($_GET['primary_navigation_element'])) {
$primary_navigation_element_id_get = (INT) $_GET['primary_navigation_element'];
} else {
http_error_message(404, $activated_theme);
}

$result_check_primary_navigation_element_id = check_primary_navigation_element_id($db, $primary_navigation_element_id_get);

if ($result_check_primary_navigation_element_id === false) {
$backend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => $text_handlers['edit_primary_navigation_element_handler_element_dont_exist'],
'message_url'     => BASE_URL . 'show_primary_navigation',
'message_button_text'  => $text_handlers['edit_primary_navigation_element_handler_btn_return'],
]);
backend_system_message($backend_system_message, $settings);
}

$primary_navigation_element = get_primary_navigation_element_by_id($db, $primary_navigation_element_id_get);

if (isset($_POST['csrf_token'])) {
if (isset($_POST['edit_primary_nav_element'])) {
if (validate_token('edit_primary_nav_element', $_POST['csrf_token'])) {

$primary_nav_url_update_form = '';
if (isset($_POST['primary_nav_url_update_form'])) {
$primary_nav_url_update_form = make_safe_url($_POST['primary_nav_url_update_form']);
}

$primary_nav_name_update_form = '';
if (isset($_POST['primary_nav_name_update_form'])) {
$primary_nav_name_update_form = trim($_POST['primary_nav_name_update_form']);
}

$primary_nav_order_update_form = '';
if (isset($_POST['primary_nav_order_update_form'])) {
$primary_nav_order_update_form = (INT) $_POST['primary_nav_order_update_form'];
}

$result_update_primary_nav_element = update_primary_nav_element($db, $allowed_frontend_sections, $allowed_backend_sections, $text_functions, $primary_nav_url_update_form, $primary_nav_name_update_form, $primary_nav_order_update_form, $primary_navigation_element_id_get);
if ($result_update_primary_nav_element === true) {
$backend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => $text_handlers['edit_primary_navigation_element_handler_successful_edited'],
'message_url'     => BASE_URL . 'edit_primary_navigation_element/' . $primary_navigation_element_id_get,
'message_button_text'  => $text_handlers['edit_primary_navigation_element_handler_btn_return'],
]);
backend_system_message($backend_system_message, $settings);
} else {
$errors = $result_update_primary_nav_element;
}
} else {
$backend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => $text_handlers['csrf_text'],
'message_url'     => BASE_URL . 'edit_primary_navigation_element/' . $primary_navigation_element_id_get,
'message_button_text'  => $text_handlers['csrf_btn'],
]);
backend_system_message($backend_system_message, $settings);
}
}
}

render_page($db, $settings, $text_functions, $text_handlers, $text_templates, $text_fatal_error_message, 'backend_templates', 'backend_theme', 'backend_layout', [
'template_name' => 'edit_primary_navigation_element_template',
'primary_navigation_element' => $primary_navigation_element,
'errors'  => $errors ?? [],
]);
