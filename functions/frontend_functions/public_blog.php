<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//public_blog.php
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
if (! empty($blog_articles)) {
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
