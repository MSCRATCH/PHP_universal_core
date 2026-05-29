<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//clearing_request_log.php
//MMXXVI MSCRATCH

function save_request_log_as_text(array $result) {
$text = '';
$file_name = 'log_'. date('Y-m-d_H-i-s'). '.txt';
$file_path = logs_path;
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
return true;
} else {
return false;
}
}

function remove_entries_request_log(mysqli $db) {
$stmt = $db->prepare("DELETE FROM request_log");
if ($stmt->execute()) {
$stmt->close();
return true;
} else {
$stmt->close();
return false;
}
}

function clearing_request_log(mysqli $db, array $text_functions, int $total_number_entries_request_log, array $result) {
$maximum_number_of_entries = 1000;
if ($total_number_entries_request_log >= $maximum_number_of_entries) {

$errors = array();

$save_request_log = save_request_log_as_text($result);
if ($save_request_log === false) {
$errors [] = $text_functions['message_request_log_save_failed'];
return $errors;
} else {
$remove_entries_request_log = remove_entries_request_log($db);
if ($remove_entries_request_log === false) {
$errors [] = $text_functions['message_request_log_remove_failed'];
return $errors;
}
}
}
}
