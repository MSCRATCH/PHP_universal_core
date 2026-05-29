<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//show_user_activity_log_handler.php
//MMXXVI MSCRATCH

//Administrator or moderator access only.
if (user_is_administrator_or_moderator() === false) {
header('Location:'. BASE_URL. 'login');
exit();
}

if (backend_access_is_verified() === false) {
header('Location:'. BASE_URL. 'backend_login');
exit();
}
//Administrator or moderator access only.

$user_id_show_user_activity_log_handler = '';
if (isset($_GET['user_id'])) {
$user_id_show_user_activity_log_handler = (INT) $_GET['user_id'];
} else {
http_error_message(404, $activated_theme);
}

if (activity_log_user_is_administrator($db, $user_id_show_user_activity_log_handler) !== false) {
$backend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => $text_handlers['show_user_activity_log_handler_user_dont_exist'],
'message_url'     => BASE_URL . 'users',
'message_button_text'  => $text_handlers['show_user_activity_log_handler_btn_return'],
]);
backend_system_message($backend_system_message, $settings);
}

$entries_per_page = 25;
$current_page = isset($_GET['page']) ? (INT) $_GET['page'] : 1;

$total_number_of_user_activity_log_entries = get_total_number_of_user_activity_log_entries($db, $user_id_show_user_activity_log_handler);

$number_of_pages = calculate_number_of_pages($total_number_of_user_activity_log_entries, $entries_per_page);
$current_page = validate_page_number($total_number_of_user_activity_log_entries, $current_page, $entries_per_page);
$offset = calculate_offset($current_page, $entries_per_page);

$result = get_paginated_user_activity_log($db, $user_id_show_user_activity_log_handler, $offset, $entries_per_page);

render_page($db, $settings, $text_functions, $text_handlers, $text_templates, $text_fatal_error_message, 'backend_templates', 'backend_theme', 'backend_layout', [
'template_name' => 'show_user_activity_log_template',
'user_id_show_user_activity_log_handler'  => $user_id_show_user_activity_log_handler,
'result'  => $result,
'current_page'  => $current_page,
'number_of_pages' => $number_of_pages,
]);
