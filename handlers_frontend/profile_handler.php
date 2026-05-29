<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//profile_handler.php
//MMXXVI MSCRATCH

$username_get = '';
if (isset($_GET['username'])) {
$username_get = $_GET['username'];
} else {
http_error_message(404, $activated_theme);
}

$result = check_username($db, $username_get);

if ($result === false) {
$frontend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => $text_handlers['profile_handler_user_dont_exist'],
'message_url'     => BASE_URL . 'blog',
'message_button_text'  => $text_handlers['profile_handler_btn_back_to_the_homepage'],
]);
frontend_system_message($frontend_system_message, $settings, $activated_theme);
}

$profile = get_profile_by_username($db, $username_get);

if ($profile['user_level'] === "not_activated" && user_is_administrator_or_moderator() === false) {
$frontend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => $text_handlers['profile_handler_account_not_activated'],
'message_url'     => BASE_URL . 'manage_profile',
'message_button_text'  => $text_handlers['profile_handler_btn_back_to_the_homepage'],
]);
frontend_system_message($frontend_system_message, $settings, $activated_theme);
}

render_page($db, $settings, $text_functions, $text_handlers, $text_templates, $text_fatal_error_message, 'frontend_templates', $activated_theme['theme_key'], 'layout_profile', [
'template_name' => 'profile_template',
'profile' => $profile,
],
[
'profile_widget' => get_profile_widget($profile, $text_templates) ?? '',
]
);
