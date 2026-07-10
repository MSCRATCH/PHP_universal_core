<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//upload_file_handler.php
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

if (isset($_POST['csrf_token'])) {
if (isset($_POST['upload_file'])) {
if (validate_token('upload_file', $_POST['csrf_token'])) {

$file_title_form = '';
if (isset($_POST['file_title_form'])) {
$file_title_form = trim($_POST['file_title_form']);
}

$file_description_form = '';
if (isset($_POST['file_description_form'])) {
$file_description_form = trim($_POST['file_description_form']);
}

$uploaded_file = '';
if (isset($_FILES['uploaded_file']) && is_array($_FILES['uploaded_file'])) {
$uploaded_file = $_FILES['uploaded_file'];
}

$result_upload_file = upload_file($db, $text_functions, $file_title_form, $file_description_form, $uploaded_file, $user_id_upload_files);
if ($result_upload_file === true) {
$backend_system_message = ([
'message_text'    => $text_handlers['upload_file_handler_successful_uploaded'],
'message_url'     => BASE_URL . 'show_uploaded_files',
'message_button_text'  => $text_handlers['upload_file_handler_btn_return'],
]);
backend_system_message($backend_system_message, $settings);
} else {
$errors = $result_upload_file;
}
} else {
$backend_system_message = ([
'message_text'    => $text_handlers['csrf_text'],
'message_url'     => BASE_URL . 'show_uploaded_files',
'message_button_text'  => $text_handlers['csrf_btn'],
]);
backend_system_message($backend_system_message, $settings);
}
}
}

render_page($db, $settings, $feature_flags, $text_functions, $text_handlers, $text_templates, $text_fatal_error_message, 'backend_theme', 'backend_layout', [
'template_name' => 'upload_file_template',
'template_directory' => 'backend_templates',
'errors'  => $errors ?? [],
]);
