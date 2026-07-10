<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//app_loader_permissions.php
//MMXXVI MSCRATCH

//load only functions that are permitted to be requested.

$administrator_only_files = [
'manage_comments.php',
'manage_custom_pages.php',
'manage_custom_widgets.php',
'manage_dashboard_stats.php',
'manage_emails.php',
'manage_error_log.php',
'manage_feature_flags.php',
'manage_navigations.php',
'manage_request_log.php',
'manage_settings.php',
'manage_themes.php',
'manage_users.php',
];

$administrator_and_moderator_only_files = [
'backend_login.php',
'backend_logout.php',
'manage_blog.php',
'manage_uploaded_files.php',
'render_backend_navigation.php',
];
