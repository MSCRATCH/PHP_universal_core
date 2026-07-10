<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//get_dashboard_stats.php
//MMXXVI MSCRATCH

function get_system_data(mysqli $db){
$system_data = array();
$system_data ['php_version'] = phpversion();
$system_data ['webserver_software'] = $_SERVER['SERVER_SOFTWARE'];
$system_data ['db_software'] = mysqli_get_server_info($db);
return $system_data;
}

function get_most_recent_users(mysqli $db) {
$stmt = $db->query("SELECT user_id, username, user_level FROM users ORDER BY user_date DESC LIMIT 5");
$most_recent_users = $stmt->fetch_all(MYSQLI_ASSOC);
$stmt->free();
if (! empty($most_recent_users)) {
return $most_recent_users;
} else {
return false;
}
}

function get_online_users(mysqli $db) {
$stmt = $db->query("SELECT user_id, username FROM users WHERE TIMESTAMPDIFF(MINUTE,last_activity,NOW()) <= 5 ORDER BY user_date LIMIT 5");
$online_users = $stmt->fetch_all(MYSQLI_ASSOC);
$stmt->free();
if (! empty($online_users)) {
return $online_users;
} else {
return false;
}
}

function get_not_activated_users(mysqli $db) {
$not_activated_user_level = "not_activated";
$stmt = $db->prepare("SELECT user_id, username FROM users WHERE user_level = ? ORDER BY user_date DESC LIMIT 5");
$stmt->bind_param('s', $not_activated_user_level);
$stmt->execute();
$result = $stmt->get_result();
$not_activated_users = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
if (! empty($not_activated_users)) {
return $not_activated_users;
} else {
return false;
}
}

function get_moderators(mysqli $db) {
$moderator_user_level = "moderator";
$stmt = $db->prepare("SELECT user_id, username FROM users WHERE user_level = ? ORDER BY user_date DESC LIMIT 5");
$stmt->bind_param('s', $moderator_user_level);
$stmt->execute();
$result_get_moderators = $stmt->get_result();
$moderators = $result_get_moderators->fetch_all(MYSQLI_ASSOC);
$stmt->close();
if (! empty($moderators)) {
return $moderators;
} else {
return false;
}
}

function check_if_request_logs_is_writable() {
if (is_writable(request_logs_path)) {
return true;
} else {
return false;
}
}

function check_if_db_error_logs_is_writable() {
if (is_writable(db_error_logs_path)) {
return true;
} else {
return false;
}
}

function check_if_file_system_logs_is_writable() {
if (is_writable(file_system_logs_path)) {
return true;
} else {
return false;
}
}

function check_if_system_error_logs_is_writable() {
if (is_writable(system_error_logs_path)) {
return true;
} else {
return false;
}
}


function check_file_system_logs() {
$file_system_logs = glob(file_system_logs_path . '/*');
if (empty($file_system_logs)) {
return true;
} else {
return false;
}
}

function check_db_error_logs() {
$db_error_logs = glob(db_error_logs_path . '/*');
if (empty($db_error_logs)) {
return true;
} else {
return false;
}
}

function check_system_error_logs() {
$system_error_logs = glob(system_error_logs_path . '/*');
if (empty($system_error_logs)) {
return true;
} else {
return false;
}
}
