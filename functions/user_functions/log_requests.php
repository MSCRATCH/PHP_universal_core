<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//log_requests.php
//MMXXVI MSCRATCH

function get_clients_ip_address() {
if (isset($_SERVER['REMOTE_ADDR'])) {
$clients_ip_address = $_SERVER['REMOTE_ADDR'];
if (filter_var($clients_ip_address, FILTER_VALIDATE_IP)) {
return $clients_ip_address;
} else {
return $clients_ip_address = "invalid_ip_address";
}
}
}

function get_clients_browser() {
if (isset($_SERVER['HTTP_USER_AGENT'])) {
return $clients_browser = $_SERVER['HTTP_USER_AGENT'];
} else {
return $clients_browser = "unknown_browser";
}
}

function get_clients_requested_url() {
if (isset($_SERVER['REQUEST_URI'])) {
$clients_requested_url = $_SERVER['REQUEST_URI'];
filter_var($clients_requested_url, FILTER_SANITIZE_URL);
return $clients_requested_url;
}
}

function is_client_registered() {
if (user_is_logged_in()) {
return $client_user_id = get_user_id();
} else {
return $client_user_id = NULL;
}
}

function log_requests(mysqli $db) {
$request_log_ip_address = get_clients_ip_address();
$request_log_browser = get_clients_browser();
$request_log_requested_url = get_clients_requested_url();
$request_log_user_id = is_client_registered();
$section = $_GET['p'] ?? '';
if ($section !== "request_log") {
$stmt = $db->prepare("INSERT INTO request_log(request_log_ip_address, request_log_browser, request_log_requested_url, user_id, request_log_timestamp) VALUES(?, ?, ?, ?, NOW())");
$stmt->bind_param('sssi', $request_log_ip_address, $request_log_browser, $request_log_requested_url, $request_log_user_id);
$stmt->execute();
}
}
