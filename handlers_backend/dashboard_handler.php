<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//dashboard_handler.php
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

if ($feature_flags['log_requests_enabled'] === 1) {
$result = get_request_log($db);
$total_number_entries_request_log = get_total_number_entries_request_log($db);
clearing_request_log($db, $text_functions, $total_number_entries_request_log, $result);
}

$check_db_error_logs = check_db_error_logs();
$check_file_system_logs = check_file_system_logs();
$check_system_error_logs = check_system_error_logs();

$check_if_db_error_logs_is_writable = check_if_db_error_logs_is_writable();
$check_if_file_system_logs_is_writable = check_if_file_system_logs_is_writable();
$check_if_request_logs_is_writable = check_if_request_logs_is_writable();
$check_if_system_error_logs_is_writable = check_if_system_error_logs_is_writable();

$upload_max_filesize = ini_get('upload_max_filesize');
$post_max_size =  ini_get('post_max_size');

$system_data = get_system_data($db);
$most_recent_users = get_most_recent_users($db);
$online_users = get_online_users($db);
$not_activated_users = get_not_activated_users($db);
$moderators = get_moderators($db);

render_page($db, $settings, $feature_flags, $text_functions, $text_handlers, $text_templates, $text_fatal_error_message, 'backend_theme', 'backend_layout', [
'check_if_db_error_logs_is_writable' => $check_if_db_error_logs_is_writable,
'check_if_file_system_logs_is_writable' => $check_if_file_system_logs_is_writable,
'check_if_request_logs_is_writable' => $check_if_request_logs_is_writable,
'check_if_system_error_logs_is_writable' => $check_if_system_error_logs_is_writable,
'check_db_error_logs' => $check_db_error_logs,
'check_file_system_logs' => $check_file_system_logs,
'check_system_error_logs' => $check_system_error_logs,
'upload_max_filesize' => $upload_max_filesize,
'post_max_size' => $post_max_size,
'template_name' => 'dashboard_template',
'template_directory' => 'backend_templates',
'system_data' => $system_data,
'most_recent_users' => $most_recent_users,
'online_users' => $online_users,
'not_activated_users' => $not_activated_users,
'moderators' => $moderators,
]);
