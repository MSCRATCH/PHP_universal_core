<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//manage_blog.php
//MMXXVI MSCRATCH

function get_total_number_of_blog_articles(mysqli $db){
$stmt = $db->query("SELECT COUNT(*) AS count_result FROM blog");
$row = $stmt->fetch_assoc();
$stmt->free();
return $row['count_result'];
}

function get_paginated_blog_articles(mysqli $db, int $offset, int $entries_per_page) {
$stmt = $db->prepare("SELECT blog.blog_article_id, blog.blog_article_url, blog.blog_article_title, blog.blog_article_date, blog.blog_article_preview, users.username, COUNT(blog_comments.blog_comment_id) AS comment_count FROM blog INNER JOIN users ON blog.blog_article_user_id = users.user_id LEFT JOIN blog_comments ON blog.blog_article_id = blog_comments.blog_article_id GROUP BY blog.blog_article_id ORDER BY blog.blog_article_date DESC LIMIT ?, ?");
$stmt->bind_param('ii', $offset, $entries_per_page);
$stmt->execute();
$result = $stmt->get_result();
$blog_articles = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
if ($blog_articles !== false && ! empty($blog_articles)) {
return $blog_articles;
} else {
return false;
}
}

function get_blog_article_by_url(mysqli $db, string $blog_article_url_get) {
$stmt = $db->prepare("SELECT blog.blog_article_id, blog.blog_article_title, blog.blog_article_date, blog.blog_article_content, users.username FROM blog INNER JOIN users ON blog.blog_article_user_id = users.user_id WHERE blog.blog_article_url = ?");
$stmt->bind_param('s', $blog_article_url_get);
$stmt->execute();
$result = $stmt->get_result();
if ($result && $row = $result->fetch_assoc()) {
$stmt->close();
return $row;
} else {
$stmt->close();
return false;
}
}

function get_total_number_of_blog_article_by_user(mysqli $db, int $user_id_blog_article){
if (user_is_administrator() === true) {
$stmt = $db->query("SELECT COUNT(*) AS count_result FROM blog");
$row = $stmt->fetch_assoc();
$stmt->free();
return $row['count_result'];
} elseif (user_is_moderator() === true) {
$stmt = $db->prepare("SELECT COUNT(*) AS count_result FROM blog WHERE blog_article_user_id = ?");
$stmt->bind_param('i', $user_id_blog_article);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$stmt->close();
return $row['count_result'];
}
}

function get_paginated_blog_articles_by_user(mysqli $db, int $offset, int $entries_per_page, int $user_id_blog_article) {
if (user_is_administrator() === true) {
$stmt = $db->prepare("SELECT blog.blog_article_id, blog.blog_article_title, blog.blog_article_url, blog.blog_article_date, users.username FROM blog INNER JOIN users ON blog.blog_article_user_id = users.user_id ORDER BY blog_article_date DESC LIMIT ?, ?");
$stmt->bind_param('ii', $offset, $entries_per_page);
$stmt->execute();
$result = $stmt->get_result();
$blog_articles = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
if ($blog_articles !== false && ! empty($blog_articles)) {
return $blog_articles;
} else {
return false;
}
} elseif (user_is_moderator() === true) {
$stmt = $db->prepare("SELECT blog_article_id, blog_article_title, blog_article_url, blog_article_date FROM blog WHERE blog_article_user_id = ? ORDER BY blog_article_date DESC LIMIT ?, ?");
$stmt->bind_param('iii', $user_id_blog_article, $offset, $entries_per_page);
$stmt->execute();
$result = $stmt->get_result();
$blog_articles = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
if ($blog_articles !== false && ! empty($blog_articles)) {
return $blog_articles;
} else {
return false;
}
}
}

function check_blog_article_id_by_user(mysqli $db, int $blog_article_id_get, int $user_id_blog_article) {
if (user_is_administrator() === true) {
$stmt = $db->prepare("SELECT blog_article_id FROM blog WHERE blog_article_id = ?");
$stmt->bind_param('i', $blog_article_id_get);
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows !== 1) {
$stmt->close();
return false;
} else {
$stmt->close();
return true;
}
} elseif (user_is_moderator() === true) {
$stmt = $db->prepare("SELECT blog_article_id FROM blog WHERE blog_article_id = ? AND blog_article_user_id = ?");
$stmt->bind_param('ii', $blog_article_id_get, $user_id_blog_article);
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows !== 1) {
$stmt->close();
return false;
} else {
$stmt->close();
return true;
}
}
}

function get_blog_article_by_id_and_by_user(mysqli $db, int $blog_article_id_get, int $user_id_blog_article) {
if (user_is_administrator() === true) {
$stmt = $db->prepare("SELECT blog.blog_article_title, blog.blog_article_date, blog.blog_article_preview, blog.blog_article_content, users.username FROM blog INNER JOIN users ON blog.blog_article_user_id = users.user_id WHERE blog.blog_article_id = ?");
$stmt->bind_param('i', $blog_article_id_get);
$stmt->execute();
$result = $stmt->get_result();
if ($result && $row = $result->fetch_assoc()) {
$stmt->close();
return $row;
} else {
$stmt->close();
return false;
}
} elseif (user_is_moderator() === true) {
$stmt = $db->prepare("SELECT blog_article_title, blog_article_date, blog_article_preview, blog_article_content FROM blog WHERE blog_article_id = ? AND blog_article_user_id = ?");
$stmt->bind_param('ii', $blog_article_id_get, $user_id_blog_article);
$stmt->execute();
$result = $stmt->get_result();
if ($result && $row = $result->fetch_assoc()) {
$stmt->close();
return $row;
} else {
$stmt->close();
return false;
}
}
}

