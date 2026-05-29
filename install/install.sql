CREATE TABLE `users` (
`user_id` int(10) NOT NULL AUTO_INCREMENT,
`username` varchar(30) NOT NULL,
`user_password` char(255) NOT NULL,
`user_email` varchar(50) NOT NULL,
`user_level` varchar(50) NOT NULL DEFAULT 'not_activated',
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

CREATE TABLE `blocklist` (
`blocklist_id` int(10) NOT NULL AUTO_INCREMENT,
`blocklist_value` varchar(100) NOT NULL,
PRIMARY KEY (`blocklist_id`),
UNIQUE KEY `blocklist_value` (`blocklist_value`)
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

CREATE TABLE `custom_pages` (
`custom_page_id` int(10) NOT NULL AUTO_INCREMENT,
`custom_page_url` varchar(250) NOT NULL,
`custom_page_title` varchar(75) NOT NULL,
`custom_page_content` text NOT NULL,
PRIMARY KEY (`custom_page_id`)
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

CREATE TABLE `primary_nav` (
`primary_nav_id` int(10) NOT NULL AUTO_INCREMENT,
`primary_nav_url` varchar(250) NOT NULL,
`primary_nav_name` varchar(250) NOT NULL,
`primary_nav_order` int(10) NOT NULL,
PRIMARY KEY (`primary_nav_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `secondary_nav` (
`secondary_nav_id` int(10) NOT NULL AUTO_INCREMENT,
`secondary_nav_url` varchar(250) NOT NULL,
`secondary_nav_name` varchar(250) NOT NULL,
`secondary_nav_order` int(10) NOT NULL,
PRIMARY KEY (`secondary_nav_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `settings` (
`setting_id` int(10) NOT NULL AUTO_INCREMENT,
`setting_title` varchar(255) NOT NULL,
`setting_key` varchar(255) NOT NULL,
`setting_value` varchar(255) NOT NULL,
PRIMARY KEY (`setting_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `user_activity_log` (
`user_activity_log_id` int(10) NOT NULL AUTO_INCREMENT,
`user_activity` varchar(250) NOT NULL,
`user_activity_timestamp` datetime NOT NULL,
`comment_text_snapshot` text DEFAULT NULL,
`comment_date_snapshot` datetime DEFAULT NULL,
`blog_article_title_snapshot` varchar(250) DEFAULT NULL,
`blog_article_url_snapshot` varchar(250) DEFAULT NULL,
`user_level_snapshot` varchar(50) DEFAULT NULL,
`blog_comment_id` int(10) DEFAULT NULL,
`blog_article_id` int(10) DEFAULT NULL,
`actor_user_id` int(10) NOT NULL,
`target_user_id` int(10) NOT NULL,
`user_activity_log_viewed` tinyint(1) NOT NULL DEFAULT 0,
PRIMARY KEY (`user_activity_log_id`),
KEY `user_id` (`actor_user_id`),
KEY `blog_comment_id` (`blog_comment_id`),
KEY `blog_article_id` (`blog_article_id`),
KEY `target_user_id` (`target_user_id`),
CONSTRAINT `user_activity_log_ibfk_1` FOREIGN KEY (`actor_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
CONSTRAINT `user_activity_log_ibfk_2` FOREIGN KEY (`blog_comment_id`) REFERENCES `blog_comments` (`blog_comment_id`) ON DELETE SET NULL ON UPDATE CASCADE,
CONSTRAINT `user_activity_log_ibfk_3` FOREIGN KEY (`blog_article_id`) REFERENCES `blog` (`blog_article_id`) ON DELETE CASCADE ON UPDATE CASCADE,
CONSTRAINT `user_activity_log_ibfk_4` FOREIGN KEY (`target_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
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
