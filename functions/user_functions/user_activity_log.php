<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//user_activity_log.php
//MMXXVI MSCRATCH

function number_of_unviewed_user_activity_log_entries(mysqli $db, int $user_id_header) {
$stmt = $db->prepare("SELECT COUNT(*) AS count_result FROM user_activity_log WHERE target_user_id = ? AND user_activity_log_viewed != 1");
$stmt->bind_param('i', $user_id_header);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$stmt->close();
return $row['count_result'];
}

function number_of_user_activity_log_entries(mysqli $db, int $user_id) {
$stmt = $db->prepare("SELECT COUNT(*) AS count_result FROM user_activity_log WHERE target_user_id = ? OR actor_user_id = ?");
$stmt->bind_param('ii', $user_id, $user_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$stmt->close();
return $row['count_result'];
}

function activity_log_user_is_administrator(mysqli $db, int $user_id_show_user_activity_log_handler) {
$stmt = $db->prepare("SELECT user_level FROM users WHERE user_id = ?");
$stmt->bind_param('i', $user_id_show_user_activity_log_handler);
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

function get_total_number_of_user_activity_log_entries_by_user(mysqli $db, int $user_activity_log_user_id) {
$stmt = $db->prepare("SELECT COUNT(*) AS count_result FROM user_activity_log WHERE target_user_id = ?");
$stmt->bind_param('i', $user_activity_log_user_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$stmt->close();
return $row['count_result'];
}

function get_paginated_user_activity_log_by_user(mysqli $db, int $offset, int $entries_per_page, int $user_activity_log_user_id) {
$stmt = $db->prepare("SELECT
cal.user_activity_log_id,
cal.user_activity,
cal.user_activity_timestamp,
cal.comment_text_snapshot,
cal.comment_date_snapshot,
cal.blog_article_title_snapshot,
cal.blog_article_url_snapshot,
cal.user_level_snapshot,
cal.user_activity_log_viewed,
bc.blog_comment,
bc.blog_comment_date,
b.blog_article_id,
b.blog_article_title,
b.blog_article_url,
b.blog_article_user_id AS article_owner_id,
actor.user_id AS actor_user_id,
actor.username AS actor_username,
target.user_id AS target_user_id,
target.username AS target_username,
target.user_level AS target_user_level
FROM user_activity_log cal
INNER JOIN users actor
ON cal.actor_user_id = actor.user_id
LEFT JOIN users target ON cal.target_user_id = target.user_id LEFT JOIN blog_comments bc ON cal.blog_comment_id = bc.blog_comment_id
LEFT JOIN blog b ON cal.blog_article_id = b.blog_article_id WHERE cal.target_user_id = ? ORDER BY cal.user_activity_timestamp DESC LIMIT ?, ?");
$stmt->bind_param('iii', $user_activity_log_user_id, $offset, $entries_per_page);
$stmt->execute();
$result = $stmt->get_result();
$user_activity_log_by_user = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
if ($user_activity_log_by_user !== false && ! empty($user_activity_log_by_user)) {
return $user_activity_log_by_user;
} else {
return false;
}
}

function get_total_number_of_user_activity_log_entries(mysqli $db, int $user_id_show_user_activity_log_handler) {
$stmt = $db->prepare("SELECT COUNT(*) AS count_result FROM user_activity_log WHERE target_user_id = ? or actor_user_id = ?");
$stmt->bind_param('ii', $user_id_show_user_activity_log_handler, $user_id_show_user_activity_log_handler);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$stmt->close();
return $row['count_result'];
}

function get_paginated_user_activity_log(mysqli $db, int $user_id_show_user_activity_log_handler, int $offset, int $entries_per_page) {
$stmt = $db->prepare("SELECT
cal.user_activity,
cal.user_activity_timestamp,
cal.blog_article_url_snapshot,
cal.user_level_snapshot,
cal.user_activity_log_viewed,
b.blog_article_url,
actor.username AS actor_username,
target.username AS target_username,
target.user_level AS target_user_level
FROM user_activity_log cal
INNER JOIN users actor
ON cal.actor_user_id = actor.user_id
LEFT JOIN users target ON cal.target_user_id = target.user_id LEFT JOIN blog_comments bc ON cal.blog_comment_id = bc.blog_comment_id
LEFT JOIN blog b ON cal.blog_article_id = b.blog_article_id WHERE cal.target_user_id = ? or cal.actor_user_id = ? ORDER BY cal.user_activity_timestamp DESC LIMIT ?, ?");
$stmt->bind_param('iiii', $user_id_show_user_activity_log_handler, $user_id_show_user_activity_log_handler, $offset, $entries_per_page);
$stmt->execute();
$result = $stmt->get_result();
$user_activity_log = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
if ($user_activity_log !== false && ! empty($user_activity_log)) {
return $user_activity_log;
} else {
return false;
}
}

function mark_user_log_entry_as_viewed(mysqli $db, int $user_activity_log_id_form, int $user_activity_log_user_id) {
$user_activity_log_viewed = 1;
$stmt = $db->prepare("UPDATE user_activity_log SET user_activity_log_viewed = ? WHERE user_activity_log_id = ? AND target_user_id = ? LIMIT 1");
$stmt->bind_param('iii', $user_activity_log_viewed, $user_activity_log_id_form, $user_activity_log_user_id);
if ($stmt->execute()) {
$stmt->close();
return true;
} else {
$stmt->close();
return false;
}
}

function mark_each_user_log_entry_as_viewed(mysqli $db, int $user_activity_log_user_id) {
$user_activity_log_viewed = 1;
$stmt = $db->prepare("UPDATE user_activity_log SET user_activity_log_viewed = ? WHERE target_user_id = ?");
$stmt->bind_param('ii', $user_activity_log_viewed, $user_activity_log_user_id);
if ($stmt->execute()) {
$stmt->close();
return true;
} else {
$stmt->close();
return false;
}
}
