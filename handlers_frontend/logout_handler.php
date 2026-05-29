<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//logout_handler.php
//MMXXVI MSCRATCH

//Access only by logged in users.
if (user_is_logged_in() === false) {
header('Location:'. BASE_URL. 'blog');
exit();
}
//Access only by logged in users.

if (is_user() === true) {
logout();
$frontend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => $text_handlers['logout_handler_successful_logout'],
'message_url'     => BASE_URL . 'blog',
'message_button_text'  => $text_handlers['logout_handler_btn_return'],
]);
frontend_system_message($frontend_system_message, $settings, $activated_theme);
} elseif (user_is_not_activated() === true) {
logout();
$frontend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => $text_handlers['logout_handler_successful_logout'],
'message_url'     => BASE_URL . 'blog',
'message_button_text'  => $text_handlers['logout_handler_btn_return'],
]);
frontend_system_message($frontend_system_message, $settings, $activated_theme);
} elseif (user_is_administrator_or_moderator() === true && backend_access_is_verified() === false) {
logout();
$frontend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => $text_handlers['logout_handler_successful_logout'],
'message_url'     => BASE_URL . 'blog',
'message_button_text'  => $text_handlers['logout_handler_btn_return'],
]);
frontend_system_message($frontend_system_message, $settings, $activated_theme);
} elseif (user_is_administrator_or_moderator() === true && backend_access_is_verified() === true) {
backend_logout();
$backend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => $text_handlers['logout_handler_successful_backend_logout'],
'message_url'     => BASE_URL . 'blog',
'message_button_text'  => $text_handlers['logout_handler_btn_return'],
]);
backend_system_message($backend_system_message, $settings);
}
