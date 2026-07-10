<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//get_request_log.php
//MMXXVI MSCRATCH

function get_total_number_entries_request_log(mysqli $db){
$stmt = $db->query("SELECT COUNT(*) AS count_result FROM request_log");
$row = $stmt->fetch_assoc();
$stmt->free();
return $row['count_result'];
}

function get_paginated_request_log(mysqli $db, int $offset, int $entries_per_page) {
$stmt = $db->prepare("SELECT request_log.request_log_ip_address, request_log.request_log_browser, request_log.request_log_requested_url, request_log.request_log_timestamp, request_log.user_id, users.username FROM request_log LEFT JOIN users ON request_log.user_id = users.user_id ORDER BY request_log.request_log_timestamp DESC LIMIT ?, ?");
$stmt->bind_param('ii', $offset, $entries_per_page);
$stmt->execute();
$result = $stmt->get_result();
$request_log = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
if (! empty($request_log)) {
return $request_log;
} else {
return false;
}
}

function get_request_log(mysqli $db) {
$stmt = $db->query("SELECT request_log.request_log_ip_address, request_log.request_log_browser, request_log.request_log_requested_url, request_log.request_log_timestamp, request_log.user_id, users.username FROM request_log LEFT JOIN users ON request_log.user_id = users.user_id ORDER BY request_log.request_log_timestamp");
$request_log = $stmt->fetch_all(MYSQLI_ASSOC);
$stmt->free();
if (! empty($request_log)) {
return $request_log;
} else {
return false;
}
}

function save_request_log_as_text(array $result) {
$text = '';
$file_name = 'request_log_'. date('Y_m_d_H_i_s'). '.txt';
$file_path = request_logs_path;
$no_registered_user = "no_registered_user";
foreach ($result as $row) {
if ($row['username'] === NULL) {
$text .= $row['request_log_ip_address']. '_'.$row['request_log_browser']. '_'.$row['request_log_requested_url']. '_'.$row['request_log_timestamp'].'_'.$no_registered_user."\r\n";
} else {
$text .= $row['request_log_ip_address']. '_'.$row['request_log_browser']. '_'.$row['request_log_requested_url']. '_'.$row['request_log_timestamp']. '_'.$row['username']."\r\n";
}
}
if (is_writable($file_path)) {
file_put_contents($file_path. '/'. $file_name, $text);
}
}

function remove_entries_request_log(mysqli $db) {
$stmt = $db->prepare("DELETE FROM request_log");
$stmt->execute();
$stmt->close();
return true;
}

function clearing_request_log(mysqli $db, array $text_functions, int $total_number_entries_request_log, array $result) {
$maximum_number_of_entries = 1000;
if ($total_number_entries_request_log >= $maximum_number_of_entries) {
save_request_log_as_text($result);
remove_entries_request_log($db);
}
}
