<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//manage_emails.php
//MMXXVI MSCRATCH

function update_email_config(mysqli $db, array $text_functions, string $smtp_host_form, int $smtp_port_form, string $smtp_user_form, string $smtp_password_form, string $smtp_encryption_form, string $from_email_form, string $from_name_form) {

$errors = array();

if (empty($smtp_host_form)) {
$errors [] = $text_functions['message_manage_emails_no_host'];
}

if (empty($smtp_port_form)) {
$errors [] = $text_functions['message_manage_emails_no_port'];
}

if (empty($smtp_user_form)) {
$errors [] = $text_functions['message_manage_emails_no_user'];
}

if (empty($smtp_password_form)) {
$errors [] = $text_functions['message_manage_emails_no_password'];
}

if (empty($smtp_encryption_form)) {
$errors [] = $text_functions['message_manage_emails_no_encryption'];
}

if (empty($from_email_form)) {
$errors [] = $text_functions['message_manage_emails_no_from_email'];
}

if (empty($from_name_form)) {
$errors [] = $text_functions['message_manage_emails_no_from_name'];
}

if (! empty($smtp_host_form) && ! empty($smtp_port_form) && ! empty($smtp_user_form) && ! empty($smtp_password_form) && ! empty($smtp_encryption_form) && ! empty($from_email_form) && ! empty($from_name_form)) {
$email_connection = check_email_connection($db, $smtp_host_form, $smtp_port_form, $smtp_user_form, $smtp_password_form, $smtp_encryption_form);
if ($email_connection === false) {
$errors [] = $text_functions['message_manage_emails_connection_failed'];
}
}

if (empty($errors)) {
$stmt = $db->prepare("UPDATE mail_config SET smtp_host = ?, smtp_port = ?, smtp_user = ?, smtp_password = ?, smtp_encryption = ?, from_email = ?, from_name = ?  WHERE mail_config_id = 1 LIMIT 1");
$stmt->bind_param('sisssss', $smtp_host_form , $smtp_port_form, $smtp_user_form, $smtp_password_form, $smtp_encryption_form, $from_email_form, $from_name_form);
$stmt->execute();
$stmt->close();
return true;
} else {
return $errors;
}
}
