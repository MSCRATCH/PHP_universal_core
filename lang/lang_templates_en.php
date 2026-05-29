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

//templates\frontend_templates\user_activity_log_template.php
'user_activity_log_template_new_comment' => 'wrote a comment on your article',
'user_activity_log_template_at' => 'at',
'user_activity_log_template_by' => 'by',
'user_activity_log_template_comment_hidden' => 'has hidden your comment',
'user_activity_log_template_comment_restored' => 'restored your comment',
'user_activity_log_template_comment_removed' => 'removed your comment permanently',
'user_activity_log_template_user_level_changed' => 'changed your user level',
'user_activity_log_template_empty_log_title' => 'No entries in the log.',
'user_activity_log_template_all_viewed_title' => 'Mark all log entries as viewed.',
'user_activity_log_template_empty_log_text' => 'The log currently contains no entries.',
'user_activity_log_template_btn_show_article' => 'Show article',
'user_activity_log_template_btn_viewed' => 'Mark as viewed',
'user_activity_log_template_btn_all_viewed' => 'Mark all as viewed',
'user_activity_log_template_btn_all_viewed_text' => 'In this section, all previous entries in the log can be marked as viewed.',
'user_activity_log_template_notice_comment_hidden' => 'Comment hidden on',
'user_activity_log_template_notice_comment_removed' => 'Comment removed on',
'user_activity_log_template_notice_comment_restored' => 'Comment restored on',
'user_activity_log_template_notice_comment_new_comment' => 'New comment on your article',
'user_activity_log_template_notice_comment_viewed' => 'You have marked this entry as viewed.',
'user_activity_log_template_notice_user_level_changed' => 'User level changed',
'user_activity_log_template_user_level_user_text' => 'Your user level has been changed to user. As a user, you can manage your profile and write comments.',
'user_activity_log_template_user_level_moderator_text' => 'Your user level has been changed to moderator. You can now hide other users comments and use the blog system.',
//templates\frontend_templates\user_activity_log_template.php

//templates\frontend_templates\users_template.php
'maintenance_mode_template_text' => 'Maintenance mode has been activated, this page is currently unavailable.',
'maintenance_mode_template_btn_login' => 'Login',
'maintenance_mode_template_btn_logout' => 'Logout',
//templates\frontend_templates\users_template.php

//templates\frontend_templates\user_not_activated_template.php
'user_not_activated_template_text' => 'Your user account has not yet been activated or your account has been blocked.',
'user_not_activated_template_btn_logout' => 'Logout',
//templates\frontend_templates\user_not_activated_template.php

//templates\frontend_templates\user_not_verified_email_template.php
'user_not_verified_email_template_text' => 'Your email address has not been verified. Please check your email inbox and follow the instructions in the registration email you received.',
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

//templates\backend_templates\blocklist_template.php
'blocklist_template_title_blocklist' => 'Blocklist for registration',
'blocklist_template_text' => 'In this section, usernames, email prefixes, and email domains can be blocked, preventing them from being accepted during registration. The system is based on prefixes that must be used to declare the type of data to be blocked. Saving or removing is done via the respective prefix.',
'blocklist_template_label_command' => 'Enter a command',
'blocklist_template_btn_submit' => 'Submit',
'blocklist_template_title_blocked_usernames' => 'Blocked usernames',
'blocklist_template_text_no_usernames_excluded' => 'Currently, no usernames have been excluded from registration.',
'blocklist_template_title_blocked_email_names' => 'Blocked email names',
'blocklist_template_text_no_email_names_excluded' => 'Currently, no email names have been excluded from registration.',
'blocklist_template_title_blocked_email_addresses' => 'Blocked email addresses',
'blocklist_template_text_no_email_addresses_excluded' => 'Currently, no email addresses have been excluded from registration.',
'blocklist_template_title_blocked_email_domains' => 'Blocked email domains',
'blocklist_template_text_no_email_excluded' => 'Currently, no email domains have been excluded from registration.',
//templates\backend_templates\blocklist_template.php

//templates\backend_templates\dashboard_moderator_template.php
'dashboard_moderator_template_title' => 'Moderator dashboard',
'dashboard_moderator_template_text' => 'You are now viewing the moderator section of the dashboard.',
//templates\backend_templates\dashboard_moderator_template.php

//templates\backend_templates\dashboard_template.php
'dashboard_template_title_error_system' => 'Error system',
'dashboard_template_text_error_system' => 'This section displays general errors. If you dont see any errors here, then everything is working as expected.',
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

//templates\backend_templates\show_primary_navigation_template.php
'show_primary_navigation_template_title' => 'Management of primary navigations elements',
'show_primary_navigation_template_text' => 'In this section, the primary navigation can be configured, which can be freely positioned within the layout using the corresponding placeholder.',
'show_primary_navigation_template_btn_create_nav_element' => 'Create element',
'show_primary_navigation_template_url' => 'URL of the nav element:',
'show_primary_navigation_template_order' => 'Numerical order of the nav element:',
'show_primary_navigation_template_btn_remove_nav_element' => 'Remove element',
'show_primary_navigation_template_btn_edit_nav_element' => 'Edit element',
'show_primary_navigation_template_no_elements_text' => 'No primary navigation elements have been created yet.',
'show_primary_navigation_template_no_elements_title' => 'No primary navigation elements',
//templates\backend_templates\show_primary_navigation_template.php

