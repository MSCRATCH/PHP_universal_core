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
if ($request_log !== false && ! empty($request_log)) {
return $request_log;
} else {
return false;
}
}

function get_request_log(mysqli $db) {
$stmt = $db->query("SELECT request_log.request_log_ip_address, request_log.request_log_browser, request_log.request_log_requested_url, request_log.request_log_timestamp, request_log.user_id, users.username FROM request_log LEFT JOIN users ON request_log.user_id = users.user_id ORDER BY request_log.request_log_timestamp");
$request_log = $stmt->fetch_all(MYSQLI_ASSOC);
$stmt->free();
if ($request_log !== false && ! empty($request_log)) {
return $request_log;
} else {
return false;
}
}
