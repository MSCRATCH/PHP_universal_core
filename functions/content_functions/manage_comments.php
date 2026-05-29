<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//manage_comments.php
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
if ($blog_comments !== false && ! empty($blog_comments)) {
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
if ($blog_comments !== false && ! empty($blog_comments)) {
return $blog_comments;
} else {
return false;
}
}
}

function log_comment_user_activity(mysqli $db, string $user_activity, int $comment_id, int $user_id_article_handler, string $blog_article_url_get) {
$actor_user_id = $user_id_article_handler;
$target_user_id = get_user_id_of_comment($db, $comment_id);
$blog_article_id = get_article_id_by_article_url($db, $blog_article_url_get);

if ($user_activity === "comment_created") {
$stmt_owner = $db->prepare("SELECT blog_article_user_id FROM blog WHERE blog_article_id = ?");
$stmt_owner->bind_param('i', $blog_article_id);
$stmt_owner->execute();
$stmt_owner->bind_result($id_of_articles_owner);
$stmt_owner->fetch();
$stmt_owner->close();
if ($stmt_owner !== false && $stmt_owner !== NULL) {
$target_user_id = $id_of_articles_owner;
}
}

if ($actor_user_id !== $target_user_id) {
$stmt = $db->prepare("INSERT INTO user_activity_log(user_activity, user_activity_timestamp, blog_comment_id, blog_article_id, actor_user_id, target_user_id) VALUES(?, NOW(), ?, ?, ?, ?)");
$stmt->bind_param('siiii', $user_activity, $comment_id, $blog_article_id, $actor_user_id, $target_user_id);
if ($stmt->execute()) {
$stmt->close();
return true;
} else {
$stmt->close();
return false;
}
}
}

