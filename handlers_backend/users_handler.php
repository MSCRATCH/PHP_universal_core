<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//users_handler.php
//MMXXVI MSCRATCH

//Administrator access only.
if (user_is_administrator() === false) {
die("Direct access to this file is restricted.");
}

if (backend_access_is_verified() === false) {
header('Location:'. BASE_URL. 'backend_login');
exit();
}

if (user_is_logged_in() === true) {
$id_of_user_who_accesses_the_page_users = get_user_id();
}
//Administrator access only.


$entries_per_page = 12;
$current_page = isset($_GET['page']) ? (INT) $_GET['page'] : 1;

$total_number_of_users = get_total_number_of_users($db);

$number_of_pages = calculate_number_of_pages($total_number_of_users, $entries_per_page);
$current_page = validate_page_number($total_number_of_users, $current_page, $entries_per_page);
$offset = calculate_offset($current_page, $entries_per_page);

$users = get_paginated_users($db, $offset, $entries_per_page);

if (isset($_POST['csrf_token'])) {
if (isset($_POST['remove_user'])) {
if (validate_token('remove_user', $_POST['csrf_token'])) {

$user_id_remove_form = '';
if (isset($_POST['user_id_remove_form'])) {
$user_id_remove_form = (INT) $_POST['user_id_remove_form'];
}

$username_remove_form = get_username_by_id($db, $user_id_remove_form);

require_once templates_path. '/backend_templates/message_remove_user.php';
exit();

} else {
$backend_system_message = ([
'message_text'    => sanitize_1($text_handlers['csrf_text']),
'message_url'     => BASE_URL . 'users',
'message_button_text'  => sanitize_1($text_handlers['csrf_btn']),
]);
backend_system_message($backend_system_message, $settings);
exit();
}
}
}

if (isset($_POST['csrf_token'])) {
if (isset($_POST['remove_user_confirm'])) {
if (validate_token('remove_user_confirm', $_POST['csrf_token'])) {

$user_id_remove_user_confirm_form = '';
if (isset($_POST['user_id_remove_user_confirm_form'])) {
$user_id_remove_user_confirm_form = (INT) $_POST['user_id_remove_user_confirm_form'];
}

$result = remove_user($db, $text_fatal_error_message, $user_id_remove_user_confirm_form);
if ($result === true) {
$backend_system_message = ([
'message_text'    => $text_handlers['users_handler_successful_removed'],
'message_url'     => BASE_URL . 'users',
'message_button_text'  => $text_handlers['users_handler_btn_return'],
]);
backend_system_message($backend_system_message, $settings);
}
} else {
$backend_system_message = ([
'message_text'    => $text_handlers['csrf_text'],
'message_url'     => BASE_URL . 'users',
'message_button_text'  => $text_handlers['csrf_btn'],
]);
backend_system_message($backend_system_message, $settings);
}
}
}

if (isset($_POST['csrf_token'])) {
if (isset($_POST['update_user_level'])) {
if (validate_token('update_user_level', $_POST['csrf_token'])) {

$user_level_form = '';
if (isset($_POST['user_level_form'])) {
$user_level_form = trim($_POST['user_level_form']);
}

$user_id_user_level_form = '';
if (isset($_POST['user_id_user_level_form'])) {
$user_id_user_level_form = (INT) $_POST['user_id_user_level_form'];
}

$result = update_user_level($db, $text_fatal_error_message, $feature_flags, $user_level_form, $user_id_user_level_form, $id_of_user_who_accesses_the_page_users);
if ($result === true) {
$backend_system_message = ([
'message_text'    => $text_handlers['users_handler_successful_updated'],
'message_url'     => BASE_URL . 'users',
'message_button_text'  => $text_handlers['users_handler_btn_return'],
]);
backend_system_message($backend_system_message, $settings);
}
} else {
$backend_system_message = ([
'message_text'    => $text_handlers['csrf_text'],
'message_url'     => BASE_URL . 'users',
'message_button_text'  => $text_handlers['csrf_btn'],
]);
backend_system_message($backend_system_message, $settings);
}
}
}

render_page($db, $settings, $feature_flags, $text_functions, $text_handlers, $text_templates, $text_fatal_error_message, 'backend_theme', 'backend_layout', [
'template_name' => 'users_template',
'template_directory' => 'backend_templates',
'current_page'  => $current_page,
'number_of_pages' => $number_of_pages,
'users' => $users,
'feature_flags' => $feature_flags,
'errors' => $errors ?? [],
]);