//templates\backend_templates\create_primary_navigation_element_template.php
'create_primary_navigation_element_template_title' => 'Create a primary navigation element',
'create_primary_navigation_element_template_label_order' => 'Order',
'create_primary_navigation_element_template_label_url' => 'URL',
'create_primary_navigation_element_template_label_name' => 'Name',
'create_primary_navigation_element_template_btn_save' => 'Save element',
'create_primary_navigation_element_template_btn_return' => 'Return',
//templates\backend_templates\create_primary_navigation_element_template.php

//templates\backend_templates\edit_primary_navigation_element_template.php
'edit_primary_navigation_element_template_title' => 'Edit a primary navigation element',
'edit_primary_navigation_element_template_label_url' => 'URL',
'edit_primary_navigation_element_template_label_name' => 'Name',
'edit_primary_navigation_element_template_label_order' => 'Order',
'edit_primary_navigation_element_template_btn_edit_primary_nav_element' => 'Edit element',
'edit_primary_navigation_element_template_btn_return' => 'Return',
//templates\backend_templates\edit_primary_navigation_element_template.php

//templates\backend_templates\show_secondary_navigation_template.php
'show_secondary_navigation_template_title' => 'Management of secondary navigations elements',
'show_secondary_navigation_template_text' => 'In this section, the secondary navigation can be configured, which can be freely positioned within the layout using the corresponding placeholder.',
'show_secondary_navigation_template_btn_create_nav_element' => 'Create element',
'show_secondary_navigation_template_url' => 'URL of the nav element:',
'show_secondary_navigation_template_order' => 'Numerical order of the nav element:',
'show_secondary_navigation_template_btn_remove_nav_element' => 'Remove element',
'show_secondary_navigation_template_btn_edit_nav_element' => 'Edit element',
'show_secondary_navigation_template_no_elements_text' => 'No secondary navigation elements have been created yet.',
'show_secondary_navigation_template_no_elements_title' => 'No secondary navigation elements',
//templates\backend_templates\show_secondary_navigation_template.php

//templates\backend_templates\create_secondary_navigation_element_template.php
'create_secondary_navigation_element_template_title' => 'Create a secondary navigation element',
'create_secondary_navigation_element_template_label_order' => 'Order',
'create_secondary_navigation_element_template_label_url' => 'URL',
'create_secondary_navigation_element_template_label_name' => 'Name',
'create_secondary_navigation_element_template_btn_save' => 'Save element',
'create_secondary_navigation_element_template_btn_return' => 'Return',
//templates\backend_templates\create_secondary_navigation_element_template.php

//templates\backend_templates\edit_secondary_navigation_element_template.php
'edit_secondary_navigation_element_template_title' => 'Edit a secondary navigation element',
'edit_secondary_navigation_element_template_label_url' => 'URL',
'edit_secondary_navigation_element_template_label_name' => 'Name',
'edit_secondary_navigation_element_template_label_order' => 'Order',
'edit_secondary_navigation_element_template_btn_edit_secondary_nav_element' => 'Edit element',
'edit_secondary_navigation_element_template_btn_return' => 'Return',
//templates\backend_templates\edit_primary_navigation_element_template.php

//templates\backend_templates\message_remove_user.php
'message_remove_user_text' => 'Are you sure you want to remove that user?',
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
'upload_file_template_upload_max_filesize' => 'Maximum file size:',
'upload_file_template_post_max_size' => 'Maximum post file size:',
'upload_file_template_max_filesize_text' => 'The two settings mentioned above must be set to 100M. These can be configured in your web servers php ini file. Otherwise, the system will not function as intended. If 100 MB is listed for both entries, you do not need to take any further action.',
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

//templates\backend_templates\show_user_activity_log_template.php
'show_user_activity_log_template_comment_created' => 'A comment has been created',
'show_user_activity_log_template_comment_removed' => 'A comment has been removed',
'show_user_activity_log_template_comment_hidden' => 'A comment has been hidden',
'show_user_activity_log_template_comment_restored' => 'A comment has been restored',
'show_user_activity_log_template_user_level_changed' => 'A user level has been changed',
'show_user_activity_log_template_btn_show_article' => 'Show article',
'show_user_activity_log_template_btn_show_user' => 'Show user',
'show_user_activity_log_template_activity_performed_by' => 'Activity performed by:',
'show_user_activity_log_template_activity_affects' => 'Activity affects:',
'show_user_activity_log_template_activity_performed' => 'Activity performed:',
'show_user_activity_log_template_user_level_changed_to' => 'User level changed to:',
'show_user_activity_log_template_viewed_by_affected_user' => 'The entry has been viewed by the affected user.',
'show_user_activity_log_template_no_entries_title' => 'No entries in the activity log',
'show_user_activity_log_template_no_entries_text' => 'The user activity log has no entries.',
//templates\backend_templates\show_user_activity_log_template.php

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

];
