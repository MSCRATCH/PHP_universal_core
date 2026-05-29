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
'blocklist',
'backend_login',
'users',
'error_log',
'dashboard_moderator',
'show_custom_pages',
'edit_custom_page',
'create_custom_page',
'show_primary_navigation',
'edit_primary_navigation_element',
'create_primary_navigation_element',
'show_secondary_navigation',
'edit_secondary_navigation_element',
'create_secondary_navigation_element',
'show_blog_articles',
'edit_blog_article',
'create_blog_article',
'show_uploaded_files',
'edit_uploaded_file',
'upload_file',
'email_config',
'show_user_activity_log',
'show_hidden_comments',
'manage_themes',
);
