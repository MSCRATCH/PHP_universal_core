<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//article_handler.php
//MMXXVI MSCRATCH

$blog_article_url_get = '';
if (isset($_GET['title'])) {
$blog_article_url_get = $_GET['title'];
} else {
http_error_message(404, $activated_theme);
}

if (user_is_logged_in() !== false) {
$user_id_article_handler = get_user_id();
}

$result = get_blog_article_by_url($db, $blog_article_url_get);

$entries_per_page = 5;
$current_page = isset($_GET['page']) ? (INT) $_GET['page'] : 1;

$total_number_of_article_comments = get_total_number_of_article_comments($db, $blog_article_url_get);

$number_of_pages = calculate_number_of_pages($total_number_of_article_comments, $entries_per_page);
$current_page = validate_page_number($total_number_of_article_comments, $current_page, $entries_per_page);
$offset = calculate_offset($current_page, $entries_per_page);

$article_comments = get_paginated_article_comments($db, $offset, $entries_per_page, $blog_article_url_get);

if ($result === false) {
$frontend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => $text_handlers['article_handler_article_dont_exist'],
'message_url'     => BASE_URL . 'blog',
'message_button_text'  => $text_handlers['article_handler_btn_return'],
]);
frontend_system_message($frontend_system_message, $settings, $activated_theme);
}


if (isset($_POST['csrf_token'])) {
if (isset($_POST['save_comment'])) {
if (validate_token('save_comment', $_POST['csrf_token'])) {

$blog_comment_form = '';
if (isset($_POST['blog_comment_form'])) {
$blog_comment_form = trim($_POST['blog_comment_form']);
}

$result_save_comment = save_comment($db, $text_functions, $blog_comment_form, $user_id_article_handler, $blog_article_url_get);
if ($result_save_comment === true) {
$frontend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => $text_handlers['article_handler_successful_saved'],
'message_url'     => BASE_URL . 'article/'. $blog_article_url_get,
'message_button_text'  => $text_handlers['article_handler_btn_back_to_article'],
]);
frontend_system_message($frontend_system_message, $settings, $activated_theme);
} else {
$errors = $result_save_comment;
}
} else {
$frontend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => $text_handlers['csrf_text'],
'message_url'     => BASE_URL . 'article/'. $blog_article_url_get,
'message_button_text'  => $text_handlers['csrf_btn'],
]);
frontend_system_message($frontend_system_message, $settings, $activated_theme);
}
}
}

if (isset($_POST['csrf_token'])) {
if (isset($_POST['hide_comment'])) {
if (validate_token('hide_comment', $_POST['csrf_token'])) {

$blog_comment_id_form = '';
if (isset($_POST['blog_comment_id_form'])) {
$blog_comment_id_form = (INT) $_POST['blog_comment_id_form'];
}


$result_hide_comment = hide_comment($db, $blog_comment_id_form, $user_id_article_handler, $blog_article_url_get);
if ($result_hide_comment === true) {
$frontend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => $text_handlers['article_handler_successful_hidden'],
'message_url'     => BASE_URL . 'article/'. $blog_article_url_get. '/page/'. $current_page,
'message_button_text'  => $text_handlers['article_handler_btn_back_to_article'],
]);
frontend_system_message($frontend_system_message, $settings, $activated_theme);
}
} else {
$frontend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => $text_handlers['csrf_text'],
'message_url'     => BASE_URL . 'article/'. $blog_article_url_get. '/page/'. $current_page,
'message_button_text'  => $text_handlers['csrf_btn'],
]);
frontend_system_message($frontend_system_message, $settings, $activated_theme);
}
}
}

if (isset($_POST['csrf_token'])) {
if (isset($_POST['restore_comment'])) {
if (validate_token('restore_comment', $_POST['csrf_token'])) {

$blog_comment_id_form = '';
if (isset($_POST['blog_comment_id_form'])) {
$blog_comment_id_form = (INT) $_POST['blog_comment_id_form'];
}


$result_restore_comment = restore_comment($db, $blog_comment_id_form, $user_id_article_handler, $blog_article_url_get);
if ($result_restore_comment === true) {
$frontend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => $text_handlers['article_handler_successful_restored'],
'message_url'     => BASE_URL . 'article/'. $blog_article_url_get. '/page/'. $current_page,
'message_button_text'  => $text_handlers['article_handler_btn_back_to_article'],
]);
frontend_system_message($frontend_system_message, $settings, $activated_theme);
}
} else {
$frontend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => $text_handlers['csrf_text'],
'message_url'     => BASE_URL . 'article/'. $blog_article_url_get. '/page/'. $current_page,
'message_button_text'  => $text_handlers['csrf_btn'],
]);
frontend_system_message($frontend_system_message, $settings, $activated_theme);
}
}
}

if (isset($_POST['csrf_token'])) {
if (isset($_POST['remove_comment'])) {
if (validate_token('remove_comment', $_POST['csrf_token'])) {

$blog_comment_id_form = '';
if (isset($_POST['blog_comment_id_form'])) {
$blog_comment_id_form = (INT) $_POST['blog_comment_id_form'];
}

$result_remove_comment = remove_comment($db, $blog_comment_id_form, $user_id_article_handler, $blog_article_url_get);
if ($result_remove_comment === true) {
$frontend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => $text_handlers['article_handler_successful_removed'],
'message_url'     => BASE_URL . 'article/'. $blog_article_url_get. '/page/'. $current_page,
'message_button_text'  => $text_handlers['article_handler_btn_back_to_article'],
]);
frontend_system_message($frontend_system_message, $settings, $activated_theme);
}
} else {
$frontend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => $text_handlers['csrf_text'],
'message_url'     => BASE_URL . 'article/'. $blog_article_url_get. '/page/'. $current_page,
'message_button_text'  => $text_handlers['csrf_btn'],
]);
frontend_system_message($frontend_system_message, $settings, $activated_theme);
}
}
}

render_page($db, $settings, $text_functions, $text_handlers, $text_templates, $text_fatal_error_message, 'frontend_templates', $activated_theme['theme_key'], 'layout', [
'template_name' => 'article_template',
'blog_article_url_get' => $blog_article_url_get ?? null,
'result' => $result,
'current_page'  => $current_page,
'number_of_pages' => $number_of_pages,
'article_comments' => $article_comments ?? false,
'errors' => $errors ?? [],
]);
