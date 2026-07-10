<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//render_backend_navigation.php
//MMXXVI MSCRATCH

function dashboard_nav_moderator(array $text_functions, array $settings) {
if (user_is_moderator() !== false) {
$output = '';
$output .= '<li><a href="' . BASE_URL . $settings['default_start_page']. '"><i class="fa-solid fa-arrow-left"></i>'. "&nbsp;". $text_functions['dashboard_nav_moderator_back_to_homepage']. '</a></li>';
$output .= '<li><a href="' . BASE_URL . 'dashboard_moderator"><i class="fa-solid fa-house"></i>'. "&nbsp;". $text_functions['dashboard_nav_moderator_dashboard']. '</a></li>';
return $output;
} else {
return '';
}
}

function dashboard_nav_administrator(mysqli $db, array $text_functions, array $feature_flags, array $settings) {
if (user_is_administrator() !== false) {
if ($feature_flags['user_comments_enabled'] === 1) {
$result = number_of_unviewed_hidden_comments($db);
}
$output = '';
$output .= '<li><a href="' . BASE_URL . $settings['default_start_page']. '"><i class="fa-solid fa-arrow-left"></i>'. "&nbsp;". $text_functions['dashboard_nav_administrator_back_to_homepage']. '</a></li>';
$output .= '<li><a href="' . BASE_URL . 'dashboard"><i class="fa-solid fa-house"></i>'. "&nbsp;". $text_functions['dashboard_nav_administrator_dashboard']. '</a></li>';
$output .= '<li><a href="' . BASE_URL . 'settings"><i class="fa-solid fa-gear"></i>'. "&nbsp;". $text_functions['dashboard_nav_administrator_settings']. '</a></li>';
$output .= '<li><a href="' . BASE_URL . 'feature_flags"><i class="fa-solid fa-flag"></i>'. "&nbsp;". $text_functions['dashboard_nav_administrator_feature_flags']. '</a></li>';
$output .= '<li><a href="' . BASE_URL . 'email_config"><i class="fa-solid fa-envelope"></i>'. "&nbsp;". $text_functions['dashboard_nav_administrator_email_config']. '</a></li>';
if ($feature_flags['log_requests_enabled'] === 1) {
$output .= '<li><a href="' . BASE_URL . 'request_log"><i class="fa-solid fa-floppy-disk"></i>'. "&nbsp;". $text_functions['dashboard_nav_administrator_request_log']. '</a></li>';
}
$output .= '<li><a href="' . BASE_URL . 'error_log"><i class="fa-solid fa-bug"></i>'. "&nbsp;". $text_functions['dashboard_nav_administrator_error_log']. '</a></li>';
$output .= '<li><a href="' . BASE_URL . 'users"><i class="fa-solid fa-user"></i>'. "&nbsp;". $text_functions['dashboard_nav_administrator_user_management']. '</a></li>';
if ($feature_flags['user_comments_enabled'] === 1) {
$output .= '<li><a href="' . BASE_URL . 'show_hidden_comments"><i class="fa-solid fa-comment"></i>'. "&nbsp;". $text_functions['dashboard_nav_administrator_show_hidden_comments']. "&nbsp;". '<span class="span_b">['.sanitize_1($result). ']</span>'. '</a>'. '</li>';
}
$output .= '<li><a href="' . BASE_URL . 'show_custom_pages"><i class="fa-solid fa-folder"></i>'. "&nbsp;". $text_functions['dashboard_nav_administrator_show_custom_pages']. '</a></li>';
$output .= '<li><a href="' . BASE_URL . 'show_navigations"><i class="fa-solid fa-signs-post"></i>'. "&nbsp;". $text_functions['dashboard_nav_administrator_navigations']. '</a></li>';
$output .= '<li><a href="' . BASE_URL . 'manage_themes"><i class="fa-solid fa-brush"></i>'. "&nbsp;". $text_functions['dashboard_nav_administrator_manage_themes']. '</a></li>';
$output .= '<li><a href="' . BASE_URL . 'show_custom_widgets"><i class="fa-solid fa-boxes-packing"></i>'. "&nbsp;". $text_functions['dashboard_nav_administrator_show_custom_widgets']. '</a></li>';
return $output;
} else {
return '';
}
}

function dashboard_nav(array $text_functions) {
if (user_is_administrator_or_moderator() !== false) {
$output = '';
$output .= '<li><a href="' . BASE_URL . 'show_uploaded_files"><i class="fa-solid fa-cloud"></i>'. "&nbsp;". $text_functions['dashboard_nav_show_uploaded_files']. '</a></li>';
$output .= '<li><a href="' . BASE_URL . 'show_blog_articles"><i class="fa-solid fa-message"></i>'. "&nbsp;". $text_functions['dashboard_nav_blog_articles']. '</a></li>';
$output .= '<li><a href="' . BASE_URL . 'logout"><i class="fa-solid fa-arrow-right-from-bracket"></i>'. "&nbsp;". $text_functions['dashboard_nav_logout']. '</a></li>';
return $output;
} else {
return '';
}
}
