<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//lang_handlers_en.php
//MMXXVI MSCRATCH

$text_handlers = [

//Available globally for all handlers
'csrf_text' => 'Your session has been terminated for security reasons.',
'csrf_btn' => 'Return',
//Available globally for all handlers

//handlers_frontend\login_handler.php
'login_handler_successful_login' => 'You have been successfully logged in.',
'login_handler_btn_return' => 'Return',
//handlers_frontend\login_handler.php

//handlers_frontend\logout_handler.php
'logout_handler_successful_logout' => 'You have been successfully logged out.',
'logout_handler_successful_backend_logout' => 'You have been logged out successfully from both the frontend and backend areas.',
'logout_handler_btn_return' => 'Return',
//handlers_frontend\logout_handler.php

//handlers_frontend\manage_profile_handler.php
'manage_profile_handler_successful_updated' => 'Your profile has been successfully updated.',
'manage_profile_handler_successful_uploaded' => 'Your profile image has been successfully uploaded.',
'manage_profile_handler_btn_return' => 'Return',
//handlers_frontend\manage_profile_handler.php

//handlers_frontend\profile_handler.php
'profile_handler_user_dont_exist' => 'The user you are searching for does not exist.',
'profile_handler_account_not_activated' => 'This account is not activated and therefore inaccessible.',
'profile_handler_btn_back_to_the_homepage' => 'Back to the homepage',
//handlers_frontend\profile_handler.php

//handlers_frontend\register_handler.php
'register_handler_registration_deactivated' => 'Registration has been deactivated.',
'register_handler_btn_return' => 'Return',
'register_handler_successful_registered' => 'You have been successfully registered.',
'register_handler_btn_back_to_the_homepage' => 'Back to the homepage',
//handlers\register_handler.php

//handlers_frontend\article_handler.php
'article_handler_article_dont_exist' => 'The requested article does not exist.',
'article_handler_btn_return' => 'Return',
'article_handler_successful_saved' => 'The comment has been successfully saved.',
'article_handler_successful_removed' => 'The comment has been successfully removed.',
'article_handler_successful_hidden' => 'The comment has been successfully hidden.',
'article_handler_successful_restored' => 'The comment has been successfully restored.',
'article_handler_btn_back_to_article' => 'Back to the article',
//handlers_frontend\article_handler.php

//handlers_frontend\user_activity_log_handler.php
'user_activity_log_handler_successful_marked' => 'The message in your log has been successfully marked as viewed.',
'user_activity_log_handler_successful_marked_all' => 'All messages in the log have been successfully marked as viewed.',
'user_activity_log_handler_btn_return' => 'Return',
//handlers_frontend\user_activity_log_handler.php

//handlers_frontend\verify_email_address_handler.php
'verify_email_address_handler_successful_verified' => 'Your email address has been successfully verified.',
'verify_email_address_handler_verification_failed' => 'Email verification failed.',
'verify_email_address_handler_btn_return' => 'Return',
//handlers_frontend\verify_email_address_handler.php

//handlers_frontend\contact_handler.php
'contact_handler_contact_form_deactivated' => 'The contact form is currently disabled.',
'contact_handler_successful_received' => 'We have successfully received your message.',
'contact_handler_btn_return' => 'Return',
//handlers_frontend\contact_handler.php

//handlers_frontend\resend_verification_email_handler.php
'resend_verification_email_handler_successful_sent' => 'The verification email has been successfully sent.',
'resend_verification_email_handler_sending_failed' => 'The registration email was not sent successfully.',
'resend_verification_email_handler_btn_return' => 'Return',
//handlers_frontend\resend_verification_email_handler.php

//handlers_backend\backend_login_handler.php
'backend_login_handler_successful_authorized_to_access_backend' => 'You have successfully authorized yourself to access the backend.',
'backend_login_handler_btn_go_to_the_dashboard' => 'Go to the dashboard',
//handlers_backend\backend_login_handler.php

//handlers_backend\blocklist_handler.php
'blocklist_handler_command_successful_executed' => 'The command was successfully executed.',
'blocklist_handler_btn_return' => 'Return',
//handlers_backend\blocklist_handler.php

//handlers_backend\error_log_handler.php
'error_log_handler_successful_cleared' => 'The error log has been successfully cleared.',
'error_log_handler_btn_return' => 'Return',
//handlers_backend\error_log_handler.php

//handlers_backend\show_blog_articles_handler.php
'show_blog_articles_handler_successful_removed' => 'The blog article has been successfully removed.',
'show_blog_articles_handler_btn_return' => 'Return',
//handlers_backend\show_blog_articles_handler.php

//handlers_backend\create_blog_article_handler.php
'create_blog_article_handler_successful_saved' => 'The blog article has been successfully saved.',
'create_blog_article_handler_btn_return' => 'Return',
//handlers_backend\create_blog_article_handler.php

//handlers_backend\edit_blog_article_handler.php
'edit_blog_article_handler_page_dont_exist' => 'The requested blog article does not exist.',
'edit_blog_article_handler_successful_edited' => 'The blog article has been successfully edited.',
'edit_blog_article_handler_btn_return' => 'Return',
//handlers_backend\edit_blog_article_handler.php

//handlers_backend\manage_custom_pages_handler.php
'show_custom_pages_handler_successful_removed' => 'The custom page has been successfully removed.',
'show_custom_pages_handler_btn_return' => 'Return',
//handlers_backend\manage_custom_pages_handler.php

//handlers_backend\create_custom_page_handler.php
'create_custom_page_handler_saved' => 'The custom page has been successfully saved.',
'create_custom_page_handler_btn_return' => 'Return',
//handlers_backend\create_custom_page_handler.php

//handlers_backend\edit_custom_page_handler.php
'edit_custom_page_handler_page_dont_exist' => 'The requested custom page does not exist.',
'edit_custom_page_handler_successful_edited' => 'The custom page has been successfully edited.',
'edit_custom_page_handler_btn_return' => 'Return',
//handlers_backend\edit_custom_page_handler.php

//handlers_backend\show_primary_navigation_handler.php
'show_primary_navigation_handler_successful_removed' => 'The primary navigation element has been successfully removed.',
'show_primary_navigation_handler_btn_return' => 'Return',
//handlers_backend\show_primary_navigation_handler.php

//handlers_backend\create_primary_navigation_element_handler.php
'create_primary_navigation_element_handler_successful_created' => 'The primary navigation element has been successfully created.',
'create_primary_navigation_element_handler_btn_return' => 'Return',
//handlers_backend\create_primary_navigation_element_handler.php

//handlers_backend\edit_primary_navigation_element_handler.php
'edit_primary_navigation_element_handler_element_dont_exist' => 'No such primary navigation element exists.',
'edit_primary_navigation_element_handler_successful_edited' => 'The primary navigation element has been successfully edited.',
'edit_primary_navigation_element_handler_btn_return' => 'Return',
//handlers_backend\edit_primary_navigation_element_handler.php

//handlers_backend\show_secondary_navigation_handler.php
'show_secondary_navigation_handler_successful_removed' => 'The secondary navigation element has been successfully removed.',
'show_secondary_navigation_handler_btn_return' => 'Return',
//handlers_backend\show_secondary_navigation_handler.php

//handlers_backend\create_secondary_navigation_element_handler.php
'create_secondary_navigation_element_handler_successful_created' => 'The secondary navigation element has been successfully created.',
'create_secondary_navigation_element_handler_btn_return' => 'Return',
//handlers_backend\create_secondary_navigation_element_handler.php

//handlers_backend\edit_secondary_navigation_element_handler.php
'edit_secondary_navigation_element_handler_element_dont_exist' => 'No such primary navigation element exists.',
'edit_secondary_navigation_element_handler_successful_edited' => 'The primary navigation element has been successfully edited.',
'edit_secondary_navigation_element_handler_btn_return' => 'Return',
//handlers_backend\edit_secondary_navigation_element_handler.php

//handlers_backend\settings_handler.php
'settings_handler_successful_edited' => 'The settings have been successfully updated.',
'settings_handler_btn_return' => 'Return',
//handlers_backend\settings_handler.php

//handlers_backend\show_uploaded_files_handler.php
'show_uploaded_files_handler_successful_removed' => 'The file has been successfully removed.',
'show_uploaded_files_handler_btn_return' => 'Return',
//handlers_backend\show_upload_files_handler.php

//handlers_backend\upload_file_handler.php
'upload_file_handler_successful_uploaded' => 'The file has been successfully uploaded.',
'upload_file_handler_btn_return' => 'Return',
//handlers_backend\upload_file_handler.php

//handlers_backend\edit_uploaded_file_handler.php
'edit_uploaded_file_handler_file_dont_exist' => 'The file has been successfully uploaded.',
'edit_uploaded_file_handler_successful_edited' => 'The file has been successfully edited.',
'edit_uploaded_file_handler_btn_return' => 'Return',
//handlers_backend\edit_uploaded_file_handler.php

//handlers_backend\users_handler.php
'users_handler_successful_removed' => 'The user has been successfully removed.',
'users_handler_successful_updated' => 'The user level have been successfully updated.',
'users_handler_btn_return' => 'Return',
//handlers_backend\users_handler.php

//handlers_backend\email_config_handler.php
'email_config_handler_successful_edited' => 'The access credentials are correct and have been successfully updated.',
'email_config_handler_btn_return' => 'Return',
//handlers_backend\email_config_handler.php

//handlers_backend\show_user_activity_log_handler.php
'show_user_activity_log_handler_user_dont_exist' => 'Such a user does not exist.',
'show_user_activity_log_handler_btn_return' => 'Return',
//handlers_backend\show_user_activity_log_handler.php

//handlers_backend\show_hidden_comments_handler.php
'show_hidden_comments_handler_successful_viewed' => 'All entries have been successfully marked as viewed.',
'show_hidden_comments_handler_btn_return' => 'Return',
//handlers_backend\show_hidden_comments_handler.php

//handlers_backend\manage_themes_handler.php
'manage_themes_handler_successful_activated' => 'The selected theme has been successfully activated.',
'manage_themes_handler_successful_deactivated' => 'The selected theme has been successfully deactivated.',
'manage_themes_handler_btn_return' => 'Return',
//handlers_backend\manage_themes_handler.php


];
