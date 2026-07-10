<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//show_navigations_handler.php
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

$custom_navs = view_custom_navs($db);

if (isset($_POST['csrf_token'])) {
if (isset($_POST['remove_custom_nav'])) {
if (validate_token('remove_custom_nav', $_POST['csrf_token'])) {

$navigation_id_form = '';
if (isset($_POST['navigation_id_form'])) {
$navigation_id_form = (INT) $_POST['navigation_id_form'];
}

$result_remove_custom_nav = remove_custom_nav($db, $navigation_id_form);
if ($result_remove_custom_nav === true) {
$backend_system_message = ([
'message_text'    => $text_handlers['show_navigation_handler_successful_removed'],
'message_url'     => BASE_URL . 'show_navigations',
'message_button_text'  => $text_handlers['show_navigation_handler_btn_return'],
]);
backend_system_message($backend_system_message, $settings);
}
} else {
$backend_system_message = ([
'message_text'    => $text_handlers['csrf_text'],
'message_url'     => BASE_URL . 'show_navigations',
'message_button_text'  => $text_handlers['csrf_btn'],
]);
backend_system_message($backend_system_message, $settings);
}
}
}

render_page($db, $settings, $feature_flags, $text_functions, $text_handlers, $text_templates, $text_fatal_error_message, 'backend_theme', 'backend_layout', [
'template_name' => 'show_navigations_template',
'template_directory' => 'backend_templates',
'custom_navs' => $custom_navs,
]);
