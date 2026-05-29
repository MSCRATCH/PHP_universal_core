<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//edit_blog_article_handler.php
//MMXXVI MSCRATCH

//Administrator or moderator access only.
if (user_is_administrator_or_moderator() === false) {
header('Location:'. BASE_URL. 'login');
exit();
}

if (backend_access_is_verified() === false) {
header('Location:'. BASE_URL. 'backend_login');
exit();
}

if (user_is_logged_in() !== false) {
$user_id_blog_article = get_user_id();
}
//Administrator or moderator access only.

$blog_article_id_get = '';
if (isset($_GET['article'])) {
$blog_article_id_get = (INT) $_GET['article'];
} else {
http_error_message(404, $activated_theme);
}

$result_check_blog_article_id_by_user = check_blog_article_id_by_user($db, $blog_article_id_get, $user_id_blog_article);

if ($result_check_blog_article_id_by_user === false) {
$backend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => $text_handlers['edit_blog_article_handler_page_dont_exist'],
'message_url'     => BASE_URL . 'show_blog_articles',
'message_button_text'  => $text_handlers['edit_blog_article_handler_btn_return'],
]);
backend_system_message($backend_system_message, $settings);
}

$blog_article = get_blog_article_by_id_and_by_user($db, $blog_article_id_get, $user_id_blog_article);

if (isset($_POST['csrf_token'])) {
if (isset($_POST['update_blog_article'])) {
if (validate_token('update_blog_article', $_POST['csrf_token'])) {

$blog_article_title_update_form = '';
if (isset($_POST['blog_article_title_update_form'])) {
$blog_article_title_update_form = trim($_POST['blog_article_title_update_form']);
}

$blog_article_preview_update_form = '';
if (isset($_POST['blog_article_preview_update_form'])) {
$blog_article_preview_update_form = trim($_POST['blog_article_preview_update_form']);
}

$blog_article_content_update_form = '';
if (isset($_POST['blog_article_content_update_form'])) {
$blog_article_content_update_form = trim($_POST['blog_article_content_update_form']);
}

$result_update_blog_article = update_blog_article($db, $text_functions, $blog_article_title_update_form, $blog_article_preview_update_form, $blog_article_content_update_form, $blog_article_id_get, $user_id_blog_article);
if ($result_update_blog_article === true) {
$backend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => $text_handlers['edit_blog_article_handler_successful_edited'],
'message_url'     => BASE_URL . 'edit_blog_article/' . $blog_article_id_get,
'message_button_text'  => $text_handlers['edit_blog_article_handler_btn_return'],
]);
backend_system_message($backend_system_message, $settings);
} else {
$errors = $result_update_blog_article;
}
} else {
$backend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => $text_handlers['csrf_text'],
'message_url'     => BASE_URL . 'edit_blog_article/' . $blog_article_id_get,
'message_button_text'  => $text_handlers['csrf_btn'],
]);
backend_system_message($backend_system_message, $settings);
}
}
}

render_page($db, $settings, $text_functions, $text_handlers, $text_templates, $text_fatal_error_message, 'backend_templates', 'backend_theme', 'backend_layout', [
'template_name' => 'edit_blog_article_template',
'blog_article'  => $blog_article,
'errors'  => $errors ?? [],
]);
