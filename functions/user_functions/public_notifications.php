<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//public_notifications.php
//MMXXVI MSCRATCH

function number_of_unviewed_notifications(mysqli $db, int $user_id_header) {
$stmt = $db->prepare("SELECT COUNT(*) AS count_result FROM notifications WHERE target_user_id = ? AND notification_viewed != 1");
$stmt->bind_param('i', $user_id_header);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$stmt->close();
return $row['count_result'];
}

function get_total_number_of_notifications_by_user(mysqli $db, int $notifications_user_id) {
$stmt = $db->prepare("SELECT COUNT(*) AS count_result FROM notifications WHERE target_user_id = ?");
$stmt->bind_param('i', $notifications_user_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$stmt->close();
return $row['count_result'];
}

function get_paginated_notifications_by_user(mysqli $db, int $offset, int $entries_per_page, int $notifications_user_id) {
$stmt = $db->prepare("SELECT
n.notification_id,
n.notification_type,
n.notification_created_at,
n.notification_viewed,
cs.comment_text_snapshot,
cs.comment_created_at_snapshot,
cs.blog_article_title_snapshot,
cs.blog_article_url_snapshot,
uls.user_level_snapshot,
actor.user_id AS actor_user_id,
actor.username AS actor_username,
target.user_id AS target_user_id,
target.username AS target_username,
target.user_level AS target_user_level
FROM notifications n
INNER JOIN users actor
ON n.actor_user_id = actor.user_id
LEFT JOIN users target
ON n.target_user_id = target.user_id
LEFT JOIN comment_snapshots cs
ON n.comment_snapshot_id = cs.comment_snapshot_id
LEFT JOIN user_level_snapshots uls
ON n.user_level_snapshot_id = uls.user_level_snapshot_id
WHERE n.target_user_id = ?
ORDER BY n.notification_created_at DESC
LIMIT ?, ?");
$stmt->bind_param('iii', $notifications_user_id, $offset, $entries_per_page);
$stmt->execute();
$result = $stmt->get_result();
$notifications_by_user = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
if (! empty($notifications_by_user)) {
return $notifications_by_user;
} else {
return false;
}
}

function mark_notification_as_viewed(mysqli $db, int $notification_id_form, int $notifications_user_id) {
$notification_viewed = 1;
$stmt = $db->prepare("UPDATE notifications SET notification_viewed = ? WHERE notification_id = ? AND target_user_id = ? LIMIT 1");
$stmt->bind_param('iii', $notification_viewed, $notification_id_form, $notifications_user_id);
$stmt->execute();
$stmt->close();
return true;
}

function mark_each_notification_as_viewed(mysqli $db, int $notifications_user_id) {
$notification_viewed = 1;
$stmt = $db->prepare("UPDATE notifications SET notification_viewed = ? WHERE target_user_id = ?");
$stmt->bind_param('ii', $notification_viewed, $notifications_user_id);
$stmt->execute();
$stmt->close();
return true;
}
