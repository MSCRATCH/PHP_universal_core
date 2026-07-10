<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//show_blog_articles_handler.php
//MMXXVI MSCRATCH

//Administrator or moderator access only.
if (user_is_administrator_or_moderator() === false) {
die("Direct access to this file is restricted.");
}

if (backend_access_is_verified() === false) {
header('Location:'. BASE_URL. 'backend_login');
exit();
}

if (user_is_logged_in() !== false) {
$user_id_blog_article = get_user_id();
}
//Administrator or moderator access only.

$entries_per_page = 25;
$current_page = isset($_GET['page']) ? (INT) $_GET['page'] : 1;

$total_number_of_blog_article_by_user = get_total_number_of_blog_article_by_user($db, $user_id_blog_article);

$number_of_pages = calculate_number_of_pages($total_number_of_blog_article_by_user, $entries_per_page);
$current_page = validate_page_number($total_number_of_blog_article_by_user, $current_page, $entries_per_page);
$offset = calculate_offset($current_page, $entries_per_page);

$paginated_blog_articles = get_paginated_blog_articles_by_user($db, $offset, $entries_per_page, $user_id_blog_article);

if (isset($_POST['csrf_token'])) {
if (isset($_POST['remove_blog_article'])) {
if (validate_token('remove_blog_article', $_POST['csrf_token'])) {

$blog_article_id_form = '';
if (isset($_POST['blog_article_id_form'])) {
$blog_article_id_form = (INT) $_POST['blog_article_id_form'];
}

$result_remove_blog_article = remove_blog_article($db, $blog_article_id_form, $user_id_blog_article);
if ($result_remove_blog_article === true) {
$backend_system_message = ([
'message_text'    => $text_handlers['show_blog_articles_handler_successful_removed'],
'message_url'     => BASE_URL . 'show_blog_articles',
'message_button_text'  => $text_handlers['show_blog_articles_handler_btn_return'],
]);
backend_system_message($backend_system_message, $settings);
}
} else {
$backend_system_message = ([
'message_text'    => $text_handlers['csrf_text'],
'message_url'     => BASE_URL . 'show_blog_articles',
'message_button_text'  => $text_handlers['csrf_btn'],
]);
backend_system_message($backend_system_message, $settings);
}
}
}

render_page($db, $settings, $feature_flags, $text_functions, $text_handlers, $text_templates, $text_fatal_error_message, 'backend_theme', 'backend_layout', [
'template_name' => 'show_blog_articles_template',
'template_directory' => 'backend_templates',
'current_page'  => $current_page,
'number_of_pages' => $number_of_pages,
'paginated_blog_articles' => $paginated_blog_articles,
]);
