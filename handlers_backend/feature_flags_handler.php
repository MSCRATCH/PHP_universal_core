<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//feature_flags_handler.php
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

$feature_flags_from_db = get_feature_flags_from_db($db, $text_fatal_error_message);

if (isset($_POST['csrf_token'])) {
if (isset($_POST['submit_feature_flag'])) {
if (validate_token('submit_feature_flag', $_POST['csrf_token'])) {

$feature_flag_key_form = '';
if (isset($_POST['feature_flag_key_form'])) {
$feature_flag_key_form = $_POST['feature_flag_key_form'];
}

$feature_flag_value_form = '';
if (isset($_POST['feature_flag_value_form'])) {
$feature_flag_value_form = (INT) $_POST['feature_flag_value_form'];
}

$result = update_feature_flag($db, $text_functions, $feature_flag_key_form, $feature_flag_value_form);

if ($result === true) {
$backend_system_message = ([
'message_text'    => $text_handlers['feature_flags_handler_successful_edited'],
'message_url'     => BASE_URL . 'feature_flags',
'message_button_text'  => $text_handlers['feature_flags_handler_btn_return'],
]);
backend_system_message($backend_system_message, $settings);
} else {
$errors = $result;
}
} else {
$backend_system_message = ([
'message_text'    => $text_handlers['csrf_text'],
'message_url'     => BASE_URL . 'feature_flags',
'message_button_text'  => $text_handlers['csrf_btn'],
]);
backend_system_message($backend_system_message, $settings);
}
}
}

render_page($db, $settings, $feature_flags, $text_functions, $text_handlers, $text_templates, $text_fatal_error_message, 'backend_theme', 'backend_layout', [
'template_name' => 'feature_flags_template',
'template_directory' => 'backend_templates',
'feature_flags_from_db' => $feature_flags_from_db,
'errors' => $errors ?? [],
]);
