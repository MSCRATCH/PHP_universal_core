<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//manage_comments.php
//MMXXVI MSCRATCH

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
if (! empty($hidden_comments)) {
return $hidden_comments;
} else {
return false;
}
}

function mark_each_hidden_comment_as_viewed(mysqli $db) {
$blog_comment_hidden_viewed = 1;
$stmt = $db->prepare("UPDATE blog_comments SET blog_comment_hidden_viewed = ?");
$stmt->bind_param('i', $blog_comment_hidden_viewed);
$stmt->execute();
$stmt->close();
return true;
}
