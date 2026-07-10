<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//notifications_handler.php
//MMXXVI MSCRATCH

//Access only by users who are logged in.
if (user_is_logged_in() === false) {
die("Direct access to this file is restricted.");
}
//Access only by users who are logged in.

if (user_is_logged_in() === true) {
$notifications_user_id = get_user_id();
}

$entries_per_page = 25;
$current_page = isset($_GET['page']) ? (INT) $_GET['page'] : 1;

$total_number_of_notifications_by_user = get_total_number_of_notifications_by_user($db, $notifications_user_id);

$number_of_pages = calculate_number_of_pages($total_number_of_notifications_by_user, $entries_per_page);
$current_page = validate_page_number($total_number_of_notifications_by_user, $current_page, $entries_per_page);
$offset = calculate_offset($current_page, $entries_per_page);

$result = get_paginated_notifications_by_user($db, $offset, $entries_per_page, $notifications_user_id);


if (isset($_POST['csrf_token'])) {
if (isset($_POST['mark_each_notification_as_viewed'])) {
if (validate_token('mark_each_notification_as_viewed', $_POST['csrf_token'])) {

$result_mark_each_notification_as_viewed = mark_each_notification_as_viewed($db, $notifications_user_id);
if ($result_mark_each_notification_as_viewed  === true) {
$frontend_system_message = ([
'message_text'    => $text_handlers['notifications_handler_successful_marked_all'],
'message_url'     => BASE_URL . 'notifications',
'message_button_text'  => $text_handlers['notifications_handler_btn_return'],
]);
frontend_system_message($frontend_system_message, $settings, $activated_theme);
}
} else {
$frontend_system_message = ([
'message_text'    => $text_handlers['csrf_text'],
'message_url'     => BASE_URL . 'notifications',
'message_button_text'  => $text_handlers['csrf_btn'],
]);
frontend_system_message($frontend_system_message, $settings, $activated_theme);
}
}
}

if (isset($_POST['csrf_token'])) {
if (isset($_POST['mark_notification_as_viewed'])) {
if (validate_token('mark_notification_as_viewed', $_POST['csrf_token'])) {

$notification_id_form = '';
if (isset($_POST['notification_id_form'])) {
$notification_id_form = (INT) $_POST['notification_id_form'];
}

$result_mark_notification_as_viewed = mark_notification_as_viewed($db, $notification_id_form, $notifications_user_id);
if ($result_mark_notification_as_viewed  === true) {
$frontend_system_message = ([
'message_text'    => $text_handlers['notifications_handler_successful_marked'],
'message_url'     => BASE_URL . 'notifications',
'message_button_text'  => $text_handlers['notifications_handler_btn_return'],
]);
frontend_system_message($frontend_system_message, $settings, $activated_theme);
}
} else {
$frontend_system_message = ([
'message_text'    => $text_handlers['csrf_text'],
'message_url'     => BASE_URL . 'notifications',
'message_button_text'  => $text_handlers['csrf_btn'],
]);
frontend_system_message($frontend_system_message, $settings, $activated_theme);
}
}
}

$layout = $activated_theme['layout_config']['layouts']['notifications_handler'] ?? 'layout';
$template_directory = $activated_theme['template_config']['templates']['template_directory'] ?? 'frontend_templates';
$template = $activated_theme['template_config']['templates']['notifications_handler'] ?? 'notifications_template';

render_page($db, $settings, $feature_flags, $text_functions, $text_handlers, $text_templates, $text_fatal_error_message, $activated_theme['theme_key'], $layout, [
'template_name' => $template,
'template_directory' => $template_directory,
'result'  => $result,
'current_page'  => $current_page,
'number_of_pages' => $number_of_pages,
]);
