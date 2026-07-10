<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//verify_email_address_handler.php
//MMXXVI MSCRATCH

$user_id_get = '';
if (isset($_GET['user_id'])) {
$user_id_get = (INT) $_GET['user_id'];
} else {
http_error_message(404, $settings, $activated_theme);
}

$email_verification_token_get = '';
if (isset($_GET['email_verification_token'])) {
$email_verification_token_get = trim($_GET['email_verification_token']);
} else {
http_error_message(404, $settings);
}

$result_verify_email_address = verify_email_address($db, $text_functions, $user_id_get, $email_verification_token_get);

if ($result_verify_email_address === true) {
$frontend_system_message = ([
'message_text'    => $text_handlers['verify_email_address_handler_successful_verified'],
'message_url'     => BASE_URL. $settings['default_start_page'],
'message_button_text'  => $text_handlers['verify_email_address_handler_btn_return'],
]);
frontend_system_message($frontend_system_message, $settings, $activated_theme);
} else {
$errors = $result_verify_email_address;

$layout = $activated_theme['layout_config']['layouts']['verify_email_address_handler'] ?? 'layout';

$template_directory = $activated_theme['template_config']['templates']['template_directory'] ?? 'frontend_templates';
$template = $activated_theme['template_config']['templates']['verify_email_address_handler'] ?? 'verify_email_address_template';


render_page($db, $settings, $feature_flags, $text_functions, $text_handlers, $text_templates, $text_fatal_error_message, $activated_theme['theme_key'], $layout, [
'template_name' => $template,
'template_directory' => $template_directory,
'errors'  => $errors ?? [],
]);
}
