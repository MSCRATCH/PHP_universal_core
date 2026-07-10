<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//manage_themes_handler.php
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

search_for_themes($db);

$result = get_themes($db);
$theme_is_already_active = check_if_theme_is_already_active($db);

if (isset($_POST['csrf_token'])) {
if (isset($_POST['activate_theme'])) {
if (validate_token('activate_theme', $_POST['csrf_token'])) {

$theme_id_form = '';
if (isset($_POST['theme_id_form'])) {
$theme_id_form = (INT) $_POST['theme_id_form'];
}

$result = activate_theme($db, $theme_id_form);
if ($result === true) {
$backend_system_message = ([
'message_text'    => $text_handlers['manage_themes_handler_successful_activated'],
'message_url'     => BASE_URL . 'manage_themes',
'message_button_text'  => $text_handlers['manage_themes_handler_btn_return'],
]);
backend_system_message($backend_system_message, $settings);
}
} else {
$backend_system_message = ([
'message_text'    => $text_handlers['csrf_text'],
'message_url'     => BASE_URL . 'manage_themes',
'message_button_text'  => $text_handlers['csrf_btn'],
]);
backend_system_message($backend_system_message, $settings);
}
}
}

if (isset($_POST['csrf_token'])) {
if (isset($_POST['deactivate_theme'])) {
if (validate_token('deactivate_theme', $_POST['csrf_token'])) {

$theme_id_form = '';
if (isset($_POST['theme_id_form'])) {
$theme_id_form = (INT) $_POST['theme_id_form'];
}

$result = deactivate_theme($db, $theme_id_form);
if ($result === true) {
$backend_system_message = ([
'message_text'    => $text_handlers['manage_themes_handler_successful_deactivated'],
'message_url'     => BASE_URL . 'manage_themes',
'message_button_text'  => $text_handlers['manage_themes_handler_btn_return'],
]);
backend_system_message($backend_system_message, $settings);
}
} else {
$backend_system_message = ([
'message_text'    => $text_handlers['csrf_text'],
'message_url'     => BASE_URL . 'manage_themes',
'message_button_text'  => $text_handlers['csrf_btn'],
]);
backend_system_message($backend_system_message, $settings);
}
}
}

render_page($db, $settings, $feature_flags, $text_functions, $text_handlers, $text_templates, $text_fatal_error_message, 'backend_theme', 'backend_layout', [
'template_name' => 'manage_themes_template',
'template_directory' => 'backend_templates',
'result'        => $result,
'theme_is_already_active' => $theme_is_already_active,
]);
