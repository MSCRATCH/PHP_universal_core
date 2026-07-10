<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//lang_functions_en.php
//MMXXVI MSCRATCH

$text_functions = [

//Available globally for all functions
'csrf_text' => 'Your session has been terminated for security reasons.',
'csrf_btn' => 'Return',
//Available globally for all functions

//functions\helper_functions\parse_bb_code.php
'parse_bb_code_no_file' => 'An error occurred while loading the file.',
//functions\helper_functions\parse_bb_code.php

//functions\helper_functions\render_performance_stats.php
'page_rendering_time' => 'This page was generated in:',
'memory_usage' => 'Memory usage during page generation:',
'included_files' => 'Number of loaded files:',
//functions\helper_functions\render_performance_stats.php

//functions\helper_functions\cct.php
'cct_title' => 'Notice regarding the use of cookies.',
'cct_text' => 'This site uses cookies and logs activity, such as IP addresses, to ensure security for all users. By visiting this site, you agree to this.',
'cct_btn' => 'Accept',
//functions\helper_functions\cct.php

//functions\helper_functions\pagination.php
'pagination_of' => 'of',
'pagination_page' => 'Page',
'pagination_previous_page' => 'Previous page',
'pagination_next_page' => 'Next page',
//functions\helper_functions\pagination.php

//functions\mail_functions\public_emails.php
'message_public_emails_no_contact_form_email' => 'The email address is missing.',
'message_public_emails_no_contact_form_name' => 'The name is missing.',
'message_public_emails_no_contact_form_text' => 'The message is missing.',
'message_public_emails_no_contact_form_subject' => 'The email subject is missing.',
'message_public_emails_contact_form_email_address_invalid' => 'The entered email address is invalid.',
'message_public_emails_contact_form_security_question_invalid' => 'The security question is invalid.',
'message_public_emails_no_security_question' => 'The security question is missing.',
//functions\mail_functions\public_emails.php

//functions\mail_functions\verify_email.php
'message_verify_email_unauthorized_access' => 'Your request is invalid.',
'message_verify_email_invalid_token' => 'The verification token is invalid or expired.',
'message_verify_email_already_verified' => 'Your email address has already been verified.',
//functions\mail_functions\verify_email.php

//functions\file_functions\serve_uploaded_file.php
'message_serve_uploaded_file_no_file' => 'The requested file could not be found.',
'message_serve_uploaded_file_btn' => 'Back to homepage',
//functions\file_functions\serve_uploaded_file.php

//functions\file_functions\serve_profile_image.php
'message_serve_profile_images_no_profile_image' => 'Such a profile picture does not exist.',
'message_serve_profile_images_profile_btn' => 'Back to homepage',
//functions\file_functions\serve_profile_image.php

//functions\auth_functions\login.php
'message_login_no_username' => 'No username was provided.',
'message_login_no_password' => 'No password was provided.',
'message_login_failed' => 'Your login was unsuccessful. Please check your credentials and try again.',
'message_login_too_many_attempts' => 'You have exceeded the maximum number of login attempts. Please wait before trying again.',
//functions\auth_functions\login.php

//functions\auth_functions\register.php
'message_register_no_username' => 'No username was provided.',
'message_register_no_password' => 'No password was provided.',
'message_register_no_password_confirmation' => 'No password confirmation was provided.',
'message_register_no_email_address' => 'No email address was provided.',
'message_register_no_security_question' => 'No answer was provided for the security question.',
'message_register_username_length' => 'The username cannot be longer than 30 characters.',
'message_register_username_short' => 'The username must contain a minimum of 5 characters.',
'message_register_username_special_characters' => 'The username may only contain letters and numbers.',
'message_register_password_length' => 'The password cannot be longer than 30 characters.',
'message_register_password_short' => 'The password must contain a minimum of 8 characters.',
'message_register_password_no_match' => 'The passwords entered do not match.',
'message_register_email_address_invalid' => 'The email address provided is invalid.',
'message_register_security_question_invalid' => 'The answer to the security question is invalid.',
'message_register_username_already_taken' => 'The provided username is not available. Try a different one.',
'message_register_email_address_already_taken' => 'The provided email address is not available. Try a different one.',
'message_register_critical_error' => 'Something went wrong. Please try again later.',
//functions\auth_functions\register.php

//functions\frontend_functions\public_profile_image_upload.php
'message_profile_image_invalid_size' => 'The profile image could not be uploaded due to an invalid image size.',
'message_profile_image_invalid_extension' => 'The profile image could not be uploaded due to an invalid file type. Only JPG, JPEG, or PNG files are allowed.',
'message_profile_image_invalid_type' => 'The profile image could not be uploaded due to an invalid file type.',
'message_profile_image_invalid_dimension' => 'The profile image could not be uploaded because it must have dimensions of exactly 500 by 500 pixels.',
'message_profile_image_no_file' => 'The profile image could not be uploaded because no file was selected.',
//functions\frontend_functions\public_profile_image_upload.php

//functions\backend_functions\backend_login.php
'message_backend_login_too_many_attempts' => 'You have exceeded the maximum number of login attempts. Please wait before trying again.',
'message_backend_login_no_username' => 'No username was provided.',
'message_backend_login_no_password' => 'No password was provided.',
'message_backend_login_failed' => 'Your login was unsuccessful. Please check your credentials and try again.',
//functions\backend_functions\backend_login.php

//functions\backend_functions\manage_uploaded_files.php
'message_upload_files_no_file' => 'No file was provided.',
'message_upload_files_no_file_title' => 'No file title was provided.',
'message_upload_files_no_file_description' => 'No file description was provided.',
'message_upload_files_invalid_extension' => 'Invalid file extension.',
'message_upload_files_invalid_size' => 'Invalid file size, the file must be a maximum of 100 MB.',
'message_upload_files_invalid_type' => 'Invalid file.',
//functions\backend_functions\manage_uploaded_files.php

//functions\backend_functions\manage_comments.php
'message_manage_comments_no_comment' => 'No comment have been entered.',
'message_manage_comments_too_long' => 'The entered comment is too long. Comments are limited to 500 characters.',
'message_manage_comments_contains_link' => 'Comments cannot contain links.',
//functions\backend_functions\manage_comments.php

//functions\backend_functions\manage_emails.php
'message_manage_emails_spam_trap' => 'Your request is invalid.',
'message_manage_emails_no_host' => 'The hostname is missing.',
'message_manage_emails_no_port' => 'The port is missing.',
'message_manage_emails_no_user' => 'The email address is missing.',
'message_manage_emails_no_password' => 'The password is missing.',
'message_manage_emails_no_encryption' => 'The encryption is missing.',
'message_manage_emails_no_from_email' => 'The email address is missing.',
'message_manage_emails_no_from_name' => 'The name is missing.',
'message_manage_emails_connection_failed' => 'The access credentials are incorrect. The connection failed.',
//functions\backend_functions\manage_emails.php

//functions\backend_functions\manage_settings.php
'message_settings_no_settings' => 'No settings have been submitted.',
'message_settings_invalid_key' => 'You have submitted an invalid setting key.',
'message_settings_no_value' => 'You have not provided a value for the setting.',
'message_settings_no_key' => 'You have not provided a key for the setting.',
'message_settings_invalid_language_value' => 'Only en or de are accepted as valid parameters.',
//functions\backend_functions\manage_settings.php

//functions\backend_functions\manage_feature_flags.php
'message_feature_flags_no_flags' => 'No flags have been submitted.',
'message_feature_flags_no_value' => 'You have not provided a value for the flag.',
'message_feature_flags_invalid_key' => 'You have submitted an invalid flag key.',
'message_feature_flags_invalid_value' => 'You have submitted an invalid flag value.',
'message_feature_flags_no_key' => 'You have not provided a key for the flag.',
//functions\backend_functions\manage_feature_flags.php

//functions\backend_functions\manage_custom_pages.php
'message_manage_custom_pages_no_name' => 'No name was provided.',
'message_manage_custom_pages_invalid_url' => 'The URL provided is reserved for the system and therefore not available.',
'message_manage_custom_pages_no_title' => 'No title was provided.',
'message_manage_custom_pages_no_content' => 'No content was provided.',
//functions\backend_functions\manage_custom_pages.php

//functions\backend_functions\manage_navigations.php
'message_manage_navigations_invalid_placeholder_format' => 'The format for the placeholder is invalid.',
'message_manage_navigations_no_placeholder' => 'You have not specified a placeholder.',
'message_manage_navigations_forbidden_url' => 'This is a system critical navigation link that cannot be used in this way. System critical links have fixed placeholders that can be positioned freely within the layout. Please refer to the documentation for further questions.',
'message_manage_navigations_no_url' => 'No url was provided.',
'message_manage_navigations_no_name' => 'No name was provided.',
'message_manage_navigations_no_order' => 'No number for the order was provided.',
'message_manage_navigations_order_not_numeric' => 'The number for the order ist not numeric.',
//functions\backend_functions\manage_navigations.php

//functions\backend_functions\manage_blog.php
'message_manage_blog_no_title' => 'No title was provided.',
'message_manage_blog_no_preview' => 'No preview was provided.',
'message_manage_blog_no_content' => 'No content was provided.',
//functions\backend_functions\manage_blog.php

//functions\backend_functions\render_backend_navigation.php
//functions\frontend_functions\public_navigations.php
'home_nav_item' => 'Home',
'contact_nav_item' => 'Contact',
'blog_nav_item' => 'Blog',
'login_nav_item' => 'Login',
'register_nav_item' => 'Register',
'notifications_nav_item' => 'Notifications',
'profile_settings_nav_item' => 'Profile settings',
'dashboard_nav_item' => 'Dashboard',
'dashboard_moderator_nav_item' => 'Dashboard',
'logout_nav_item' => 'Logout',
'dashboard_moderator_nav_item' => 'Dashboard',
'dashboard_nav_moderator_back_to_homepage' => 'Back to homepage',
'dashboard_nav_moderator_dashboard' => 'Dashboard',
'dashboard_nav_administrator_back_to_homepage' => 'Back to homepage',
'dashboard_nav_administrator_dashboard' => 'Dashboard',
'dashboard_nav_administrator_feature_flags' => 'Feature Flags',
'dashboard_nav_administrator_settings' => 'Settings',
'dashboard_nav_administrator_email_config' => 'Email config',
'dashboard_nav_administrator_request_log' => 'Request log',
'dashboard_nav_administrator_error_log' => 'Error log',
'dashboard_nav_administrator_blocklist' => 'Blocklist',
'dashboard_nav_administrator_user_management' => 'User management',
'dashboard_nav_administrator_show_hidden_comments' => 'Hidden comments',
'dashboard_nav_administrator_show_custom_pages' => 'Custom pages',
'dashboard_nav_administrator_navigations' => 'Navigations',
'dashboard_nav_administrator_manage_themes' => 'Themes',
'dashboard_nav_administrator_show_custom_widgets' => 'Widgets',
'dashboard_nav_show_uploaded_files' => 'Upload files',
'dashboard_nav_blog_articles' => 'Blog',
'dashboard_nav_logout' => 'Logout',
//functions\backend_functions\render_backend_navigation.php
//functions\frontend_functions\public_navigations.php

//functions\backend_functions\manage_custom_widgets.php
'manage_custom_widgets_invalid_placeholder_format' => 'Invalid placeholder format. Placeholders may contain only alphabetic characters.',
'manage_custom_widgets_no_custom_widget_content' => 'No widget content was provided.',
'manage_custom_widgets_no_custom_widget_placeholder' => 'No widget placeholder was provided.',
'manage_custom_widgets_placeholder_already_exists' => 'The placeholder already exists. Please choose a different one.',
//functions\backend_functions\manage_custom_widgets.php

//functions\security_functions\rate_limiter.php
'message_rate_limiter_text' => 'You have sent too many requests. Please wait 5 minutes before trying again.',
'message_rate_limiter_btn_return' => 'Return',
//functions\security_functions\rate_limiter.php

];
