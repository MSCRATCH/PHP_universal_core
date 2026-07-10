<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//show_navigation_links_handler.php
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
http_error_message(404, $settings, $activated_theme);
}

$result_check_custom_nav_id = check_custom_nav_id($db, $custom_nav_id_get);

if ($result_check_custom_nav_id === false) {
$backend_system_message = ([
'message_text'    => $text_handlers['show_navigation_links_handler_no_nav'],
'message_url'     => BASE_URL . 'show_navigations',
'message_button_text'  => $text_handlers['show_navigation_links_handler_btn_return'],
]);
backend_system_message($backend_system_message, $settings);
}

$custom_nav_links = view_custom_nav_links_by_id($db, $custom_nav_id_get);

if (isset($_POST['csrf_token'])) {
if (isset($_POST['remove_custom_nav_link'])) {
if (validate_token('remove_custom_nav_link', $_POST['csrf_token'])) {

$custom_nav_link_id_form = '';
if (isset($_POST['custom_nav_link_id_form'])) {
$custom_nav_link_id_form = (INT) $_POST['custom_nav_link_id_form'];
}

$result_remove_custom_nav_link = remove_custom_nav_link($db, $custom_nav_link_id_form);
if ($result_remove_custom_nav_link  === true) {
$backend_system_message = ([
'message_text'    => $text_handlers['show_navigation_links_handler_successful_removed'],
'message_url'     => BASE_URL . 'show_navigation_links/' . $custom_nav_id_get,
'message_button_text'  => $text_handlers['show_navigation_links_handler_btn_return'],
]);
backend_system_message($backend_system_message, $settings);
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
'template_name' => 'show_navigation_links_template',
'template_directory' => 'backend_templates',
'custom_nav_id_get' => $custom_nav_id_get,
'custom_nav_links' => $custom_nav_links,
]);
