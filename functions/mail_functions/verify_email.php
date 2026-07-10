<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//verify_email.php
//MMXXVI MSCRATCH

function get_email_verification_data(mysqli $db, int $user_id_resend_verification_email_handler) {
$stmt = $db->prepare("SELECT user_id, username, user_email, email_verification_token FROM users WHERE user_id = ?");
$stmt->bind_param('i', $user_id_resend_verification_email_handler);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$stmt->close();
return $row;
}

function create_new_email_token(mysqli $db, int $user_id_resend_verification_email_handler) {
$email_verification_token = bin2hex(random_bytes(32));
$stmt = $db->prepare("UPDATE users SET email_verification_token = ? WHERE user_id = ? LIMIT 1");
$stmt->bind_param('si', $email_verification_token, $user_id_resend_verification_email_handler);
$stmt->execute();
$stmt->close();
}

function verify_email_address(mysqli $db, array $text_functions, int $user_id_get, string $email_verification_token_get) {
$stmt = $db->prepare("SELECT user_id, email_verification_token, email_is_verified FROM users WHERE user_id = ?");
$stmt->bind_param('i', $user_id_get);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($user_id, $email_verification_token, $email_is_verified);
$stmt->fetch();
$stmt->close();

$errors = array();

if ($user_id !== $user_id_get) {
$errors [] = $text_functions['message_verify_email_unauthorized_access'];
return $errors;
}

if ($email_verification_token !== $email_verification_token_get) {
$errors [] = $text_functions['message_verify_email_invalid_token'];
return $errors;
}

if ($email_is_verified === 1) {
$errors [] = $text_functions['message_verify_email_already_verified'];
return $errors;
}

$email_is_verified_true = 1;

if (empty($errors)) {
$stmt= $db->prepare("UPDATE users SET email_is_verified = ? WHERE user_id = ? LIMIT 1");
$stmt->bind_param('ii', $email_is_verified_true, $user_id_get);
$stmt->execute();
$stmt->close();
return true;
} else {
return $errors;
}
}

function users_email_is_not_verified(mysqli $db, int $user_id_users_email_not_verified) {
$stmt = $db->prepare("SELECT email_is_verified FROM users WHERE user_id = ?");
$stmt->bind_param('i', $user_id_users_email_not_verified);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($email_is_verified);
$stmt->fetch();
$stmt->close();
return $email_is_verified !== 1;
}
