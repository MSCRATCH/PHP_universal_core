<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//create_navigation_handler.php
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

if (isset($_POST['csrf_token'])) {
if (isset($_POST['save_custom_nav'])) {
if (validate_token('save_custom_nav', $_POST['csrf_token'])) {

$custom_nav_placeholder_form = '';
if (isset($_POST['custom_nav_placeholder_form'])) {
$custom_nav_placeholder_form = trim($_POST['custom_nav_placeholder_form']);
}

$result_save_custom_nav = save_custom_nav($db, $text_functions, $custom_nav_placeholder_form);
if ($result_save_custom_nav === true) {
$backend_system_message = ([
'message_text'    => $text_handlers['create_navigation_handler_successful_created'],
'message_url'     => BASE_URL . 'show_navigations',
'message_button_text'  => $text_handlers['create_navigation_handler_btn_return'],
]);
backend_system_message($backend_system_message, $settings);
} else {
$errors = $result_save_custom_nav;
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
'template_name' => 'create_navigation_template',
'template_directory' => 'backend_templates',
'errors'  => $errors ?? [],
]);
