<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//create_navigation_link_handler.php
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

$custom_nav_id_get = '';
if (isset($_GET['custom_nav'])) {
$custom_nav_id_get = (INT) $_GET['custom_nav'];
} else {
http_error_message(404, $activated_theme);
}

if (isset($_POST['csrf_token'])) {
if (isset($_POST['create_nav_link'])) {
if (validate_token('create_nav_link', $_POST['csrf_token'])) {

$custom_nav_link_url_form = '';
if (isset($_POST['custom_nav_link_url_form'])) {
$custom_nav_link_url_form = make_safe_url($_POST['custom_nav_link_url_form']);
}

$custom_nav_link_name_form = '';
if (isset($_POST['custom_nav_link_name_form'])) {
$custom_nav_link_name_form = trim($_POST['custom_nav_link_name_form']);
}

$custom_nav_link_order_form = '';
if (isset($_POST['custom_nav_link_order_form'])) {
$custom_nav_link_order_form = (INT) $_POST['custom_nav_link_order_form'];
}

$result_save_nav_link = save_nav_link($db, $text_functions, $allowed_backend_sections, $allowed_frontend_sections, $custom_nav_id_get, $custom_nav_link_url_form, $custom_nav_link_name_form, $custom_nav_link_order_form);
if ($result_save_nav_link  === true) {
$backend_system_message = ([
'message_text'    => $text_handlers['create_navigation_link_handler_successful_created'],
'message_url'     => BASE_URL . 'show_navigation_links/' . $custom_nav_id_get,
'message_button_text'  => $text_handlers['create_navigation_link_handler_btn_return'],
]);
backend_system_message($backend_system_message, $settings);
} else {
$errors = $result_save_nav_link;
}
} else {
$backend_system_message = ([
'message_text'    => $text_handlers['csrf_text'],
'message_url'     => BASE_URL . 'show_navigation_links/' . $custom_nav_id_get,
'message_button_text'  => $text_handlers['csrf_btn'],
]);
backend_system_message($backend_system_message, $settings);
}
}
}

render_page($db, $settings, $feature_flags, $text_functions, $text_handlers, $text_templates, $text_fatal_error_message, 'backend_theme', 'backend_layout', [
'template_name' => 'create_navigation_link_template',
'template_directory' => 'backend_templates',
'errors'  => $errors ?? [],
'custom_nav_id_get'  => $custom_nav_id_get,
]);
