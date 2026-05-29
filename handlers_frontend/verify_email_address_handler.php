<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//verify_email_address_handler.php
//MMXXVI MSCRATCH

$user_id_get = '';
if (isset($_GET['user_id'])) {
$user_id_get = (INT) $_GET['user_id'];
} else {
http_error_message(404);
}

$email_verification_token_get = '';
if (isset($_GET['email_verification_token'])) {
$email_verification_token_get = trim($_GET['email_verification_token']);
} else {
http_error_message(404);
}

$result_verify_email_address = verify_email_address($db, $text_functions, $user_id_get, $email_verification_token_get);

if ($result_verify_email_address === true) {
$frontend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => $text_handlers['verify_email_address_handler_successful_verified'],
'message_url'     => BASE_URL . 'blog',
'message_button_text'  => $text_handlers['verify_email_address_handler_btn_return'],
]);
frontend_system_message($frontend_system_message, $settings, $activated_theme);
} else {
$frontend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => $text_handlers['verify_email_address_handler_verification_failed'],
'message_url'     => BASE_URL . 'blog',
'message_button_text'  => $text_handlers['verify_email_address_handler_btn_return'],
]);
frontend_system_message($frontend_system_message, $settings, $activated_theme);
}
