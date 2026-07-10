<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//manage_users.php
//MMXXVI MSCRATCH

function get_user_level_by_id(mysqli $db, int $user_id_user_level_form) {
$stmt = $db->prepare("SELECT user_level FROM users WHERE user_id = ?");
$stmt->bind_param('i', $user_id_user_level_form);
$stmt->execute();
$stmt->bind_result($user_level_db);
$stmt->fetch();
$stmt->close();
return $user_level_db;
}

function get_username_by_id(mysqli $db, int $user_id_remove_form) {
$stmt = $db->prepare("SELECT username FROM users WHERE user_id = ?");
$stmt->bind_param('i', $user_id_remove_form);
$stmt->execute();
$stmt->bind_result($username);
$stmt->fetch();
$stmt->close();
return $username;
}

function save_user_level_snapshot(mysqli $db, string $user_level_form, int $user_id_user_level_form) {
$stmt = $db->prepare("INSERT INTO user_level_snapshots(user_level_snapshot, user_id_snapshot) VALUES (?, ?)");
$stmt->bind_param('si', $user_level_form, $user_id_user_level_form);
$stmt->execute();
$user_level_snapshot_id = $stmt->insert_id;
$stmt->close();
return $user_level_snapshot_id;
}

function save_user_level_notification(mysqli $db, array $feature_flags, string $user_level_form, int $user_id_user_level_form, int $id_of_user_who_accesses_the_page_users) {
if ($feature_flags['notifications_enabled'] === 1) {
$actor_user_id = $id_of_user_who_accesses_the_page_users;
$target_user_id = $user_id_user_level_form;
$notification_type = "user_level_changed";
if ($actor_user_id !== $target_user_id && $user_level_form !== "not_activated") {
$user_level_snapshot_id = save_user_level_snapshot($db, $user_level_form, $user_id_user_level_form);
$stmt = $db->prepare("INSERT INTO notifications(notification_type, actor_user_id, target_user_id, notification_created_at, user_level_snapshot_id) VALUES(?, ?, ?, NOW(), ?)");
$stmt->bind_param('siii', $notification_type, $actor_user_id, $target_user_id, $user_level_snapshot_id);
$stmt->execute();
$stmt->close();
return true;
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
$stmt->execute();
$result = $stmt->get_result();
$users = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
if ($users !== false && ! empty($users)) {
return $users;
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
'message_title' => $text_fatal_error_message['fatal_error_message_remove_administrator_title'],
'message_additional_title' => $text_fatal_error_message['fatal_error_message_remove_administrator_additional_title'],
'message_text'    => $text_fatal_error_message['fatal_error_message_remove_administrator_text'],
]);
fatal_error_message($fatal_error_message, $text_fatal_error_message);
}
}

function update_user_level(mysqli $db, array $text_fatal_error_message, array $feature_flags, string $user_level_form, int $user_id_user_level_form, int $id_of_user_who_accesses_the_page_users) {
$result = check_if_is_administrator($db, $user_id_user_level_form);
$user_level_db = get_user_level_by_id($db, $user_id_user_level_form);

if ($result === false) {
if ($user_level_db !== $user_level_form && $user_level_form !== "administrator") {
save_user_level_notification($db, $feature_flags, $user_level_form, $user_id_user_level_form, $id_of_user_who_accesses_the_page_users);
$stmt = $db->prepare("UPDATE users SET user_level = ? WHERE user_id = ? LIMIT 1");
$stmt->bind_param('si', $user_level_form, $user_id_user_level_form);
$stmt->execute();
$stmt->close();
return true;
}
} else {
$fatal_error_message = ([
'message_title' => $text_fatal_error_message['fatal_error_message_update_administrator_title'],
'message_additional_title' => $text_fatal_error_message['fatal_error_message_update_administrator_additional_title'],
'message_text'    => $text_fatal_error_message['fatal_error_message_update_administrator_text'],
]);
fatal_error_message($fatal_error_message, $text_fatal_error_message);
}
}
