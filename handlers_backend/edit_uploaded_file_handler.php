<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//edit_uploaded_file_handler.php
//MMXXVI MSCRATCH

//Administrator or moderator access only.
if (user_is_administrator_or_moderator() === false) {
die("Direct access to this file is restricted.");
}

if (backend_access_is_verified() === false) {
header('Location:'. BASE_URL. 'backend_login');
exit();
}

if (user_is_logged_in() !== false) {
$user_id_upload_files = get_user_id();
}
//Administrator or moderator access only.

$file_id_get = '';
if (isset($_GET['file_id'])) {
$file_id_get = (INT) $_GET['file_id'];
} else {
http_error_message(404, $settings, $activated_theme);
}

$result_check_file_id = check_file_id_by_user($db, $file_id_get, $user_id_upload_files);

if ($result_check_file_id === false) {
$backend_system_message = ([
'message_text'    => $text_handlers['edit_uploaded_file_handler_file_dont_exist'],
'message_url'     => BASE_URL . 'upload_files',
'message_button_text'  => $text_handlers['edit_uploaded_file_handler_btn_return'],
]);
backend_system_message($backend_system_message, $settings);
}

$file_data = get_uploaded_files_by_id_and_by_user($db, $file_id_get, $user_id_upload_files);

if (isset($_POST['csrf_token'])) {
if (isset($_POST['update_file'])) {
if (validate_token('update_file', $_POST['csrf_token'])) {

$file_title_update_form = '';
if (isset($_POST['file_title_update_form'])) {
$file_title_update_form = trim($_POST['file_title_update_form']);
}

$file_description_update_form = '';
if (isset($_POST['file_description_update_form'])) {
$file_description_update_form = trim($_POST['file_description_update_form']);
}

$result_update_file = update_file_data($db, $file_title_update_form, $file_description_update_form, $file_id_get, $user_id_upload_files);
if ($result_update_file === true) {
$backend_system_message = ([
'message_text'    => $text_handlers['edit_uploaded_file_handler_successful_edited'],
'message_url'     => BASE_URL . 'edit_uploaded_file/' . $file_id_get,
'message_button_text'  => $text_handlers['edit_uploaded_file_handler_btn_return'],
]);
backend_system_message($backend_system_message, $settings);
} else {
$errors = $result_upload_file;
}
} else {
$backend_system_message = ([
'message_text'    => $text_handlers['csrf_text'],
'message_url'     => BASE_URL . 'edit_uploaded_file/' . $file_id_get,
'message_button_text'  => $text_handlers['csrf_btn'],
]);
backend_system_message($backend_system_message, $settings);
}
}
}

render_page($db, $settings, $feature_flags, $text_functions, $text_handlers, $text_templates, $text_fatal_error_message, 'backend_theme', 'backend_layout', [
'template_name' => 'edit_uploaded_file_template',
'template_directory' => 'backend_templates',
'file_data' => $file_data,
'errors'  => $errors ?? [],
]);
