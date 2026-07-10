<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//lang_templates_en.php
//MMXXVI MSCRATCH

$text_templates = [

//templates\frontend_templates\blog_template.php
'blog_template_read_more' => 'Read more',
'blog_template_number_of_comments' => 'Number of comments:',
'blog_template_no_entries_title' => 'No blog posts at the moment',
'blog_template_no_entries_text' => 'There are currently no blog posts.',
//templates\frontend_templates\blog_template.php

//templates\frontend_templates\login_template.php
'login_template_title_log_in' => 'Log in',
'login_template_label_username' => 'Username',
'login_template_label_password' => 'Password',
'login_template_btn_login' => 'Login',
'login_template_btn_return_to_home_page' => 'Return to home page',
//templates\frontend_templates\login_template.php

//templates\frontend_templates\manage_profile_template.php
'manage_profile_template_title_upload' => 'Upload a profile image',
'manage_profile_template_title_update_description' => 'Update the profile description',
'manage_profile_template_label_location' => 'Location',
'manage_profile_template_label_profile_description' => 'Profile description',
'manage_profile_template_btn_search_for_image_file' => 'Search for image file',
'manage_profile_template_btn_upload_profile_image' => 'Upload profile image',
'manage_profile_template_btn_update_profile' => 'Update profile',
//templates\frontend_templates\manage_profile_template.php

//templates\frontend_templates\profile_template.php
'profile_template_online' => 'Online',
'profile_template_title_profile_description' => 'Profile description',
'profile_template_no_profile_description' => 'This user has not yet provided a profile description.',
//templates\frontend_templates\profile_template.php

//templates\frontend_templates\register_template.php
'register_template_title_register' => 'Register',
'register_template_label_username' => 'Username',
'register_template_label_password' => 'Password',
'register_template_label_password_comparison' => 'Password comparison',
'register_template_label_e_mail_address' => 'E-mail address',
'register_template_label_security_question' => 'Security question',
'register_template_text' => 'By registering you agree to the terms of use.',
'register_template_btn_register' => 'Register',
'register_template_btn_return_to_homepage' => 'Return to homepage',
//templates\frontend_templates\register_template.php

//templates\frontend_templates\serve_uploaded_file_template.php
'serve_uploaded_file_template_btn_download_file' => 'Download file',
'serve_uploaded_file_template_btn_return' => 'Return',
//templates\frontend_templates\serve_uploaded_file_template.php

//templates\frontend_templates\article_template.php
'article_template_backend_access_not_verified' => 'Backend authentication is required to manage comments.',
'article_template_comment_hidden' => 'This comment has been hidden.',
'article_template_form_title_leave_comment' => 'Leave a comment',
'article_template_label_comment' => 'Comment',
'article_template_not_registered' => 'You must register or log in to write comments.',
'article_template_btn_remove' => 'Remove',
'article_template_btn_restore' => 'Restore',
'article_template_btn_hide' => 'Hide',
'article_template_btn_save' => 'Save',
'article_template_btn_login' => 'Login',
'article_template_btn_register' => 'Register',
//templates\frontend_templates\article_template.php

//templates\frontend_templates\notifications_template.php
'notifications_template_new_comment' => 'wrote a comment on your article',
'notifications_template_at' => 'at',
'notifications_template_by' => 'by',
'notifications_template_comment_hidden' => 'has hidden your comment',
'notifications_template_comment_restored' => 'restored your comment',
'notifications_template_comment_removed' => 'removed your comment permanently',
'notifications_template_user_level_changed' => 'changed your user level',
'notifications_template_empty_log_title' => 'No notifications',
'notifications_template_all_viewed_title' => 'Mark all notifications as viewed',
'notifications_template_empty_log_text' => 'There are no notifications at the moment.',
'notifications_template_btn_show_article' => 'Show article',
'notifications_template_btn_viewed' => 'Mark as viewed',
'notifications_template_btn_all_viewed' => 'Mark all as viewed',
'notifications_template_btn_all_viewed_text' => 'In this section, all notifications can be marked as viewed.',
'notifications_template_notice_comment_hidden' => 'Comment hidden on',
'notifications_template_notice_comment_removed' => 'Comment removed on',
'notifications_template_notice_comment_restored' => 'Comment restored on',
'notifications_template_notice_comment_new_comment' => 'New comment on your article',
'notifications_template_notice_comment_viewed' => 'You have marked this notification as viewed.',
'notifications_template_notice_user_level_changed' => 'User level changed',
'notifications_template_user_level_user_text' => 'Your user level has been changed to user. As a user, you can manage your profile and write comments.',
'notifications_template_user_level_moderator_text' => 'Your user level has been changed to moderator. You can now hide other users comments and use the blog system.',
//templates\frontend_templates\user_activity_log_template.php

//templates\frontend_templates\maintenance_mode.php
'maintenance_mode_template_title' => 'Maintenance mode activated',
'maintenance_mode_template_text' => 'This page is currently unavailable because maintenance work is in progress. Please try again later. ',
'maintenance_mode_template_btn_login' => 'Login',
'maintenance_mode_template_btn_logout' => 'Logout',
//templates\frontend_templates\maintenance_mode.php

//templates\frontend_templates\user_not_activated_template.php
'user_not_activated_template_text' => 'Your user account has not yet been activated or your account has been blocked.',
'user_not_activated_template_btn_logout' => 'Logout',
//templates\frontend_templates\user_not_activated_template.php

//templates\frontend_templates\user_not_verified_email_template.php
'user_not_verified_email_template_title' => 'Email verification required',
'user_not_verified_email_template_text' => ' Your account has been created successfully, but your email address has not been verified yet. Please check your inbox and click the verification link. Some features remain unavailable until your email address has been verified.',
'user_not_verified_email_template_btn_logout' => 'Logout',
'user_not_verified_email_template_btn_resend_verification_email' => 'Resend verification email',
//templates\frontend_templates\user_not_verified_email_template.php

//templates\frontend_templates\email_verification_template.php
'email_verification_template_text' => 'Thank you for registering on our website. Please click the link to verify your email address. Your email address will be used exclusively to verify your identity as a user and to contact you if necessary. We will not share your email address with third parties.',
//templates\frontend_templates\email_verification_template.php

//templates\frontend_templates\contact_template.php
'contact_template_title' => 'Contact us',
'contact_template_label_subject' => 'Subject',
'contact_template_label_email' => 'Email',
'contact_template_label_name' => 'Name',
'contact_template_label_text' => 'Message',
'contact_template_label_security_question' => 'Security question',
'contact_template_btn' => 'Send message',
//templates\frontend_templates\contact_template.php

//templates\backend_templates\request_log_template.php
'request_log_template_ip_address' => 'IP address',
'request_log_template_browser' => 'Browser',
'request_log_template_requested_url' => 'Requested URL',
'request_log_template_timestamp' => 'Timestamp',
'request_log_template_registered_user' => 'Registered user',
'request_log_template_no_user' => 'No registered user',
'request_log_template_no_entries_title' => 'No entries in the activity log',
'request_log_template_no_entries_text' => 'There are no entries in the activity log.',
//templates\backend_templates\request_log_template.php

//templates\backend_templates\backend_login_template.php
'backend_login_template_label_username' => 'Username',
'backend_login_template_label_password' => 'Registered user',
'backend_login_template_btn' => 'Authentication for the backend',
'backend_login_template_btn_return' => 'Return to home page',
//templates\backend_templates\backend_login_template.php

//templates\backend_templates\dashboard_moderator_template.php
'dashboard_moderator_template_title' => 'Moderator dashboard',
'dashboard_moderator_template_text' => 'You are now viewing the moderator section of the dashboard.',
//templates\backend_templates\dashboard_moderator_template.php

//templates\backend_templates\dashboard_template.php
'dashboard_template_current_system_version_title' => 'PHP universal core version check',
'dashboard_template_system_version_link' => 'Update available at php_universal_core.com',
'dashboard_template_current_system_version' => 'PHP universal core is currently running on the latest version.',
'dashboard_template_outdated_system_version' => 'An update is available:',

'dashboard_template_title_directory_check_system_title' => 'Directory check',
'dashboard_template_directory_check_writable' => 'Writable',
'dashboard_template_directory_check_not_writable' => 'Not writable',
'dashboard_template_directory_check_db_error_logs' => 'Db error logs directory:',
'dashboard_template_directory_check_file_system_logs' => 'File system logs directory:',
'dashboard_template_directory_check_request_logs' => 'Request logs directory:',
'dashboard_template_directory_check_system_error_logs' => 'System error logs directory:',

'dashboard_template_title_system_integrity' => 'System integrity',
'dashboard_template_directory_check_healthy' => 'Healthy',
'dashboard_template_directory_check_unhealthy' => 'Unhealthy',
'dashboard_template_system_integrity_db' => 'Database integrity:',
'dashboard_template_system_integrity_file_system' => 'File system integrity:',
'dashboard_template_system_integrity_system' => 'System integrity:',

'dashboard_template_title_filesize' => 'Maximum upload file size',
'dashboard_template_upload_max_filesize' => 'Maximum file size:',
'dashboard_template_post_max_size' => 'Maximum post file size:',
'dashboard_template_max_filesize_text' => 'The settings above specify the maximum size allowed for files uploaded to your web server. The upload system supports files up to 100 MB, a limit that can easily be increased. Both values should be 100MB so that the upload system functions correctly, these values can be adjusted in the php ini file of your web server.',

'dashboard_template_title_system_information' => 'System information',
'dashboard_template_title_most_recent_users' => 'Most recent users',
'dashboard_template_text_most_recent_users' => 'Currently, no users are registered.',
'dashboard_template_title_online_users' => 'Online users',
'dashboard_template_text_online_users' => 'Currently, no users are online.',
'dashboard_template_title_users_who_not_activated' => 'Users who have not been activated',
'dashboard_template_text_users_who_not_activated' => 'Currently, there are no users who have not been activated.',
'dashboard_template_title_moderators' => 'Moderators',
'dashboard_template_text_moderators' => 'Currently, there are no moderators.',
//templates\backend_templates\dashboard_template.php

//templates\backend_templates\error_log_template.php
'error_log_template_title_error_log' => 'Error log',
'error_log_template_text_error_log' => 'The error log can only be cleared once the errors have been resolved. Otherwise, they will be registered again.',
'error_log_template_btn_clear_error_log' => 'Clear error log',
'error_log_template_error_number' => 'Error number',
'error_log_template_error_string' => 'Error string',
'error_log_template_error_file' => 'Error file',
'error_log_template_error_line' => 'Error line',
'error_log_template_registered_at' => 'Registered at',
'error_log_template_title_no_entries' => 'No entries in the error log',
'error_log_template_text_no_entries' => 'The error log contains no errors, so the system is working flawlessly.',
//templates\backend_templates\error_log_template.php

//templates\backend_templates\show_blog_articles_template.php
'show_blog_articles_template_title' => 'Blog',
'show_blog_articles_template_text' => 'This section is used to manage blog posts. These can be formatted using internal code. Moderators can view only their own posts.',
'show_blog_articles_template_author' => 'Author:',
'show_blog_articles_template_creation_date' => 'Creation date:',
'show_blog_articles_template_btn_create' => 'Create blog article',
'show_blog_articles_template_btn_remove' => 'Remove',
'show_blog_articles_template_btn_edit' => 'Edit',
'show_blog_articles_template_no_entries_title' => 'No blog articles',
'show_blog_articles_template_no_entries_text' => 'No blog articles pages have been created yet.',
//templates\backend_templates\show_blog_articles_template.php

//templates\backend_templates\create_blog_article_template.php
'create_blog_article_template_title' => 'Create a blog article',
'create_blog_article_template_label_title' => 'Title',
'create_blog_article_template_label_preview' => 'Preview',
'create_blog_article_template_label_content' => 'Content',
'create_blog_article_template_btn_save' => 'Save',
'create_blog_article_template_btn_return' => 'Return',
//templates\backend_templates\create_blog_article_template.php

//templates\backend_templates\edit_blog_article_template.php
'edit_blog_article_template_title' => 'Edit a blog article',
'edit_blog_article_template_label_title' => 'Title',
'edit_blog_article_template_label_preview' => 'Preview',
'edit_blog_article_template_label_content' => 'Content',
'edit_blog_article_template_btn_edit' => 'Edit',
'edit_blog_article_template_btn_return' => 'Return',
//templates\backend_templates\edit_blog_article_template.php

//templates\backend_templates\show_custom_pages_template.php
'show_custom_pages_template_title' => 'Custom pages',
'show_custom_pages_template_text' => 'In this section, custom pages can be created and formatted using the internal code.',
'show_custom_pages_template_url' => 'URL of the custom page:',
'show_custom_pages_template_btn_remove' => 'Remove page',
'show_custom_pages_template_btn_create' => 'Create custom page',
'show_custom_pages_template_btn_edit' => 'Edit page',
'show_custom_pages_template_no_entries_title' => 'No custom pages',
'show_custom_pages_template_no_entries_text' => 'No custom pages have been created yet.',
//templates\backend_templates\show_custom_pages_template.php

//templates\backend_templates\create_custom_page_template.php
'create_custom_page_template_title' => 'Create a custom page',
'create_custom_page_template_label_custom_page_url' => 'Custom page URL',
'create_custom_page_template_label_custom_custom_page_title' => 'Custom page title',
'create_custom_page_template_label_custom_page_content' => 'Custom page content',
'create_custom_page_template_template_btn_create_custom_page' => 'Create custom page',
'create_custom_page_template_btn_return' => 'Return',
//templates\backend_templates\create_custom_page_template.php

//templates\backend_templates\edit_custom_page_template.php
'edit_custom_page_template_title' => 'Edit a custom page',
'edit_custom_page_template_label_custom_page_url' => 'Custom page URL',
'edit_custom_page_template_custom_custom_page_title' => 'Custom page title',
'edit_custom_page_template_custom_page_content' => 'Custom page content',
'edit_custom_page_template_btn_edit_custom_page' => 'Edit custom page',
'create_custom_page_template_btn_return' => 'Return',
//templates\backend_templates\edit_custom_page_template.php

//templates\backend_templates\show_navigations_template.php
'show_navigations_template_title' => 'Management of navigations',
'show_navigations_template_text' => 'In this area, navigation elements can be created and freely positioned within the layout using the respective placeholder.',
'show_navigations_template_btn_create' => 'Create navigations',
'show_navigations_template_btn_remove' => 'Remove nav',
'show_navigations_template_btn_edit' => 'Edit nav',
'show_navigations_template_no_navs_text' => 'No navigation have been created yet.',
'show_navigations_template_no_navs_title' => 'No navigations',
//templates\backend_templates\show_navigations_template.php

//templates\backend_templates\create_navigation_template.php
'create_navigation_template_title' => 'Create a navigation',
'create_navigation_template_label_placeholder' => 'Placeholder',
'create_navigation_template_btn_create' => 'Create nav',
'create_navigation_template_btn_return' => 'Return',
//templates\backend_templates\create_navigation__template.php

//templates\backend_templates\edit_navigation_template.php
'edit_navigation_template_title' => 'Edit a navigation',
'edit_navigation_template_label_placeholder' => 'Placeholder',
'edit_navigation_template_btn_edit' => 'Edit nav',
'edit_navigation_template_btn_return' => 'Return',
//templates\backend_templates\edit_navigation_template.php

//templates\backend_templates\show_navigation_links_template.php
'show_navigation_links_template_title' => 'Management of navigations links',
'show_navigation_links_template_text' => 'In this area, the links for the respective navigation can be edited.',
'show_navigation_links_template_btn_create' => 'Create link',
'show_navigation_links_template_btn_remove' => 'Remove link',
'show_navigation_links_template_btn_show' => 'Show link',
'show_navigation_links_template_btn_return' => 'Return',
'show_navigation_links_template_no_links_title' => 'No links',
'show_navigation_links_template_no_links_text' => 'This navigation has no navigation links.',
//templates\backend_templates\show_navigation_links_template.php

//templates\backend_templates\create_navigation_link_template.php
'create_navigation_link_template_title' => 'Create a link for the selected navigation',
'create_navigation_link_template_label_name' => 'Name of the link',
'create_navigation_link_template_label_url' => 'Url of the link',
'create_navigation_link_template_label_order' => 'Specify a number to determine the order of the link',
'create_navigation_link_template_btn_create' => 'Create nav link',
'create_navigation_link_template_btn_return' => 'Return',
//templates\backend_templates\create_navigation_link_template.php

//templates\backend_templates\message_remove_user.php
'message_remove_user_text' => 'Are you sure you want to remove',
'message_remove_user_btn_confirm' => 'Confirm',
'message_remove_user_btn_cancel' => 'Cancel',
//templates\backend_templates\message_remove_user.php

//templates\backend_templates\settings_template.php
'settings_template_title' => 'Settings',
'settings_template_btn' => 'Submit',
//templates\backend_templates\settings_template.php

//templates\backend_templates\show_uploaded_files_template.php
'show_uploaded_files_template_title' => 'Managing Uploaded Files',
'show_uploaded_files_template_text' => 'In this section, uploaded files can be managed and subsequently embedded using the internal code.',
'show_uploaded_files_template_btn_upload' => 'Upload file',
'show_uploaded_files_template_file_name' => 'File name:',
'show_uploaded_files_template_file_uploader' => 'Uploaded by:',
'show_uploaded_files_template_file_size' => 'File size:',
'show_uploaded_files_template_btn_remove' => 'Remove file',
'show_uploaded_files_template_btn_edit' => 'Edit file',
'show_uploaded_files_template_no_files_title' => 'No files uploaded',
'show_uploaded_files_template_no_files_text' => 'Currently, no files have been uploaded yet.',
//templates\backend_templates\show_uploaded_files_template.php

//templates\backend_templates\upload_file_template.php
'upload_file_template_title' => 'Upload a file',
'upload_file_template_label_title' => 'Title',
'upload_file_template_label_description' => 'Description',
'upload_file_template_label_file' => 'Search for file',
'upload_files_template_btn_upload' => 'Upload file',
'upload_files_template_btn_return' => 'Return',
//templates\backend_templates\upload_file_template.php

//templates\backend_templates\edit_uploaded_file_template.php
'edit_uploaded_file_template_title' => 'Update a file',
'edit_uploaded_file_template_label_title' => 'Title',
'edit_uploaded_file_template_label_description' => 'Description',
'edit_uploaded_file_template_btn_update_file' => 'Update file',
'edit_uploaded_file_template_btn_return' => 'Return',
//templates\backend_templates\edit_uploaded_file_template.php

//templates\backend_templates\users_template.php
'users_template_email' => 'E-Mail:',
'users_template_user_level' => 'User level:',
'users_template_registered' => 'Registered:',
'users_template_last_activity' => 'Last activity:',
'users_template_remove' => 'Remove',
'users_template_online' => 'Online',
'users_template_btn_remove' => 'Remove',
'users_template_btn_change' => 'Change',
'users_template_no_entries_title' => 'No registered users',
'users_template_no_entries_text' => 'There are currently no registered users.',
'users_template_show_user_activity_log' => 'Show user activity log',
'users_template_email_address_verified' => 'The email address has been verified.',
'users_template_email_address_not_verified' => 'The email address has not been verified.',
//templates\backend_templates\users_template.php

//templates\backend_templates\email_config_template.php
'email_config_template_title' => 'Edit email config',
'email_config_template_smtp_host' => 'Smtp host',
'email_config_template_smtp_port' => 'Smtp port',
'email_config_template_smtp_user' => 'Smtp user',
'email_config_template_smtp_password' => 'Smtp password',
'email_config_template_smtp_encryption' => 'Smtp encryption',
'email_config_template_from_email' => 'Email',
'email_config_template_from_name' => 'Name',
'email_config_template_btn' => 'Save email config',
//templates\backend_templates\email_config_template.php

//templates\backend_templates\show_hidden_comments_template.php
'show_hidden_comments_template_title' => 'Hidden comments',
'show_hidden_comments_template_title_hidden_comment' => 'A comment has been hidden',
'show_hidden_comments_template_text' => 'This section displays comments that have been hidden by you or your moderators. You can remove or restore them directly in the frontend, or right here on this page.',
'show_hidden_comments_template_btn_mark_comments_as_viewed' => 'Mark comments as viewed',
'show_hidden_comments_template_btn_restore' => 'Restore',
'show_hidden_comments_template_btn_remove' => 'Remove',
'show_hidden_comments_template_activity_performed_by' => 'Activity performed by:',
'show_hidden_comments_template_comment_written_by' => 'Comment written by:',
'show_hidden_comments_template_activity_performed' => 'Activity performed:',
'show_hidden_comments_template_comment_affected_article' => 'Affected article:',
'show_hidden_comments_template_text' => 'This section displays comments that have been hidden by you or your moderators. You can remove or restore them directly in the frontend, or right here on this page.',
'show_hidden_comments_template_viewed' => 'The entry has been viewed.',
'show_hidden_comments_template_not_viewed' => 'The entry has not been viewed.',
'show_hidden_comments_template_no_entries_title' => 'No hidden comments',
'show_hidden_comments_template_no_entries_text' => 'Currently, there are no hidden comments.',
//templates\backend_templates\show_hidden_comments_template.php

//templates\backend_templates\manage_themes_template.php
'manage_themes_template_title' => 'Themes',
'manage_themes_template_text' => 'In this section, themes can be managed, they are automatically detected when located in the themes directory. The theme.json file must be present and complete.',
'manage_themes_template_key' => 'Key:',
'manage_themes_template_author' => 'Author:',
'manage_themes_template_version' => 'Version:',
'manage_themes_template_is_active_theme' => 'The theme is activated.',
'manage_themes_template_is_not_active_theme' => 'The theme is not activated.',
'manage_themes_template_btn_activate_theme' => 'Activate',
'manage_themes_template_btn_deactivate_theme' => 'Deactivate',
'manage_themes_template_no_themes_title' => 'No themes',
'manage_themes_template_no_themes_text' => 'Currently, no themes are available.',
'manage_themes_template_theme_already_activated' => 'A theme is already active.',
//templates\backend_templates\manage_themes_template.php

//templates\backend_templates\show_custom_widgets_template.php
'show_custom_widgets_template_title' => 'Widgets',
'show_custom_widgets_template_text' => 'Widgets can be created in this area. They can be freely placed within the layout files.',
'show_custom_widgets_template_btn_create' => 'Create widget',
'show_custom_widgets_template_btn_remove' => 'Remove widget',
'show_custom_widgets_template_btn_edit' => 'Edit widget',
'show_custom_widgets_template_no_entries_title' => 'No widgets',
'show_custom_widgets_template_no_entries_text' => 'No widgets have been created yet.',
//templates\backend_templates\show_custom_widgets_template.php

//templates\backend_templates\create_custom_widget_template.php
'create_custom_widget_template_title' => 'Create a custom widget',
'create_custom_widget_template_label_placeholder' => 'Placeholder',
'create_custom_widget_template_label_content' => 'Content',
'create_custom_widget_template_template_btn_create' => 'Create custom widget',
'create_custom_widget_template_btn_return' => 'Return',
//templates\backend_templates\create_custom_widget_template.php

//templates\backend_templates\edit_custom_widget_template.php
'edit_custom_widget_template_title' => 'Edit a custom widget',
'edit_custom_widget_template_label_placeholder' => 'Placeholder',
'edit_custom_widget_template_label_content' => 'Content',
'edit_custom_widget_template_btn_edit' => 'Edit custom widget',
'edit_custom_widget_template_btn_return' => 'Return',
//templates\backend_templates\edit_custom_widget_template.php

//templates\backend_templates\feature_flags_template.php
'feature_flags_template_title' => 'Feature flags',
'feature_flags_template_text' => 'In this area, functions can be enabled or disabled. In this process, deactivated elements are not simply hidden, but the respective functionality library is not loaded at all. This means that disabling elements saves RAM and further improves page load times.',
'feature_flags_template_status' => 'Status:',
'feature_flags_template_activated' => 'Activated',
'feature_flags_template_deactivated' => 'Deactivated',
'feature_flags_template_deactivate' => 'Deactivate',
'feature_flags_template_activate' => 'Activate',
'feature_flags_template_registration' => 'Registration can be enabled or disabled here.',
'feature_flags_template_maintenance_mode' => 'Maintenance mode can be activated or deactivated here.',
'feature_flags_template_contact_form' => 'The contact form can be enabled or disabled here.',
'feature_flags_template_user_profile_system' => 'The profile system can be deactivated or activated here.',
'feature_flags_template_rate_limiter' => 'The rate limiter can be enabled or disabled here. While a rate limiter inevitably imposes significant restrictions on users, it reliably protects the login, contact, and registration functions against excessive requests.',
'feature_flags_template_cookie_consent_tool' => 'The cookie consent tool can be deactivated or activated here.',
'feature_flags_template_log_requests' => 'This setting allows you to enable or disable the request log. It is recommended to disable it, as this information is also available via your web servers logs. Once the request log exceeds a thousand entries, it writes data to text files but still consumes significant system resources.',
'feature_flags_template_notifications' => 'The notifications can be enabled or disabled here.',
'feature_flags_template_comments' => 'The comment system can be enabled or disabled here.',
'feature_flags_template_email_verification' => 'This setting disables the requirement for users to verify their email address during registration. If this feature is disabled, standard registration is possible from then on.',
'feature_flags_template_users_locked_by_default' => 'This setting disables the automatic locking of new users until they have been manually approved.',
//templates\backend_templates\feature_flags_template.php

];