function check_if_url_already_exists(mysqli $db, string $blog_article_title, ?int $blog_article_id_get = NULL) {
if ($blog_article_id_get) {
$stmt = $db->prepare("SELECT blog_article_url FROM blog WHERE blog_article_url = ? AND blog_article_id != ?");
$stmt->bind_param('si', $blog_article_title, $blog_article_id_get);
} else {
$stmt = $db->prepare("SELECT blog_article_url FROM blog WHERE blog_article_url = ?");
$stmt->bind_param('s', $blog_article_title);
}
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows === 1) {
$stmt->close();
return true;
} else {
$stmt->close();
return false;
}
}

function make_safe_article_url(mysqli $db, string $blog_article_title, ?int $blog_article_id_get = NULL) {
$safe_url = strtolower($blog_article_title ?? '');
$safe_url = preg_replace('/[\s-]+/', '_', $safe_url);
$safe_url = preg_replace('/[^a-z0-9_]/', '', $safe_url);
$safe_url = preg_replace('/_+/', '_', $safe_url);
$safe_url = trim($safe_url, '_');
$counter = 1;
$original_safe_url = $safe_url;
while (check_if_url_already_exists($db, $safe_url, $blog_article_id_get)) {
$counter++;
$safe_url = $original_safe_url. '_'. $counter;
}
return $safe_url;
}

function save_blog_article(mysqli $db, array $text_functions, string $blog_article_title_form, string $blog_article_preview_form, string $blog_article_content_form, int $user_id_blog_article) {

$errors = array();

if (empty($blog_article_title_form)) {
$errors [] = $text_functions['message_manage_blog_no_title'];
}

if (empty($blog_article_preview_form)) {
$errors [] = $text_functions['message_manage_blog_no_preview'];
}

if (empty($blog_article_content_form)) {
$errors [] = $text_functions['message_manage_blog_no_content'];
}

$blog_article_url = make_safe_article_url($db, $blog_article_title_form);

if (empty($errors)) {
$stmt = $db->prepare("INSERT INTO blog(blog_article_title, blog_article_url, blog_article_date, blog_article_preview, blog_article_content, blog_article_user_id) VALUES(?, ?, NOW(), ?, ?, ?)");
$stmt->bind_param('ssssi', $blog_article_title_form, $blog_article_url, $blog_article_preview_form, $blog_article_content_form, $user_id_blog_article);
if ($stmt->execute()) {
$stmt->close();
return true;
} else {
$stmt->close();
return false;
}
} else {
return $errors;
}
}

function update_blog_article(mysqli $db, array $text_functions, string $blog_article_title_update_form, string $blog_article_preview_update_form, string $blog_article_content_update_form, int $blog_article_id_get, int $user_id_blog_article) {

$errors = array();

if (empty($blog_article_title_update_form)) {
$errors [] = $text_functions['message_manage_blog_no_title'];
}

if (empty($blog_article_preview_update_form)) {
$errors [] = $text_functions['message_manage_blog_no_preview'];
}

if (empty($blog_article_content_update_form)) {
$errors [] = $text_functions['message_manage_blog_no_content'];
}

$blog_article_url = make_safe_article_url($db, $blog_article_title_update_form, $blog_article_id_get);

if (empty($errors)) {
if (user_is_administrator() === true) {
$stmt = $db->prepare("UPDATE blog SET blog_article_title = ?, blog_article_url = ?, blog_article_preview = ?, blog_article_content = ? WHERE blog_article_id = ? LIMIT 1");
$stmt->bind_param('ssssi', $blog_article_title_update_form, $blog_article_url, $blog_article_preview_update_form, $blog_article_content_update_form, $blog_article_id_get);
if ($stmt->execute()) {
$stmt->close();
return true;
} else {
$stmt->close();
return false;
}
} elseif (user_is_moderator() === true) {
$stmt = $db->prepare("UPDATE blog SET blog_article_title = ?, blog_article_url = ?, blog_article_preview = ?, blog_article_content = ? WHERE blog_article_id = ? AND blog_article_user_id = ? LIMIT 1");
$stmt->bind_param('ssssii', $blog_article_title_update_form, $blog_article_url, $blog_article_preview_update_form, $blog_article_content_update_form, $blog_article_id_get, $user_id_blog_article);
if ($stmt->execute()) {
$stmt->close();
return true;
} else {
$stmt->close();
return false;
}
}
} else {
return $errors;
}
}

function remove_blog_article(mysqli $db, int $blog_article_id_form, int $user_id_blog_article) {
if (user_is_administrator() === true) {
$stmt = $db->prepare("DELETE FROM blog WHERE blog_article_id = ? LIMIT 1");
$stmt->bind_param('i', $blog_article_id_form);
if ($stmt->execute()) {
$stmt->close();
return true;
} else {
$stmt->close();
return false;
}
} elseif (user_is_moderator() === true) {
$stmt = $db->prepare("DELETE FROM blog WHERE blog_article_id = ? AND blog_article_user_id = ? LIMIT 1");
$stmt->bind_param('ii', $blog_article_id_form, $user_id_blog_article);
if ($stmt->execute()) {
$stmt->close();
return true;
} else {
$stmt->close();
return false;
}
}
}
