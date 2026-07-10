<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//allowed_backend_sections.php
//MMXXVI MSCRATCH

//allow only handlers stored in the array.

$allowed_backend_sections = array(
'settings',
'request_log',
'dashboard',
'backend_login',
'users',
'error_log',
'dashboard_moderator',
'show_custom_pages',
'edit_custom_page',
'create_custom_page',
'show_navigations',
'edit_navigation',
'create_navigation',
'show_navigation_links',
'create_navigation_link',
'show_blog_articles',
'edit_blog_article',
'create_blog_article',
'show_uploaded_files',
'edit_uploaded_file',
'upload_file',
'email_config',
'show_hidden_comments',
'manage_themes',
'show_custom_widgets',
'edit_custom_widget',
'create_custom_widget',
'feature_flags',
);