function save_comment(mysqli $db, array $text_functions, string $blog_comment_form, int $user_id_article_handler, string $blog_article_url_get) {

$blog_article_id = get_article_id_by_article_url($db, $blog_article_url_get);

$errors = array();

$user_activity = "comment_created";

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
log_comment_user_activity($db, $user_activity, $comment_id, $user_id_article_handler, $blog_article_url_get);
$stmt->close();
if ($stmt) {
return true;
} else {
return false;
}
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

function hide_comment(mysqli $db, int $blog_comment_id_form, int $user_id_article_handler, string $blog_article_url_get) {
$comment_by_admin = check_if_comment_written_by_admin($db, $blog_comment_id_form);
$comment_user_level = get_comment_user_level($db, $blog_comment_id_form);
$blog_comment_hidden = 1;
$user_activity = "comment_hidden";
$comment_id = $blog_comment_id_form;
if (user_is_administrator() === true && $comment_by_admin === false) {
$stmt = $db->prepare("UPDATE blog_comments SET blog_comment_hidden = ?, blog_comment_hidden_user_id = ?, blog_comment_hidden_timestamp = NOW() WHERE blog_comment_id = ?");
$stmt->bind_param('iii', $blog_comment_hidden, $user_id_article_handler, $blog_comment_id_form);
$result = log_comment_user_activity($db, $user_activity, $comment_id, $user_id_article_handler, $blog_article_url_get);
if ($stmt->execute() && $result === true) {
$stmt->close();
return true;
} else {
$stmt->close();
return false;
}
} elseif (user_is_moderator() === true && $comment_user_level !== "moderator" && $comment_by_admin === false) {
$stmt = $db->prepare("UPDATE blog_comments SET blog_comment_hidden = ?, blog_comment_hidden_user_id = ?, blog_comment_hidden_timestamp = NOW() WHERE blog_comment_id = ?");
$stmt->bind_param('iii', $blog_comment_hidden, $user_id_article_handler, $blog_comment_id_form);
$result = log_comment_user_activity($db, $user_activity, $comment_id, $user_id_article_handler, $blog_article_url_get);
if ($stmt->execute() && $result === true) {
$stmt->close();
return true;
} else {
$stmt->close();
return false;
}
}

}

function restore_comment(mysqli $db, int $blog_comment_id_form, int $user_id_article_handler, string $blog_article_url_get) {
$comment_by_admin = check_if_comment_written_by_admin($db, $blog_comment_id_form);
$comment_user_level = get_comment_user_level($db, $blog_comment_id_form);
$blog_comment_hidden = 0;
$user_activity = "comment_restored";
$comment_id = $blog_comment_id_form;
if (user_is_administrator() === true && $comment_by_admin === false) {
$stmt = $db->prepare("UPDATE blog_comments SET blog_comment_hidden = ?, blog_comment_hidden_user_id = ?, blog_comment_hidden_timestamp = NOW() WHERE blog_comment_id = ?");
$stmt->bind_param('iii', $blog_comment_removed, $user_id_article_handler, $blog_comment_id_form);
$result = log_comment_user_activity($db, $user_activity, $comment_id, $user_id_article_handler, $blog_article_url_get);
if ($stmt->execute() && $result === true) {
$stmt->close();
return true;
} else {
$stmt->close();
return false;
}
} elseif (user_is_moderator() === true && $comment_user_level !== "moderator" && $comment_by_admin === false) {
$stmt = $db->prepare("UPDATE blog_comments SET blog_comment_hidden = ?, blog_comment_hidden_user_id = ?, blog_comment_hidden_timestamp = NOW() WHERE blog_comment_id = ?");
$stmt->bind_param('iii', $blog_comment_removed, $user_id_article_handler, $blog_comment_id_form);
$result = log_comment_user_activity($db, $user_activity, $comment_id, $user_id_article_handler, $blog_article_url_get);
if ($stmt->execute() && $result === true) {
$stmt->close();
return true;
} else {
$stmt->close();
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
$stmt_2 = $db->prepare("UPDATE user_activity_log SET comment_text_snapshot = ?, comment_date_snapshot = ?, blog_article_title_snapshot = ?, blog_article_url_snapshot = ? WHERE blog_comment_id = ?");
$stmt_2->bind_param('ssssi', $blog_comment, $blog_comment_date, $blog_article_title, $blog_article_url, $blog_comment_id_form);
if ($stmt_2->execute()) {
$stmt_2->close();
return true;
} else {
$stmt_2->close();
return false;
}
}

function remove_comment(mysqli $db, int $blog_comment_id_form, int $user_id_article_handler, string $blog_article_url_get) {
$comment_by_admin = check_if_comment_written_by_admin($db, $blog_comment_id_form);
$user_activity = "comment_removed";
$comment_id = $blog_comment_id_form;
if (user_is_administrator() === true && $comment_by_admin === false) {
$result_log_comment_user_activity = log_comment_user_activity($db, $user_activity, $comment_id, $user_id_article_handler, $blog_article_url_get);
$result_save_comment_snapshot = save_comment_snapshot($db, $blog_comment_id_form);
$stmt = $db->prepare("DELETE FROM blog_comments WHERE blog_comment_id = ? LIMIT 1");
$stmt->bind_param('i', $blog_comment_id_form);
if ($stmt->execute() && $result_log_comment_user_activity === true && $result_save_comment_snapshot === true) {
$stmt->close();
return true;
} else {
$stmt->close();
return false;
}
}
}

function number_of_unviewed_hidden_comments(mysqli $db) {
$blog_comment_hidden_viewed = 0;
$blog_comment_hidden = 1;
$stmt = $db->prepare("SELECT COUNT(*) AS count_result FROM blog_comments WHERE blog_comment_hidden_viewed = ? AND blog_comment_hidden = ?");
$stmt->bind_param('ii', $blog_comment_hidden_viewed, $blog_comment_hidden);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$stmt->close();
return $row['count_result'];
}

function get_total_number_of_hidden_comments(mysqli $db) {
$blog_comment_hidden = 1;
$stmt = $db->prepare("SELECT COUNT(*) AS count_result FROM blog_comments WHERE blog_comment_hidden = ?");
$stmt->bind_param('i', $blog_comment_hidden);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$stmt->close();
return $row['count_result'];
}

function get_paginated_hidden_comments(mysqli $db, int $offset, int $entries_per_page) {
$blog_comment_hidden = 1;
$stmt = $db->prepare("SELECT
blog_comments.blog_comment_id,
blog_comments.blog_comment,
blog_comments.blog_comment_date,
blog_comments.blog_article_id,
blog_comments.blog_comment_hidden_timestamp,
blog_comments.blog_comment_hidden_viewed,
users.username AS target_username,
users.user_level AS target_user_level,
actor_user.username AS actor_username,
blog.blog_article_title,
blog.blog_article_url
FROM blog_comments
INNER JOIN users ON blog_comments.user_id = users.user_id
LEFT JOIN users AS actor_user ON blog_comments.blog_comment_hidden_user_id = actor_user.user_id
INNER JOIN blog
ON blog_comments.blog_article_id = blog.blog_article_id
WHERE blog_comments.blog_comment_hidden = ?
ORDER BY blog_comments.blog_comment_hidden_timestamp DESC LIMIT ?, ?");
$stmt->bind_param('iii', $blog_comment_hidden, $offset, $entries_per_page);
$stmt->execute();
$result = $stmt->get_result();
$hidden_comments = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
if ($hidden_comments !== false && ! empty($hidden_comments)) {
return $hidden_comments;
} else {
return false;
}
}

function mark_each_hidden_comment_as_viewed(mysqli $db) {
$blog_comment_hidden_viewed = 1;
$stmt = $db->prepare("UPDATE blog_comments SET blog_comment_hidden_viewed = ?");
$stmt->bind_param('i', $blog_comment_hidden_viewed);
if ($stmt->execute()) {
$stmt->close();
return true;
} else {
$stmt->close();
return false;
}
}
