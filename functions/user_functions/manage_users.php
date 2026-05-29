<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//manage_users.php
//MMXXVI MSCRATCH

function get_email_verification_data(mysqli $db, int $user_id_resend_verification_email_handler) {
$stmt = $db->prepare("SELECT user_id, username, user_email, email_verification_token FROM users WHERE user_id = ?");
$stmt->bind_param('i', $user_id_resend_verification_email_handler);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$stmt->close();
return $row;
}

function get_user_level_by_id(mysqli $db, int $user_id_user_level_form) {
$stmt = $db->prepare("SELECT user_level FROM users WHERE user_id = ?");
$stmt->bind_param('i', $user_id_user_level_form);
$stmt->execute();
$stmt->bind_result($user_level_db);
$stmt->fetch();
$stmt->close();
return $user_level_db;
}

function log_user_level_change(mysqli $db, string $user_level_form, int $user_id_user_level_form, int $id_of_user_who_accesses_the_page_users) {
$actor_user_id = $id_of_user_who_accesses_the_page_users;
$target_user_id = $user_id_user_level_form;
$user_activity = "user_level_changed";

if ($actor_user_id !== $target_user_id) {
$stmt = $db->prepare("INSERT INTO user_activity_log(user_activity, user_activity_timestamp, user_level_snapshot, actor_user_id, target_user_id) VALUES(?, NOW(), ?, ?, ?)");
$stmt->bind_param('ssii', $user_activity, $user_level_form, $actor_user_id, $target_user_id);
if ($stmt->execute()) {
$stmt->close();
return true;
} else {
$stmt->close();
return false;
}
}
}

function get_total_number_of_users(mysqli $db) {
$administrator_user_level = "administrator";
$stmt = $db->prepare("SELECT COUNT(*) AS count_result FROM users WHERE user_level != ?");
$stmt->bind_param('s', $administrator_user_level);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$stmt->close();
return $row['count_result'];
}

function get_paginated_users(mysqli $db, int $offset, int $entries_per_page) {
$administrator_user_level = "administrator";
$stmt = $db->prepare("SELECT user_id, username, user_email, user_level, user_date, last_activity, email_is_verified, TIMESTAMPDIFF(MINUTE,last_activity,NOW()) AS last_activity_minutes FROM users WHERE user_level != ? ORDER BY user_date DESC LIMIT ?, ?");
$stmt->bind_param('sii', $administrator_user_level, $offset, $entries_per_page);
if ($stmt->execute()) {
$result = $stmt->get_result();
$users = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
if ($users !== false && ! empty($users)) {
return $users;
} else {
return false;
}
} else {
return false;
}
}

function check_if_is_administrator(mysqli $db, int $user_id) {
$stmt = $db->prepare("SELECT user_level FROM users WHERE user_id = ?");
$stmt->bind_param('i', $user_id);
$stmt->execute();
$stmt->bind_result($user_level);
$stmt->fetch();
$stmt->close();
if ($user_level === "administrator") {
return true;
} else {
return false;
}
}

function remove_user(mysqli $db, array $text_fatal_error_message, int $user_id_remove_user_confirm_form) {
$result = check_if_is_administrator($db, $user_id_remove_user_confirm_form);
if ($result === false) {
$stmt = $db->prepare("DELETE FROM users WHERE user_id = ? LIMIT 1");
$stmt->bind_param('i', $user_id_remove_user_confirm_form);
$stmt->execute();
$success = $stmt->affected_rows;
$stmt->close();
if ($success === 1) {
return true;
} else {
return false;
}
} else {
$fatal_error_message = ([
'message_title' => $text_fatal_error_message['fatal_error_message_manage_users_remove_title'],
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => $text_fatal_error_message['fatal_error_message_manage_users_remove'],
'view_missing_files'     =>  'no',
]);
fatal_error_message($fatal_error_message, $text_fatal_error_message);
}
}

function update_user_level(mysqli $db, array $text_fatal_error_message, string $user_level_form, int $user_id_user_level_form, int $id_of_user_who_accesses_the_page_users) {
$result = check_if_is_administrator($db, $user_id_user_level_form);
$user_level_db = get_user_level_by_id($db, $user_id_user_level_form);

if ($result === false) {
if ($user_level_db !== $user_level_form && $user_level_form !== "administrator") {
log_user_level_change($db, $user_level_form, $user_id_user_level_form, $id_of_user_who_accesses_the_page_users);
$stmt = $db->prepare("UPDATE users SET user_level = ? WHERE user_id = ? LIMIT 1");
$stmt->bind_param('si', $user_level_form, $user_id_user_level_form);
if ($stmt->execute()) {
$stmt->close();
return true;
} else {
$stmt->close();
return false;
}
}
} else {
$fatal_error_message = ([
'message_title' => $text_fatal_error_message['fatal_error_message_manage_users_update_user_level_title'],
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => $text_fatal_error_message['fatal_error_message_manage_users_update_user_level'],
'view_missing_files'     =>  'no',
]);
fatal_error_message($fatal_error_message, $text_fatal_error_message);
}
}
