<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//resend_verification_email_handler.php
//MMXXVI MSCRATCH

if (user_is_logged_in() !== false) {
$user_id_resend_verification_email_handler = get_user_id();
}

if (isset($_POST['csrf_token'])) {
if (isset($_POST['resend_verification_email'])) {
if (validate_token('resend_verification_email', $_POST['csrf_token'])) {

create_new_email_token($db, $user_id_resend_verification_email_handler);
$email_verification_data = get_email_verification_data($db, $user_id_resend_verification_email_handler);

$verify_email_link = "{$settings['website_domain']}/verify_email_address/{$email_verification_data['user_id']}/{$email_verification_data['email_verification_token']}";
$subject = $settings['page_title'];
ob_start();
require templates_path . '/email_templates/email_verification_template.php';
$html_body = ob_get_clean();

$registration_email_sent = send_email($db, $email_verification_data['user_email'], $email_verification_data['username'], $subject, $html_body);

if ($registration_email_sent === true) {
$frontend_system_message = ([
'message_text'    => $text_handlers['resend_verification_email_handler_successful_sent'],
'message_url'     => BASE_URL. $settings['default_start_page'],
'message_button_text'  => $text_handlers['resend_verification_email_handler_btn_return'],
]);
frontend_system_message($frontend_system_message, $settings, $activated_theme);
} else {
$frontend_system_message = ([
'message_text'    => $text_handlers['resend_verification_email_handler_sending_failed'],
'message_url'     => BASE_URL. $settings['default_start_page'],
'message_button_text'  => $text_handlers['resend_verification_email_handler_btn_return'],
]);
frontend_system_message($frontend_system_message, $settings, $activated_theme);
}
} else {
$frontend_system_message = ([
'message_text'    => $text_handlers['csrf_text'],
'message_url'     => BASE_URL. $settings['default_start_page'],
'message_button_text'  => $text_handlers['csrf_btn'],
]);
frontend_system_message($frontend_system_message, $settings, $activated_theme);
}
}
}
