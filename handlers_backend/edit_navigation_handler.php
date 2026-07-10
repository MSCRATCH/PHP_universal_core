<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//edit_navigation_handler.php
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
'message_text'    => $text_handlers['edit_navigation_handler_no_nav'],
'message_url'     => BASE_URL . 'show_navigations',
'message_button_text'  => $text_handlers['edit_navigation_handler_btn_return'],
]);
backend_system_message($backend_system_message, $settings);
}

$custom_nav = get_custom_nav_by_id($db, $custom_nav_id_get);

if (isset($_POST['csrf_token'])) {
if (isset($_POST['edit_custom_nav'])) {
if (validate_token('edit_custom_nav', $_POST['csrf_token'])) {

$custom_nav_placeholder_form = '';
if (isset($_POST['custom_nav_placeholder_form'])) {
$custom_nav_placeholder_form = trim($_POST['custom_nav_placeholder_form']);
}

$result_update_custom_nav = update_custom_nav($db, $text_functions, $custom_nav_placeholder_form, $custom_nav_id_get);
if ($result_update_custom_nav === true) {
$backend_system_message = ([
'message_text'    => $text_handlers['edit_navigation_handler_successful_edited'],
'message_url'     => BASE_URL . 'edit_navigation/' . $custom_nav_id_get,
'message_button_text'  => $text_handlers['edit_navigation_handler_btn_return'],
]);
backend_system_message($backend_system_message, $settings);
} else {
$errors = $result_update_custom_nav;
}
} else {
$backend_system_message = ([
'message_text'    => $text_handlers['csrf_text'],
'message_url'     => BASE_URL . 'edit_navigation/' . $custom_nav_id_get,
'message_button_text'  => $text_handlers['csrf_btn'],
]);
backend_system_message($backend_system_message, $settings);
}
}
}

render_page($db, $settings, $feature_flags, $text_functions, $text_handlers, $text_templates, $text_fatal_error_message, 'backend_theme', 'backend_layout', [
'template_name' => 'edit_navigation_template',
'template_directory' => 'backend_templates',
'custom_nav' => $custom_nav,
'errors'  => $errors ?? [],
]);
