<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//system_files.php
//MMXXVI MSCRATCH

$system_files = array(

//config
root_path . '/config/.htaccess',
root_path . '/config/allowed_backend_sections.php',
root_path . '/config/allowed_frontend_sections.php',
root_path . '/config/app_loader_permissions.php',
//config

//files/
root_path . '/files/.htaccess',
//files/

//functions/auth_functions/
root_path . '/functions/auth_functions/.htaccess',
root_path . '/functions/auth_functions/login.php',
root_path . '/functions/auth_functions/logout.php',
root_path . '/functions/auth_functions/register.php',
//functions/auth_functions/

//functions/backend_functions/
root_path . '/functions/backend_functions/.htaccess',
root_path . '/functions/backend_functions/backend_login.php',
root_path . '/functions/backend_functions/backend_logout.php',
root_path . '/functions/backend_functions/manage_blog.php',
root_path . '/functions/backend_functions/manage_comments.php',
root_path . '/functions/backend_functions/manage_custom_pages.php',
root_path . '/functions/backend_functions/manage_custom_widgets.php',
root_path . '/functions/backend_functions/manage_dashboard_stats.php',
root_path . '/functions/backend_functions/manage_emails.php',
root_path . '/functions/backend_functions/manage_error_log.php',
root_path . '/functions/backend_functions/manage_feature_flags.php',
root_path . '/functions/backend_functions/manage_navigations.php',
root_path . '/functions/backend_functions/manage_request_log.php',
root_path . '/functions/backend_functions/manage_settings.php',
root_path . '/functions/backend_functions/manage_themes.php',
root_path . '/functions/backend_functions/manage_uploaded_files.php',
root_path . '/functions/backend_functions/manage_users.php',
root_path . '/functions/backend_functions/render_backend_navigation.php',
//functions/backend_functions/

//functions/core_functions/
root_path . '/functions/core_functions/.htaccess',
root_path . '/functions/core_functions/authentication.php',
root_path . '/functions/core_functions/check_system_requirements.php',
root_path . '/functions/core_functions/db.php',
root_path . '/functions/core_functions/front_controller.php',
root_path . '/functions/core_functions/load_activated_theme.php',
root_path . '/functions/core_functions/load_feature_flags.php',
root_path . '/functions/core_functions/load_settings.php',
root_path . '/functions/core_functions/register_error_handler.php',
root_path . '/functions/core_functions/register_exception_handler.php',
root_path . '/functions/core_functions/render_page.php',
root_path . '/functions/core_functions/sanitize_functions.php',
//functions/core_functions/

//functions/file_functions/
root_path . '/functions/file_functions/.htaccess',
root_path . '/functions/file_functions/handle_file_requests.php',
root_path . '/functions/file_functions/serve_profile_image.php',
root_path . '/functions/file_functions/serve_uploaded_file.php',
//functions/file_functions/

//functions/frontend_functions/
root_path . '/functions/frontend_functions/.htaccess',
root_path . '/functions/frontend_functions/public_blog.php',
root_path . '/functions/frontend_functions/public_comments.php',
root_path . '/functions/frontend_functions/public_custom_pages.php',
root_path . '/functions/frontend_functions/public_custom_widgets.php',
root_path . '/functions/frontend_functions/public_navigations.php',
root_path . '/functions/frontend_functions/public_profile_image_upload.php',
root_path . '/functions/frontend_functions/public_profile.php',
//functions/frontend_functions/

//functions/helper_functions/
root_path . '/functions/helper_functions/.htaccess',
root_path . '/functions/helper_functions/cct.php',
root_path . '/functions/helper_functions/format_file_size.php',
root_path . '/functions/helper_functions/pagination.php',
root_path . '/functions/helper_functions/parse_bb_code.php',
root_path . '/functions/helper_functions/render_performance_stats.php',
//functions/helper_functions/

//functions/mail_functions/
root_path . '/functions/mail_functions/.htaccess',
root_path . '/functions/mail_functions/public_emails.php',
root_path . '/functions/mail_functions/verify_email.php',
//functions/mail_functions/

//functions/message_functions/
root_path . '/functions/message_functions/.htaccess',
root_path . '/functions/message_functions/backend_system_message.php',
root_path . '/functions/message_functions/fatal_error_message.php',
root_path . '/functions/message_functions/frontend_system_message.php',
root_path . '/functions/message_functions/http_error_message.php',
//functions/message_functions/

//functions/security_functions/
root_path . '/functions/security_functions/.htaccess',
root_path . '/functions/security_functions/csrf_token.php',
root_path . '/functions/security_functions/make_safe_url.php',
root_path . '/functions/security_functions/manage_login_attempts.php',
root_path . '/functions/security_functions/rate_limiter.php',
//functions/security_functions/

//functions/user_functions/
root_path . '/functions/user_functions/.htaccess',
root_path . '/functions/user_functions/check_username.php',
root_path . '/functions/user_functions/log_requests.php',
root_path . '/functions/user_functions/public_notifications.php',
root_path . '/functions/user_functions/update_last_activity.php',
//functions/user_functions/

//handlers_backend/
root_path . '/handlers_backend/.htaccess',
root_path . '/handlers_backend/backend_login_handler.php',
root_path . '/handlers_backend/create_blog_article_handler.php',
root_path . '/handlers_backend/create_custom_page_handler.php',
root_path . '/handlers_backend/create_custom_widget_handler.php',
root_path . '/handlers_backend/create_navigation_handler.php',
root_path . '/handlers_backend/create_navigation_link_handler.php',
root_path . '/handlers_backend/dashboard_handler.php',
root_path . '/handlers_backend/dashboard_moderator_handler.php',
root_path . '/handlers_backend/edit_blog_article_handler.php',
root_path . '/handlers_backend/edit_custom_page_handler.php',
root_path . '/handlers_backend/edit_custom_widget_handler.php',
root_path . '/handlers_backend/edit_navigation_handler.php',
root_path . '/handlers_backend/edit_uploaded_file_handler.php',
root_path . '/handlers_backend/email_config_handler.php',
root_path . '/handlers_backend/error_log_handler.php',
root_path . '/handlers_backend/feature_flags_handler.php',
root_path . '/handlers_backend/manage_themes_handler.php',
root_path . '/handlers_backend/request_log_handler.php',
root_path . '/handlers_backend/settings_handler.php',
root_path . '/handlers_backend/show_blog_articles_handler.php',
root_path . '/handlers_backend/show_custom_pages_handler.php',
root_path . '/handlers_backend/show_custom_widgets_handler.php',
root_path . '/handlers_backend/show_hidden_comments_handler.php',
root_path . '/handlers_backend/show_navigation_links_handler.php',
root_path . '/handlers_backend/show_navigations_handler.php',
root_path . '/handlers_backend/show_uploaded_files_handler.php',
root_path . '/handlers_backend/upload_file_handler.php',
root_path . '/handlers_backend/users_handler.php',
//handlers_backend/

//handlers_frontend/
root_path . '/handlers_frontend/.htaccess',
root_path . '/handlers_frontend/article_handler.php',
root_path . '/handlers_frontend/blog_handler.php',
root_path . '/handlers_frontend/contact_handler.php',
root_path . '/handlers_frontend/login_handler.php',
root_path . '/handlers_frontend/logout_handler.php',
root_path . '/handlers_frontend/manage_profile_handler.php',
root_path . '/handlers_frontend/notifications_handler.php',
root_path . '/handlers_frontend/profile_handler.php',
root_path . '/handlers_frontend/register_handler.php',
root_path . '/handlers_frontend/resend_verification_email_handler.php',
root_path . '/handlers_frontend/verify_email_address_handler.php',
//handlers_backend/

//includes/
root_path . '/includes/.htaccess',
root_path . '/includes/app_loader.php',
root_path . '/includes/core_loader.php',
root_path . '/includes/lang_files.php',
root_path . '/includes/lang_loader.php',
root_path . '/includes/paths.php',
//includes/

//lang/
root_path . '/lang/.htaccess',
root_path . '/lang/lang_functions_de.php',
root_path . '/lang/lang_functions_en.php',
root_path . '/lang/lang_handlers_de.php',
root_path . '/lang/lang_handlers_en.php',
root_path . '/lang/lang_templates_de.php',
root_path . '/lang/lang_templates_en.php',
//lang/

//logs/
root_path . '/logs/.htaccess',
//logs/

//profile_images/
root_path . '/profile_images/.htaccess',
//profile_images/

///public/assets/
root_path . '/public/assets/fonts/roboto-v50-latin-300.woff2',
root_path . '/public/assets/fonts/roboto-v50-latin-300italic.woff2',
root_path . '/public/assets/fonts/roboto-v50-latin-500.woff2',
root_path . '/public/assets/fonts/roboto-v50-latin-500italic.woff2',
root_path . '/public/assets/fonts/roboto-v50-latin-600.woff2',
root_path . '/public/assets/fonts/roboto-v50-latin-600italic.woff2',
root_path . '/public/assets/fonts/roboto-v50-latin-700.woff2',
root_path . '/public/assets/fonts/roboto-v50-latin-700italic.woff2',
root_path . '/public/assets/fonts/roboto-v50-latin-800.woff2',
root_path . '/public/assets/fonts/roboto-v50-latin-800italic.woff2',
root_path . '/public/assets/fonts/roboto-v50-latin-italic.woff2',
root_path . '/public/assets/fonts/roboto-v50-latin-regular.woff2',
root_path . '/public/assets/fatal_error_message.css',
///public/assets/

///public/themes/backend_theme/
root_path . '/public/themes/backend_theme/fonts/roboto-v50-latin-300.woff2',
root_path . '/public/themes/backend_theme/fonts/roboto-v50-latin-300italic.woff2',
root_path . '/public/themes/backend_theme/fonts/roboto-v50-latin-500.woff2',
root_path . '/public/themes/backend_theme/fonts/roboto-v50-latin-500italic.woff2',
root_path . '/public/themes/backend_theme/fonts/roboto-v50-latin-600.woff2',
root_path . '/public/themes/backend_theme/fonts/roboto-v50-latin-600italic.woff2',
root_path . '/public/themes/backend_theme/fonts/roboto-v50-latin-700.woff2',
root_path . '/public/themes/backend_theme/fonts/roboto-v50-latin-700italic.woff2',
root_path . '/public/themes/backend_theme/fonts/roboto-v50-latin-800.woff2',
root_path . '/public/themes/backend_theme/fonts/roboto-v50-latin-800italic.woff2',
root_path . '/public/themes/backend_theme/fonts/roboto-v50-latin-italic.woff2',
root_path . '/public/themes/backend_theme/fonts/roboto-v50-latin-regular.woff2',
root_path . '/public/themes/backend_theme/js/menu.js',
root_path . '/public/themes/backend_theme/js/upd_btn.js',
root_path . '/public/themes/backend_theme/css/backend_system_message.css',
root_path . '/public/themes/backend_theme/css/backend.css',
///public/themes/backend_theme/

///public/themes/default_theme/
root_path . '/public/themes/default_theme/fonts/roboto-v50-latin-300.woff2',
root_path . '/public/themes/default_theme/fonts/roboto-v50-latin-300italic.woff2',
root_path . '/public/themes/default_theme/fonts/roboto-v50-latin-500.woff2',
root_path . '/public/themes/default_theme/fonts/roboto-v50-latin-500italic.woff2',
root_path . '/public/themes/default_theme/fonts/roboto-v50-latin-600.woff2',
root_path . '/public/themes/default_theme/fonts/roboto-v50-latin-600italic.woff2',
root_path . '/public/themes/default_theme/fonts/roboto-v50-latin-700.woff2',
root_path . '/public/themes/default_theme/fonts/roboto-v50-latin-700italic.woff2',
root_path . '/public/themes/default_theme/fonts/roboto-v50-latin-800.woff2',
root_path . '/public/themes/default_theme/fonts/roboto-v50-latin-800italic.woff2',
root_path . '/public/themes/default_theme/fonts/roboto-v50-latin-italic.woff2',
root_path . '/public/themes/default_theme/fonts/roboto-v50-latin-regular.woff2',
root_path . '/public/themes/default_theme/js/menu.js',
root_path . '/public/themes/default_theme/js/upd_btn.js',
root_path . '/public/themes/default_theme/css/components.css',
root_path . '/public/themes/default_theme/css/default.css',
root_path . '/public/themes/default_theme/css/system_pages.css',
///public/themes/default_theme/

//public/
root_path . '/public/.htaccess',
//public/

//backend_templates/
root_path . '/templates/backend_templates/.htaccess',
root_path . '/templates/backend_templates/backend_login_template.php',
root_path . '/templates/backend_templates/backend_system_message_template.php',
root_path . '/templates/backend_templates/create_blog_article_template.php',
root_path . '/templates/backend_templates/create_custom_page_template.php',
root_path . '/templates/backend_templates/create_custom_widget_template.php',
root_path . '/templates/backend_templates/create_navigation_link_template.php',
root_path . '/templates/backend_templates/create_navigation_link_template.php',
root_path . '/templates/backend_templates/dashboard_moderator_template.php',
root_path . '/templates/backend_templates/dashboard_template.php',
root_path . '/templates/backend_templates/edit_blog_article_template.php',
root_path . '/templates/backend_templates/edit_custom_page_template.php',
root_path . '/templates/backend_templates/edit_custom_widget_template.php',
root_path . '/templates/backend_templates/edit_navigation_template.php',
root_path . '/templates/backend_templates/edit_uploaded_file_template.php',
root_path . '/templates/backend_templates/email_config_template.php',
root_path . '/templates/backend_templates/error_log_template.php',
root_path . '/templates/backend_templates/feature_flags_template.php',
root_path . '/templates/backend_templates/manage_themes_template.php',
root_path . '/templates/backend_templates/message_remove_user.php',
root_path . '/templates/backend_templates/request_log_template.php',
root_path . '/templates/backend_templates/settings_template.php',
root_path . '/templates/backend_templates/show_blog_articles_template.php',
root_path . '/templates/backend_templates/show_custom_pages_template.php',
root_path . '/templates/backend_templates/show_custom_widgets_template.php',
root_path . '/templates/backend_templates/show_hidden_comments_template.php',
root_path . '/templates/backend_templates/show_navigation_links_template.php',
root_path . '/templates/backend_templates/show_navigations_template.php',
root_path . '/templates/backend_templates/show_uploaded_files_template.php',
root_path . '/templates/backend_templates/upload_file_template.php',
root_path . '/templates/backend_templates/users_template.php',
//backend_templates/

//email_templates/
root_path . '/templates/email_templates/.htaccess',
root_path . '/templates/email_templates/contact_email_template.php',
root_path . '/templates/email_templates/email_verification_template.php',
//email_templates/

//frontend_templates/
root_path . '/templates/frontend_templates/notifications_templates/.htaccess',
root_path . '/templates/frontend_templates/notifications_templates/comment_created_template.php',
root_path . '/templates/frontend_templates/notifications_templates/comment_hidden_template.php',
root_path . '/templates/frontend_templates/notifications_templates/comment_removed_template.php',
root_path . '/templates/frontend_templates/notifications_templates/comment_restored_template.php',
root_path . '/templates/frontend_templates/notifications_templates/user_level_changed_template.php',
root_path . '/templates/frontend_templates/.htaccess',
root_path . '/templates/frontend_templates/article_template.php',
root_path . '/templates/frontend_templates/blog_template.php',
root_path . '/templates/frontend_templates/contact_template.php',
root_path . '/templates/frontend_templates/custom_page_template.php',
root_path . '/templates/frontend_templates/frontend_system_message_template.php',
root_path . '/templates/frontend_templates/login_template.php',
root_path . '/templates/frontend_templates/maintenance_mode_template.php',
root_path . '/templates/frontend_templates/manage_profile_template.php',
root_path . '/templates/frontend_templates/notifications_template.php',
root_path . '/templates/frontend_templates/profile_template.php',
root_path . '/templates/frontend_templates/register_template.php',
root_path . '/templates/frontend_templates/serve_uploaded_file_template.php',
root_path . '/templates/frontend_templates/user_email_unverified_template.php',
root_path . '/templates/frontend_templates/user_not_activated_template.php',
root_path . '/templates/frontend_templates/verify_email_address_template.php',
//frontend_templates/

//shared_templates/
root_path . '/templates/shared_templates/.htaccess',
root_path . '/templates/shared_templates/fatal_error_message_template.php',
root_path . '/templates/shared_templates/http_error_message_template.php',
//shared_templates/

//widget_templates/
root_path . '/templates/widget_templates/profile_widget_template.php',
//widgets_templates/

//themes/
root_path . '/themes/.htaccess',
//themes/

//themes/backend_theme/
root_path . '/themes/backend_theme/backend_layout_secondary.php',
root_path . '/themes/backend_theme/backend_layout.php',
//themes/backend_theme/

//themes/default_theme/
root_path . '/themes/default_theme/layout_profile.php',
root_path . '/themes/default_theme/layout_secondary.php',
root_path . '/themes/default_theme/layout_tertiary.php',
root_path . '/themes/default_theme/layout.php',
//themes/default_theme/

//widgets/
root_path . '/widgets/get_profile_widget.php',
//widgets/


);
