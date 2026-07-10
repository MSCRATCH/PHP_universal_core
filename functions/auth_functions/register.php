<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//register.php
//MMXXVI MSCRATCH

function register(mysqli $db, array $text_templates, array $text_functions, string $username_form, string $user_password_form, string $user_password_confirm_form, string $user_email_form, string $security_question_answer_form, array $settings, array $feature_flags) {

$db->autocommit(false);

$errors = array();

if (empty($username_form)) {
$errors [] = $text_functions['message_register_no_username'];
}

if (empty($user_password_form)) {
$errors [] = $text_functions['message_register_no_password'];
}

if (empty($user_password_confirm_form)) {
$errors [] = $text_functions['message_register_no_password_confirmation'];
}

if (empty($user_email_form)) {
$errors [] = $text_functions['message_register_no_email_address'];
}

if (empty($security_question_answer_form)) {
$errors [] = $text_functions['message_register_no_security_question'];
}


if (! empty($username_form) && strlen($username_form) > 30) {
$errors [] = $text_functions['message_register_username_length'];
}

if (! empty($username_form) && strlen($username_form) < 5) {
$errors [] = $text_functions['message_register_username_short'];
}

if (! empty($username_form) && ! ctype_alnum($username_form)) {
$errors [] = $text_functions['message_register_username_special_characters'];
}

if (! empty($user_password_form) && strlen($user_password_form) > 30) {
$errors [] = $text_functions['message_register_password_length'];
}

if (! empty($user_password_form) && strlen($user_password_form) < 8) {
$errors [] = $text_functions['message_register_password_short'];
}

if ($user_password_form !== $user_password_confirm_form) {
$errors [] = $text_functions['message_register_password_no_match'];
}

if (! empty($user_email_form) && ! filter_var($user_email_form, FILTER_VALIDATE_EMAIL)) {
$errors [] = $text_functions['message_register_email_address_invalid'];
}

if (! empty($security_question_answer_form) && $security_question_answer_form !== $settings['security_question_answer']) {
$errors [] = $text_functions['message_register_security_question_invalid'];
}

$options = ['cost' => 12];
$hashed_user_password = password_hash($user_password_form, PASSWORD_BCRYPT, $options);

$username_unique = $db->prepare("SELECT username FROM users WHERE username = ?");
$username_unique->bind_param('s', $username_form);
$username_unique->execute();
$username_unique->store_result();
if ($username_unique->num_rows > 0) {
$errors [] = $text_functions['message_register_username_already_taken'];
}
$username_unique->close();

$user_email_unique = $db->prepare("SELECT user_email FROM users WHERE user_email = ?");
$user_email_unique->bind_param('s', $user_email_form);
$user_email_unique->execute();
$user_email_unique->store_result();
if ($user_email_unique->num_rows > 0) {
$errors [] = $text_functions['message_register_email_address_already_taken'];
}
$user_email_unique->close();

if (empty($errors)) {
$email_verification_token = bin2hex(random_bytes(32));
if ($feature_flags['email_verification_enabled'] === 1) {
$save_user = $db->prepare("INSERT INTO users(username, user_password, user_email, email_verification_token, user_date) VALUES(?, ?, ?, ?, NOW())");
$save_user->bind_param('ssss', $username_form, $hashed_user_password, $user_email_form, $email_verification_token);
} else {
$email_is_verified = 1;
$save_user = $db->prepare("INSERT INTO users(username, user_password, user_email, email_verification_token, email_is_verified, user_date) VALUES(?, ?, ?, ?, ?, NOW())");
$save_user->bind_param('ssssi', $username_form, $hashed_user_password, $user_email_form, $email_verification_token, $email_is_verified);
}
$save_user->execute();
$new_user_id = $save_user->insert_id;
$save_user->close();
$save_profile = $db->prepare("INSERT INTO user_profiles(user_id) VALUES(?)");
$save_profile->bind_param('i', $new_user_id);
$save_profile->execute();
$save_profile->close();

if ($feature_flags['email_verification_enabled'] === 1) {
$verify_email_link = "{$settings['website_domain']}/verify_email_address/{$new_user_id}/{$email_verification_token}";
$subject = $settings['page_title'];
ob_start();
require templates_path . '/email_templates/email_verification_template.php';
$html_body = ob_get_clean();

$registration_email_sent = send_email($db, $user_email_form, $username_form, $subject, $html_body);

if (! $registration_email_sent) {
$errors [] = $text_functions['message_register_critical_error'];
return $errors;
}
}
}

if (empty($errors)) {
$db->commit();
$db->autocommit(true);
return true;
} else {
$db->rollback();
$db->autocommit(true);
return $errors;
}
}
