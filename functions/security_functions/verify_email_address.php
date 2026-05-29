<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//verify_email_address.php
//MMXXVI MSCRATCH

function verify_email_address(mysqli $db, array $text_functions, int $user_id_get, string $email_verification_token_get) {

$stmt = $db->prepare("SELECT user_id, email_verification_token, email_is_verified FROM users WHERE user_id = ?");
$stmt->bind_param('i', $user_id_get);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($user_id, $email_verification_token, $email_is_verified);
$stmt->fetch();
$stmt->close();

if ($user_id !== $user_id_get) {
return false;
}

if ($email_verification_token !== $email_verification_token_get) {
return false;
}

if ($email_is_verified === 1) {
return false;
}

$email_is_verified_true = 1;

$stmt= $db->prepare("UPDATE users SET email_is_verified = ? WHERE user_id = ? LIMIT 1");
$stmt->bind_param('ii', $email_is_verified_true, $user_id_get);
if ($stmt->execute()) {
$stmt->close();
return true;
} else {
$stmt->close();
return false;
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
