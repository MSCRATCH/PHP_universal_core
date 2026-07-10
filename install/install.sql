CREATE TABLE `users` (
`user_id` int(10) NOT NULL AUTO_INCREMENT,
`username` varchar(30) NOT NULL,
`user_password` char(255) NOT NULL,
`user_email` varchar(50) NOT NULL,
`user_level` varchar(50) DEFAULT 'not_activated',
`user_date` datetime NOT NULL,
`last_activity` datetime NOT NULL,
`email_verification_token` char(64) NOT NULL,
`email_is_verified` tinyint(1) NOT NULL DEFAULT 0,
PRIMARY KEY (`user_id`),
UNIQUE KEY `user_email_unique` (`user_email`),
UNIQUE KEY `username_unique` (`username`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `request_log` (
`request_log_id` int(10) NOT NULL AUTO_INCREMENT,
`request_log_ip_address` varchar(125) NOT NULL,
`request_log_browser` varchar(125) NOT NULL,
`request_log_requested_url` varchar(500) NOT NULL,
`request_log_timestamp` datetime NOT NULL,
`user_id` int(10) DEFAULT NULL,
PRIMARY KEY (`request_log_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `blog` (
`blog_article_id` int(10) NOT NULL AUTO_INCREMENT,
`blog_article_title` varchar(250) NOT NULL,
`blog_article_url` varchar(250) NOT NULL,
`blog_article_date` datetime NOT NULL,
`blog_article_preview` text NOT NULL,
`blog_article_content` text NOT NULL,
`blog_article_user_id` int(10) NOT NULL,
PRIMARY KEY (`blog_article_id`),
KEY `blog_post_user_id` (`blog_article_user_id`),
KEY `blog_article_id` (`blog_article_id`),
CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`blog_article_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `blog_comments` (
`blog_comment_id` int(10) NOT NULL AUTO_INCREMENT,
`blog_comment` text NOT NULL,
`blog_comment_date` datetime NOT NULL,
`blog_article_id` int(10) NOT NULL,
`user_id` int(10) NOT NULL,
`blog_comment_hidden` tinyint(1) NOT NULL DEFAULT 0,
`blog_comment_hidden_user_id` int(10) DEFAULT NULL,
`blog_comment_hidden_timestamp` datetime DEFAULT NULL,
`blog_comment_hidden_viewed` tinyint(1) NOT NULL DEFAULT 0,
PRIMARY KEY (`blog_comment_id`),
KEY `blog_article_id` (`blog_article_id`),
KEY `user_id` (`user_id`),
KEY `blog_comment_removed_user_id` (`blog_comment_hidden_user_id`),
CONSTRAINT `blog_comments_ibfk_1` FOREIGN KEY (`blog_article_id`) REFERENCES `blog` (`blog_article_id`) ON DELETE CASCADE ON UPDATE CASCADE,
CONSTRAINT `blog_comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
CONSTRAINT `blog_comments_ibfk_3` FOREIGN KEY (`blog_comment_hidden_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `comment_snapshots` (
`comment_snapshot_id` int(10) NOT NULL AUTO_INCREMENT,
`comment_text_snapshot` text NOT NULL,
`comment_created_at_snapshot` datetime NOT NULL,
`blog_article_title_snapshot` varchar(250) NOT NULL,
`blog_article_url_snapshot` varchar(250) NOT NULL,
PRIMARY KEY (`comment_snapshot_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `custom_navs` (
`custom_nav_id` int(10) NOT NULL AUTO_INCREMENT,
`custom_nav_placeholder` varchar(255) NOT NULL,
PRIMARY KEY (`custom_nav_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `custom_navs_links` (
`custom_nav_link_id` int(11) NOT NULL AUTO_INCREMENT,
`custom_nav_link_url` varchar(255) NOT NULL,
`custom_nav_link_name` varchar(255) NOT NULL,
`custom_nav_link_order` int(10) NOT NULL,
`custom_nav_id` int(10) NOT NULL,
PRIMARY KEY (`custom_nav_link_id`),
KEY `custom_nav_id` (`custom_nav_id`),
CONSTRAINT `custom_navs_links_ibfk_1` FOREIGN KEY (`custom_nav_id`) REFERENCES `custom_navs` (`custom_nav_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `custom_navs` (`custom_nav_placeholder`)
VALUES ('default');

INSERT INTO `custom_navs_links`
(`custom_nav_link_url`, `custom_nav_link_name`, `custom_nav_link_order`, `custom_nav_id`)
VALUES
('blog', 'Home', 1, LAST_INSERT_ID());

CREATE TABLE `custom_pages` (
`custom_page_id` int(10) NOT NULL AUTO_INCREMENT,
`custom_page_url` varchar(250) NOT NULL,
`custom_page_title` varchar(75) NOT NULL,
`custom_page_content` text NOT NULL,
PRIMARY KEY (`custom_page_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `custom_widgets` (
`custom_widget_id` int(10) NOT NULL AUTO_INCREMENT,
`custom_widget_content` text NOT NULL,
`custom_widget_placeholder` varchar(255) NOT NULL,
PRIMARY KEY (`custom_widget_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `error_log` (
`error_log_id` int(10) NOT NULL AUTO_INCREMENT,
`errno` int(10) NOT NULL,
`errstr` varchar(250) NOT NULL,
`errfile` varchar(250) NOT NULL,
`errline` int(10) NOT NULL,
`err_registered_at` datetime NOT NULL,
PRIMARY KEY (`error_log_id`),
UNIQUE KEY `errno` (`errno`,`errstr`,`errfile`,`errline`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `feature_flags` (
`feature_flag_id` int(10) NOT NULL AUTO_INCREMENT,
`feature_flag_title` varchar(255) NOT NULL,
`feature_flag_key` varchar(255) NOT NULL,
`feature_flag_value` tinyint(1) NOT NULL DEFAULT 1,
PRIMARY KEY (`feature_flag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `feature_flags` (`feature_flag_id`, `feature_flag_title`, `feature_flag_key`, `feature_flag_value`) VALUES
(1, 'Registration', 'registration_enabled', 1),
(2, 'Maintenance mode', 'maintenance_mode_enabled', 0),
(3, 'Contact form', 'contact_form_enabled', 1),
(4, 'User profile system', 'user_profile_system_enabled', 1),
(7, 'Rate limiter', 'rate_limiter_enabled', 1),
(8, 'Cookie consent tool', 'cct_enabled', 1),
(9, 'Log requests', 'log_requests_enabled', 1),
(10, 'Notifications', 'notifications_enabled', 1),
(11, 'Comments', 'user_comments_enabled', 1),
(13, 'Email verification', 'email_verification_enabled', 1),
(14, 'New users locked by default', 'new_users_locked_enabled', 1);

CREATE TABLE `files` (
`file_id` int(10) NOT NULL AUTO_INCREMENT,
`file_name` varchar(250) NOT NULL,
`file_title` varchar(250) NOT NULL,
`file_description` text NOT NULL,
`file_user_id` int(10) NOT NULL,
PRIMARY KEY (`file_id`),
KEY `file_user_id` (`file_user_id`),
CONSTRAINT `files_ibfk_1` FOREIGN KEY (`file_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `login_attempts` (
`login_attempts_id` int(10) NOT NULL AUTO_INCREMENT,
`username` varchar(30) NOT NULL,
`ip_address` varchar(125) NOT NULL,
`attempts` int(10) NOT NULL DEFAULT 0,
`last_attempt` datetime NOT NULL,
PRIMARY KEY (`login_attempts_id`),
UNIQUE KEY `unique_user_ip` (`username`,`ip_address`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `settings` (
`setting_id` int(10) NOT NULL AUTO_INCREMENT,
`setting_title` varchar(255) NOT NULL,
`setting_key` varchar(255) NOT NULL,
`setting_value` varchar(255) NOT NULL,
PRIMARY KEY (`setting_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `user_level_snapshots` (
`user_level_snapshot_id` int(10) NOT NULL AUTO_INCREMENT,
`user_level_snapshot` varchar(50) NOT NULL,
`user_id_snapshot` int(10) NOT NULL,
PRIMARY KEY (`user_level_snapshot_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `notifications` (
`notification_id` int(10) NOT NULL AUTO_INCREMENT,
`notification_type` varchar(250) NOT NULL,
`actor_user_id` int(10) NOT NULL,
`target_user_id` int(10) NOT NULL,
`notification_created_at` datetime NOT NULL,
`notification_viewed` tinyint(1) NOT NULL DEFAULT 0,
`comment_snapshot_id` int(10) DEFAULT NULL,
`user_level_snapshot_id` int(10) DEFAULT NULL,
PRIMARY KEY (`notification_id`),
KEY `actor_user_id` (`actor_user_id`),
KEY `target_user_id` (`target_user_id`),
KEY `comment_snapshot_id` (`comment_snapshot_id`),
KEY `user_level_snapshot_id` (`user_level_snapshot_id`),
CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`actor_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
CONSTRAINT `notifications_ibfk_2` FOREIGN KEY (`target_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
CONSTRAINT `notifications_ibfk_3` FOREIGN KEY (`comment_snapshot_id`) REFERENCES `comment_snapshots` (`comment_snapshot_id`) ON DELETE CASCADE ON UPDATE CASCADE,
CONSTRAINT `notifications_ibfk_4` FOREIGN KEY (`user_level_snapshot_id`) REFERENCES `user_level_snapshots` (`user_level_snapshot_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `rate_limiter` (
`rate_limit_id` int(10) NOT NULL AUTO_INCREMENT,
`rate_limit_ip` varchar(255) NOT NULL,
`rate_limit_uri` varchar(255) NOT NULL,
`rate_limit_created_at` datetime NOT NULL,
PRIMARY KEY (`rate_limit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `user_profiles` (
`user_profile_id` int(10) NOT NULL AUTO_INCREMENT,
`user_profile_image` varchar(500) NOT NULL DEFAULT 'default_profile_picture.jpg',
`user_profile_location` varchar(100) NOT NULL,
`user_profile_description` text NOT NULL,
`user_id` int(10) NOT NULL,
PRIMARY KEY (`user_profile_id`),
KEY `user_id` (`user_id`),
CONSTRAINT `user_profiles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `mail_config` (
`mail_config_id` int(10) NOT NULL AUTO_INCREMENT,
`smtp_host` varchar(255) NOT NULL,
`smtp_port` int(10) NOT NULL,
`smtp_user` varchar(255) NOT NULL,
`smtp_password` varchar(255) NOT NULL,
`smtp_encryption` varchar(10) NOT NULL,
`from_email` varchar(255) NOT NULL,
`from_name` varchar(255) NOT NULL,
PRIMARY KEY (`mail_config_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `themes` (
`theme_id` int(10) NOT NULL AUTO_INCREMENT,
`theme_key` varchar(255) NOT NULL,
`theme_name` varchar(255) NOT NULL,
`theme_author` varchar(255) NOT NULL,
`theme_version` varchar(10) NOT NULL,
`theme_stylesheet` varchar(255) NOT NULL,
`active_theme` tinyint(1) NOT NULL DEFAULT 0,
PRIMARY KEY (`theme_id`),
UNIQUE KEY `theme_key_unique` (`theme_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
