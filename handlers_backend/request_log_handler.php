<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//request_log_handler.php
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

$entries_per_page = 25;
$current_page = isset($_GET['page']) ? (INT) $_GET['page'] : 1;

$total_number_entries_request_log = get_total_number_entries_request_log($db);

$number_of_pages = calculate_number_of_pages($total_number_entries_request_log, $entries_per_page);
$current_page = validate_page_number($total_number_entries_request_log, $current_page, $entries_per_page);
$offset = calculate_offset($current_page, $entries_per_page);

$result = get_paginated_request_log($db, $offset, $entries_per_page);

render_page($db, $settings, $feature_flags, $text_functions, $text_handlers, $text_templates, $text_fatal_error_message, 'backend_theme', 'backend_layout', [
'template_name' => 'request_log_template',
'template_directory' => 'backend_templates',
'result'        => $result,
'current_page'  => $current_page,
'number_of_pages' => $number_of_pages,
]);
