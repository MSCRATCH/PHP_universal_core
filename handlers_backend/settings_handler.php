<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//settings_handler.php
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

$settings_from_db = get_settings_from_db($db, $text_fatal_error_message);

if (isset($_POST['csrf_token'])) {
if (isset($_POST['submit_settings'])) {
if (validate_token('submit_settings', $_POST['csrf_token'])) {

$settings_form = '';
if (isset($_POST['settings_form'])) {
$settings_form = $_POST['settings_form'];
}

$result = update_setting($db, $text_functions, $settings_form);

if ($result === true) {
$backend_system_message = ([
'message_text'    => $text_handlers['settings_handler_successful_edited'],
'message_url'     => BASE_URL . 'settings',
'message_button_text'  => $text_handlers['settings_handler_btn_return'],
]);
backend_system_message($backend_system_message, $settings);
} else {
$errors = $result;
}
} else {
$backend_system_message = ([
'message_text'    => $text_handlers['csrf_text'],
'message_url'     => BASE_URL . 'settings',
'message_button_text'  => $text_handlers['csrf_btn'],
]);
backend_system_message($backend_system_message, $settings);
}
}
}

render_page($db, $settings, $feature_flags, $text_functions, $text_handlers, $text_templates, $text_fatal_error_message, 'backend_theme', 'backend_layout', [
'template_name' => 'settings_template',
'template_directory' => 'backend_templates',
'settings_from_db' => $settings_from_db,
'errors' => $errors ?? [],
]);
