<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//show_uploaded_files_handler.php
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

$entries_per_page = 5;
$current_page = isset($_GET['page']) ? (INT) $_GET['page'] : 1;

$total_number_of_uploaded_files = get_total_number_of_uploaded_files_by_user($db, $user_id_upload_files);

$number_of_pages = calculate_number_of_pages($total_number_of_uploaded_files, $entries_per_page);
$current_page = validate_page_number($total_number_of_uploaded_files, $current_page, $entries_per_page);
$offset = calculate_offset($current_page, $entries_per_page);

$result = get_paginated_uploaded_files_by_user($db, $offset, $entries_per_page, $user_id_upload_files);


if (isset($_POST['csrf_token'])) {
if (isset($_POST['remove_file'])) {
if (validate_token('remove_file', $_POST['csrf_token'])) {

$file_id_form = '';
if (isset($_POST['file_id_form'])) {
$file_id_form = (INT) $_POST['file_id_form'];
}

$result_remove_file = remove_file($db, $file_id_form, $user_id_upload_files);
if ($result_remove_file === true) {
$backend_system_message = ([
'message_text'    => $text_handlers['show_uploaded_files_handler_successful_removed'],
'message_url'     => BASE_URL . 'show_uploaded_files',
'message_button_text'  => $text_handlers['show_uploaded_files_handler_btn_return'],
]);
backend_system_message($backend_system_message, $settings);
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
'template_name' => 'show_uploaded_files_template',
'template_directory' => 'backend_templates',
'result'        => $result,
'current_page'  => $current_page,
'number_of_pages' => $number_of_pages,
]);
