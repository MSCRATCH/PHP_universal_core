<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//create_blog_article_handler.php
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

if (isset($_POST['csrf_token'])) {
if (isset($_POST['save_blog_article'])) {
if (validate_token('save_blog_article', $_POST['csrf_token'])) {

$blog_article_title_form = '';
if (isset($_POST['blog_article_title_form'])) {
$blog_article_title_form = trim($_POST['blog_article_title_form']);
}

$blog_article_preview_form = '';
if (isset($_POST['blog_article_preview_form'])) {
$blog_article_preview_form = trim($_POST['blog_article_preview_form']);
}

$blog_article_content_form = '';
if (isset($_POST['blog_article_content_form'])) {
$blog_article_content_form = trim($_POST['blog_article_content_form']);
}

$result_save_blog_article = save_blog_article($db, $text_functions, $blog_article_title_form, $blog_article_preview_form, $blog_article_content_form, $user_id_blog_article);
if ($result_save_blog_article === true) {
$backend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => $text_handlers['create_blog_article_handler_successful_saved'],
'message_url'     => BASE_URL . 'show_blog_articles',
'message_button_text'  => $text_handlers['create_blog_article_handler_btn_return'],
]);
backend_system_message($backend_system_message, $settings);
} else {
$errors = $result_save_blog_article;
}
} else {
$backend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => $text_handlers['csrf_text'],
'message_url'     => BASE_URL . 'show_blog_articles',
'message_button_text'  => $text_handlers['csrf_btn'],
]);
backend_system_message($backend_system_message, $settings);
}
}
}

render_page($db, $settings, $text_functions, $text_handlers, $text_templates, $text_fatal_error_message, 'backend_templates', 'backend_theme', 'backend_layout', [
'template_name' => 'create_blog_article_template',
'errors'  => $errors ?? [],
]);
