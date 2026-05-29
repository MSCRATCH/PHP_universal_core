<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//user_activity_log_handler.php
//MMXXVI MSCRATCH

//Access only by users who are logged in.
if (user_is_logged_in() === false) {
header('Location:'. BASE_URL. 'blog');
exit();
}
//Access only by users who are logged in.

if (user_is_logged_in() === true) {
$user_activity_log_user_id = get_user_id();
}

$entries_per_page = 25;
$current_page = isset($_GET['page']) ? (INT) $_GET['page'] : 1;

$total_number_of_user_activity_log_entries_by_user = get_total_number_of_user_activity_log_entries_by_user($db, $user_activity_log_user_id);

$number_of_pages = calculate_number_of_pages($total_number_of_user_activity_log_entries_by_user, $entries_per_page);
$current_page = validate_page_number($total_number_of_user_activity_log_entries_by_user, $current_page, $entries_per_page);
$offset = calculate_offset($current_page, $entries_per_page);

$result = get_paginated_user_activity_log_by_user($db, $offset, $entries_per_page, $user_activity_log_user_id);


if (isset($_POST['csrf_token'])) {
if (isset($_POST['mark_each_user_log_entry_as_viewed'])) {
if (validate_token('mark_each_user_log_entry_as_viewed', $_POST['csrf_token'])) {

$result_mark_each_user_log_entry_as_viewed = mark_each_user_log_entry_as_viewed($db, $user_activity_log_user_id);
if ($result_mark_each_user_log_entry_as_viewed  === true) {
$frontend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => $text_handlers['user_activity_log_handler_successful_marked_all'],
'message_url'     => BASE_URL . 'user_activity_log',
'message_button_text'  => $text_handlers['user_activity_log_handler_btn_return'],
]);
frontend_system_message($frontend_system_message, $settings, $activated_theme);
}
} else {
$frontend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => $text_handlers['csrf_text'],
'message_url'     => BASE_URL . 'user_activity_log',
'message_button_text'  => $text_handlers['csrf_btn'],
]);
frontend_system_message($frontend_system_message, $settings, $activated_theme);
}
}
}

if (isset($_POST['csrf_token'])) {
if (isset($_POST['mark_user_log_entry_as_viewed'])) {
if (validate_token('mark_user_log_entry_as_viewed', $_POST['csrf_token'])) {

$user_activity_log_id_form = '';
if (isset($_POST['user_activity_log_id_form'])) {
$user_activity_log_id_form = (INT) $_POST['user_activity_log_id_form'];
}

$result_mark_user_log_entry_as_viewed = mark_user_log_entry_as_viewed($db, $user_activity_log_id_form, $user_activity_log_user_id);
if ($result_mark_user_log_entry_as_viewed  === true) {
$frontend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => $text_handlers['user_activity_log_handler_successful_marked'],
'message_url'     => BASE_URL . 'user_activity_log',
'message_button_text'  => $text_handlers['user_activity_log_handler_btn_return'],
]);
frontend_system_message($frontend_system_message, $settings, $activated_theme);
}
} else {
$frontend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => $text_handlers['csrf_text'],
'message_url'     => BASE_URL . 'user_activity_log',
'message_button_text'  => $text_handlers['csrf_btn'],
]);
frontend_system_message($frontend_system_message, $settings, $activated_theme);
}
}
}

render_page($db, $settings, $text_functions, $text_handlers, $text_templates, $text_fatal_error_message, 'frontend_templates', $activated_theme['theme_key'], 'layout', [
'template_name' => 'user_activity_log_template',
'result'  => $result,
'current_page'  => $current_page,
'number_of_pages' => $number_of_pages,
]);
