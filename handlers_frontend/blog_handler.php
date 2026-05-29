<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//blog_handler.php
//MMXXVI MSCRATCH

$entries_per_page = 5;
$current_page = isset($_GET['page']) ? (INT) $_GET['page'] : 1;

$total_number_of_blog_articles = get_total_number_of_blog_articles($db);

$number_of_pages = calculate_number_of_pages($total_number_of_blog_articles, $entries_per_page);
$current_page = validate_page_number($total_number_of_blog_articles, $current_page, $entries_per_page);
$offset = calculate_offset($current_page, $entries_per_page);

$result = get_paginated_blog_articles($db, $offset, $entries_per_page);

render_page($db, $settings, $text_functions, $text_handlers, $text_templates, $text_fatal_error_message, 'frontend_templates', $activated_theme['theme_key'], 'layout', [
'template_name' => 'blog_template',
'current_page'  => $current_page,
'number_of_pages' => $number_of_pages,
'result' => $result,
]);
