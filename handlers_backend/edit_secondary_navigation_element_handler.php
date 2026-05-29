<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//edit_secondary_navigation_element_handler.php
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

$secondary_navigation_element_id_get = '';
if (isset($_GET['secondary_navigation_element'])) {
$secondary_navigation_element_id_get = (INT) $_GET['secondary_navigation_element'];
} else {
http_error_message(404, $activated_theme);
}

$result_check_secondary_navigation_element_id = check_secondary_navigation_element_id($db, $secondary_navigation_element_id_get);

if ($result_check_secondary_navigation_element_id === false) {
$backend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => $text_handlers['edit_secondary_navigation_element_handler_element_dont_exist'],
'message_url'     => BASE_URL . 'show_secondary_navigation',
'message_button_text'  => $text_handlers['edit_secondary_navigation_element_handler_btn_return'],
]);
backend_system_message($backend_system_message, $settings);
}

$secondary_navigation_element = get_secondary_navigation_element_by_id($db, $secondary_navigation_element_id_get);


if (isset($_POST['csrf_token'])) {
if (isset($_POST['edit_secondary_nav_element'])) {
if (validate_token('edit_secondary_nav_element', $_POST['csrf_token'])) {

$secondary_nav_url_update_form = '';
if (isset($_POST['secondary_nav_url_update_form'])) {
$secondary_nav_url_update_form = make_safe_url($_POST['secondary_nav_url_update_form']);
}

$secondary_nav_name_update_form = '';
if (isset($_POST['secondary_nav_name_update_form'])) {
$secondary_nav_name_update_form = trim($_POST['secondary_nav_name_update_form']);
}

$secondary_nav_order_update_form = '';
if (isset($_POST['secondary_nav_order_update_form'])) {
$secondary_nav_order_update_form = (INT) $_POST['secondary_nav_order_update_form'];
}

$result_update_secondary_nav_element = update_secondary_nav_element($db, $allowed_frontend_sections, $allowed_backend_sections, $text_functions, $secondary_nav_url_update_form, $secondary_nav_name_update_form, $secondary_nav_order_update_form, $secondary_navigation_element_id_get);
if ($result_update_secondary_nav_element === true) {
$backend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => $text_handlers['edit_secondary_navigation_element_handler_successful_edited'],
'message_url'     => BASE_URL . 'edit_secondary_navigation_element/' . $secondary_navigation_element_id_get,
'message_button_text'  => $text_handlers['edit_secondary_navigation_element_handler_btn_return'],
]);
backend_system_message($backend_system_message, $settings);
} else {
$errors = $result_update_secondary_nav_element;
}
} else {
$backend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => $text_handlers['csrf_text'],
'message_url'     => BASE_URL . 'edit_secondary_navigation_element/' . $secondary_navigation_element_id_get,
'message_button_text'  => $text_handlers['csrf_btn'],
]);
backend_system_message($backend_system_message, $settings);
}
}
}

render_page($db, $settings, $text_functions, $text_handlers, $text_templates, $text_fatal_error_message, 'backend_templates', 'backend_theme', 'backend_layout', [
'template_name' => 'edit_secondary_navigation_element_template',
'secondary_navigation_element' => $secondary_navigation_element,
'errors'  => $errors ?? [],
]);
