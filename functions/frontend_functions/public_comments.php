<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//public_comments.php
//MMXXVI MSCRATCH

function get_article_id_by_article_url(mysqli $db, string $blog_article_url_get) {
$stmt = $db->prepare("SELECT blog_article_id FROM blog WHERE blog_article_url = ?");
$stmt->bind_param('s', $blog_article_url_get);
$stmt->execute();
$stmt->bind_result($blog_article_id);
$stmt->fetch();
$stmt->close();
return $blog_article_id;
}

function get_user_id_of_comment(mysqli $db, int $comment_id) {
$stmt = $db->prepare("SELECT user_id FROM blog_comments WHERE blog_comment_id = ?");
$stmt->bind_param('i', $comment_id);
$stmt->execute();
$stmt->bind_result($user_id);
$stmt->fetch();
$stmt->close();
return $user_id;
}

function get_total_number_of_article_comments(mysqli $db, string $blog_article_url_get) {
if (user_is_administrator_or_moderator() === true) {
$blog_article_id = get_article_id_by_article_url($db, $blog_article_url_get);
$stmt = $db->prepare("SELECT COUNT(*) AS count_result FROM blog_comments WHERE blog_article_id = ?");
$stmt->bind_param('i', $blog_article_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$stmt->close();
return $row['count_result'];
} else {
$blog_article_id = get_article_id_by_article_url($db, $blog_article_url_get);
$stmt = $db->prepare("SELECT COUNT(*) AS count_result FROM blog_comments WHERE blog_article_id = ? AND blog_comment_hidden != 1");
$stmt->bind_param('i', $blog_article_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$stmt->close();
return $row['count_result'];
}
}

function get_paginated_article_comments(mysqli $db, int $offset, int $entries_per_page, string $blog_article_url_get) {
if (user_is_administrator_or_moderator() === true) {
$blog_article_id = get_article_id_by_article_url($db, $blog_article_url_get);
$stmt = $db->prepare("SELECT blog_comments.blog_comment_id, blog_comments.blog_comment, blog_comments.blog_comment_date, blog_comments.blog_comment_hidden, users.username, users.user_level, user_profiles.user_profile_image FROM blog_comments INNER JOIN users ON blog_comments.user_id = users.user_id INNER JOIN user_profiles ON blog_comments.user_id = user_profiles.user_id WHERE blog_comments.blog_article_id = ? ORDER BY blog_comments.blog_comment_date DESC LIMIT ?, ?");
$stmt->bind_param('iii', $blog_article_id, $offset, $entries_per_page);
$stmt->execute();
$result = $stmt->get_result();
$blog_comments = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
if (! empty($blog_comments)) {
return $blog_comments;
} else {
return false;
}
} else {
$blog_article_id = get_article_id_by_article_url($db, $blog_article_url_get);
$stmt = $db->prepare("SELECT blog_comments.blog_comment_id, blog_comments.blog_comment, blog_comments.blog_comment_date, blog_comments.blog_comment_hidden, users.username, users.user_level, user_profiles.user_profile_image FROM blog_comments INNER JOIN users ON blog_comments.user_id = users.user_id INNER JOIN user_profiles ON blog_comments.user_id = user_profiles.user_id WHERE blog_comments.blog_article_id = ? AND blog_comments.blog_comment_hidden != 1 ORDER BY blog_comments.blog_comment_date DESC LIMIT ?, ?");
$stmt->bind_param('iii', $blog_article_id, $offset, $entries_per_page);
$stmt->execute();
$result = $stmt->get_result();
$blog_comments = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
if (! empty($blog_comments)) {
return $blog_comments;
} else {
return false;
}
}
}

function save_comment_snapshot(mysqli $db, int $blog_comment_id_form) {
$stmt_1 = $db->prepare("SELECT blog_comments.blog_comment, blog_comments.blog_comment_date, blog.blog_article_title, blog.blog_article_url FROM blog_comments INNER JOIN blog ON blog_comments.blog_article_id = blog.blog_article_id WHERE blog_comment_id = ?");
$stmt_1->bind_param('i', $blog_comment_id_form);
$stmt_1->execute();
$stmt_1->bind_result($blog_comment, $blog_comment_date, $blog_article_title, $blog_article_url);
$stmt_1->fetch();
$stmt_1->close();
$stmt_2 = $db->prepare("INSERT INTO comment_snapshots(comment_text_snapshot, comment_created_at_snapshot, blog_article_title_snapshot, blog_article_url_snapshot) VALUES (?, ?, ?, ?)");
$stmt_2->bind_param('ssss', $blog_comment, $blog_comment_date, $blog_article_title, $blog_article_url);
$stmt_2->execute();
$comment_snapshot_id = $stmt_2->insert_id;
$stmt_2->close();
return $comment_snapshot_id;
}

function save_comment_notification(mysqli $db, array $feature_flags, string $notification_type, int $comment_id, int $user_id_article_handler, string $blog_article_url_get) {
if ($feature_flags['notifications_enabled'] === 1) {
$actor_user_id = $user_id_article_handler;
$target_user_id = get_user_id_of_comment($db, $comment_id);
$blog_article_id = get_article_id_by_article_url($db, $blog_article_url_get);

if ($notification_type === "comment_created") {
$stmt_owner = $db->prepare("SELECT blog_article_user_id FROM blog WHERE blog_article_id = ?");
$stmt_owner->bind_param('i', $blog_article_id);
$stmt_owner->execute();
$stmt_owner->bind_result($id_of_article_owner);
if ($stmt_owner->fetch()) {
$target_user_id = $id_of_article_owner;
}
$stmt_owner->close();
}

if ($actor_user_id !== $target_user_id) {
$comment_snapshot_id = save_comment_snapshot($db, $comment_id);
$stmt = $db->prepare("INSERT INTO notifications(notification_type, actor_user_id, target_user_id, notification_created_at, comment_snapshot_id) VALUES(?, ?, ?, NOW(), ?)");
$stmt->bind_param('siii', $notification_type, $actor_user_id, $target_user_id, $comment_snapshot_id);
$stmt->execute();
$stmt->close();
return true;
}
}
}

function save_comment(mysqli $db, array $feature_flags, array $text_functions, string $blog_comment_form, int $user_id_article_handler, string $blog_article_url_get) {

$blog_article_id = get_article_id_by_article_url($db, $blog_article_url_get);

$errors = array();

$notification_type = "comment_created";

$link_pattern = '/(https?:\/\/)?(www\.)?[a-z0-9\-]+\.[a-z]{2,6}(\/[^\s]*)?/ix';

if (empty($blog_comment_form)) {
$errors [] = $text_functions['message_manage_comments_no_comment'];
}

if (strlen($blog_comment_form) > 500) {
$errors [] = $text_functions['message_manage_comments_too_long'];
}

if (preg_match($link_pattern, $blog_comment_form)) {
$errors [] = $text_functions['message_manage_comments_contains_link'];
}

if (empty($errors)) {
$stmt = $db->prepare("INSERT INTO blog_comments(blog_comment, blog_comment_date, blog_article_id ,user_id) VALUES(?, NOW(), ?, ?)");
$stmt->bind_param('sii', $blog_comment_form, $blog_article_id, $user_id_article_handler);
$stmt->execute();
$comment_id = $stmt->insert_id;
save_comment_notification($db, $feature_flags, $notification_type, $comment_id, $user_id_article_handler, $blog_article_url_get);
$stmt->close();
return true;
} else {
return $errors;
}
}

function check_if_comment_written_by_admin(mysqli $db, int $blog_comment_id_form) {
$stmt = $db->prepare("SELECT users.user_level FROM blog_comments INNER JOIN users ON blog_comments.user_id = users.user_id WHERE blog_comment_id = ?");
$stmt->bind_param('i', $blog_comment_id_form);
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

function get_comment_user_level(mysqli $db, int $blog_comment_id_form) {
$stmt = $db->prepare("SELECT users.user_level FROM blog_comments INNER JOIN users ON blog_comments.user_id = users.user_id WHERE blog_comment_id = ?");
$stmt->bind_param('i', $blog_comment_id_form);
$stmt->execute();
$stmt->bind_result($user_level);
$stmt->fetch();
$stmt->close();
return $user_level;
}

function hide_comment(mysqli $db, array $feature_flags, int $blog_comment_id_form, int $user_id_article_handler, string $blog_article_url_get) {
$comment_by_admin = check_if_comment_written_by_admin($db, $blog_comment_id_form);
$comment_user_level = get_comment_user_level($db, $blog_comment_id_form);
$blog_comment_hidden = 1;
$notification_type = "comment_hidden";
$comment_id = $blog_comment_id_form;
if (user_is_administrator() === true && $comment_by_admin === false) {
$stmt = $db->prepare("UPDATE blog_comments SET blog_comment_hidden = ?, blog_comment_hidden_user_id = ?, blog_comment_hidden_timestamp = NOW() WHERE blog_comment_id = ?");
$stmt->bind_param('iii', $blog_comment_hidden, $user_id_article_handler, $blog_comment_id_form);
$result = save_comment_notification($db, $feature_flags, $notification_type, $comment_id, $user_id_article_handler, $blog_article_url_get);
$stmt->execute();
$stmt->close();
return true;
} elseif (user_is_moderator() === true && $comment_user_level !== "moderator" && $comment_by_admin === false) {
$stmt = $db->prepare("UPDATE blog_comments SET blog_comment_hidden = ?, blog_comment_hidden_user_id = ?, blog_comment_hidden_timestamp = NOW() WHERE blog_comment_id = ?");
$stmt->bind_param('iii', $blog_comment_hidden, $user_id_article_handler, $blog_comment_id_form);
save_comment_notification($db, $feature_flags, $notification_type, $comment_id, $user_id_article_handler, $blog_article_url_get);
$stmt->execute();
$stmt->close();
return true;
}
}

function restore_comment(mysqli $db, array $feature_flags, int $blog_comment_id_form, int $user_id_article_handler, string $blog_article_url_get) {
$comment_by_admin = check_if_comment_written_by_admin($db, $blog_comment_id_form);
$comment_user_level = get_comment_user_level($db, $blog_comment_id_form);
$blog_comment_hidden = 0;
$blog_comment_hidden_viewed = 0;
$notification_type = "comment_restored";
$comment_id = $blog_comment_id_form;
if (user_is_administrator() === true && $comment_by_admin === false) {
$stmt = $db->prepare("UPDATE blog_comments SET blog_comment_hidden = ?, blog_comment_hidden_user_id = ?, blog_comment_hidden_timestamp = NOW(), blog_comment_hidden_viewed = ? WHERE blog_comment_id = ?");
$stmt->bind_param('iiii', $blog_comment_hidden, $user_id_article_handler, $blog_comment_hidden_viewed, $blog_comment_id_form);
save_comment_notification($db, $feature_flags, $notification_type, $comment_id, $user_id_article_handler, $blog_article_url_get);
$stmt->execute();
$stmt->close();
return true;
} elseif (user_is_moderator() === true && $comment_user_level !== "moderator" && $comment_by_admin === false) {
$stmt = $db->prepare("UPDATE blog_comments SET blog_comment_hidden = ?, blog_comment_hidden_user_id = ?, blog_comment_hidden_timestamp = NOW(), blog_comment_hidden_viewed = ? WHERE blog_comment_id = ?");
$stmt->bind_param('iiii', $blog_comment_hidden, $user_id_article_handler, $blog_comment_hidden_viewed, $blog_comment_id_form);
save_comment_notification($db, $feature_flags, $notification_type, $comment_id, $user_id_article_handler, $blog_article_url_get);
$stmt->execute();
$stmt->close();
return true;
}
}

function remove_comment(mysqli $db, array $feature_flags, int $blog_comment_id_form, int $user_id_article_handler, string $blog_article_url_get) {
$comment_by_admin = check_if_comment_written_by_admin($db, $blog_comment_id_form);
$notification_type = "comment_removed";
$comment_id = $blog_comment_id_form;
if (user_is_administrator() === true && $comment_by_admin === false) {
save_comment_notification($db, $feature_flags, $notification_type, $comment_id, $user_id_article_handler, $blog_article_url_get);
$stmt = $db->prepare("DELETE FROM blog_comments WHERE blog_comment_id = ? LIMIT 1");
$stmt->bind_param('i', $blog_comment_id_form);
$stmt->execute();
$stmt->close();
return true;
}
}
