<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//profile_handler.php
//MMXXVI MSCRATCH

$username_get = '';
if (isset($_GET['username'])) {
$username_get = $_GET['username'];
} else {
http_error_message(404, $settings, $activated_theme);
}

$result = check_username($db, $username_get);

if ($result === false) {
$frontend_system_message = ([
'message_text'    => $text_handlers['profile_handler_user_dont_exist'],
'message_url'     => BASE_URL. $settings['default_start_page'],
'message_button_text'  => $text_handlers['profile_handler_btn_back_to_the_homepage'],
]);
frontend_system_message($frontend_system_message, $settings, $activated_theme);
}

$profile = get_profile_by_username($db, $username_get);

if ($profile['user_level'] === "not_activated" && user_is_administrator_or_moderator() === false) {
$frontend_system_message = ([
'message_text'    => $text_handlers['profile_handler_account_not_activated'],
'message_url'     => BASE_URL . 'manage_profile',
'message_button_text'  => $text_handlers['profile_handler_btn_back_to_the_homepage'],
]);
frontend_system_message($frontend_system_message, $settings, $activated_theme);
}

$layout = $activated_theme['layout_config']['layouts']['profile_handler'] ?? 'layout';

$template_directory = $activated_theme['template_config']['templates']['template_directory'] ?? 'frontend_templates';
$template = $activated_theme['template_config']['templates']['profile_handler'] ?? 'profile_template';

$widget_template_directory = $activated_theme['template_config']['templates']['widget_template_directory'] ?? 'widget_templates';
$profile_widget_template = $activated_theme['template_config']['templates']['profile_widget'] ?? 'profile_widget_template';

render_page($db, $settings, $feature_flags, $text_functions, $text_handlers, $text_templates, $text_fatal_error_message, $activated_theme['theme_key'], $layout, [
'template_name' => $template,
'template_directory' => $template_directory,
'profile' => $profile,
],
[
'profile_widget' => get_profile_widget($profile, $text_fatal_error_message, $text_templates, $widget_template_directory, $profile_widget_template) ?? '',
]
);
