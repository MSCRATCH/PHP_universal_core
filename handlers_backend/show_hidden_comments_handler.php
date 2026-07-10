<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//show_hidden_comments_handler.php
//MMXXVI MSCRATCH

//Administrator or moderator access only.
if (user_is_administrator_or_moderator() === false) {
die("Direct access to this file is restricted.");
}

if (backend_access_is_verified() === false) {
header('Location:'. BASE_URL. 'backend_login');
exit();
}
//Administrator or moderator access only.

$entries_per_page = 25;
$current_page = isset($_GET['page']) ? (INT) $_GET['page'] : 1;

$total_number_of_hidden_comments = get_total_number_of_hidden_comments($db);

$number_of_pages = calculate_number_of_pages($total_number_of_hidden_comments, $entries_per_page);
$current_page = validate_page_number($total_number_of_hidden_comments, $current_page, $entries_per_page);
$offset = calculate_offset($current_page, $entries_per_page);

$result = get_paginated_hidden_comments($db, $offset, $entries_per_page);

if (isset($_POST['csrf_token'])) {
if (isset($_POST['mark_comments_as_viewed'])) {
if (validate_token('mark_comments_as_viewed', $_POST['csrf_token'])) {

$result_mark_each_hidden_comment_as_viewed = mark_each_hidden_comment_as_viewed($db);
if ($result_mark_each_hidden_comment_as_viewed === true) {
$backend_system_message = ([
'message_text'    => $text_handlers['show_hidden_comments_handler_successful_viewed'],
'message_url'     => BASE_URL . 'show_hidden_comments'. '/page/'. $current_page,
'message_button_text'  => $text_handlers['show_hidden_comments_handler_btn_return'],
]);
backend_system_message($backend_system_message, $settings);
}
} else {
$backend_system_message = ([
'message_text'    => $text_handlers['csrf_text'],
'message_url'     => BASE_URL . 'show_hidden_comments'. '/page/'. $current_page,
'message_button_text'  => $text_handlers['csrf_btn'],
]);
backend_system_message($backend_system_message, $settings);
}
}
}

render_page($db, $settings, $feature_flags, $text_functions, $text_handlers, $text_templates, $text_fatal_error_message, 'backend_theme', 'backend_layout', [
'template_name' => 'show_hidden_comments_template',
'template_directory' => 'backend_templates',
'result'  => $result,
'current_page'  => $current_page,
'number_of_pages' => $number_of_pages,
]);
