<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//manage_emails.php
//MMXXVI MSCRATCH

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function get_email_config(mysqli $db) {
$stmt = $db->query("SELECT smtp_host, smtp_port, smtp_user, smtp_password, smtp_encryption, from_email, from_name FROM mail_config");
$mail_config = $stmt->fetch_assoc();
$stmt->free();
return $mail_config;
}

function send_email(mysqli $db, string $to_email, string $to_name, string $subject, string $html_body) {

$mail = new PHPMailer(true);

$email_config = get_email_config($db);

if ($email_config['smtp_encryption'] === "ssl") {
$email_config_encryption = PHPMailer::ENCRYPTION_SMTPS;
} elseif ($email_config['smtp_encryption'] === "tls") {
$email_config_encryption = PHPMailer::ENCRYPTION_STARTTLS;
} else {
$email_config_encryption = PHPMailer::ENCRYPTION_STARTTLS;
}

try {
$mail->isSMTP();
$mail->Host       = $email_config['smtp_host'];
$mail->Port       = $email_config['smtp_port'];
$mail->SMTPAuth   = true;
$mail->Username   = $email_config['smtp_user'];
$mail->Password   = $email_config['smtp_password'];
$mail->SMTPSecure = $email_config_encryption;
$mail->CharSet    = 'UTF-8';

$mail->setFrom($email_config['from_email'], $email_config['from_name']);
$mail->addAddress($to_email, $to_name);

$mail->isHTML(true);
$mail->Subject = $subject;
$mail->Body    = $html_body;
$mail->AltBody = strip_tags($html_body);

return $mail->send();

} catch (Exception $e) {
error_log("Mail Error: " . $mail->ErrorInfo);
return false;
}
}

function receive_email(mysqli $db, string $from_email, string $from_name, string $subject, string $html_body) {

$mail = new PHPMailer(true);

$email_config = get_email_config($db);

if ($email_config['smtp_encryption'] === "ssl") {
$email_config_encryption = PHPMailer::ENCRYPTION_SMTPS;
} elseif ($email_config['smtp_encryption'] === "tls") {
$email_config_encryption = PHPMailer::ENCRYPTION_STARTTLS;
} else {
$email_config_encryption = PHPMailer::ENCRYPTION_STARTTLS;
}

try {
$mail->isSMTP();
$mail->Host       = $email_config['smtp_host'];
$mail->Port       = $email_config['smtp_port'];
$mail->SMTPAuth   = true;
$mail->Username   = $email_config['smtp_user'];
$mail->Password   = $email_config['smtp_password'];
$mail->SMTPSecure = $email_config_encryption;
$mail->CharSet    = 'UTF-8';

$mail->setFrom($email_config['from_email'], $email_config['from_name']);
$mail->addAddress($email_config['from_email']);
$mail->addReplyTo($from_email, $from_name);

$mail->isHTML(true);
$mail->Subject = $subject;
$mail->Body    = $html_body;
$mail->AltBody = strip_tags($html_body);

return $mail->send();

} catch (Exception $e) {
error_log("Mail Error: " . $mail->ErrorInfo);
return false;
}
}


function check_email_connection(mysqli $db, string $smtp_host_form, int $smtp_port_form, string $smtp_user_form, string $smtp_password_form, string $smtp_encryption_form) {

$mail = new PHPMailer(true);

if ($smtp_encryption_form === "ssl") {
$smtp_encryption = PHPMailer::ENCRYPTION_SMTPS;
} elseif ($smtp_encryption_form === "tls") {
$smtp_encryption = PHPMailer::ENCRYPTION_STARTTLS;
} else {
$email_config_encryption = PHPMailer::ENCRYPTION_STARTTLS;
}

try {
$mail->isSMTP();
$mail->Host = $smtp_host_form;
$mail->Port = $smtp_port_form;
$mail->SMTPAuth = true;
$mail->Username = $smtp_user_form;
$mail->Password = $smtp_password_form;
$mail->SMTPSecure = $smtp_encryption;

$mail->Timeout = 10;

$mail->smtpConnect();
$mail->smtpClose();

return true;

} catch (Exception $e) {
return false;
}
}

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
if ($stmt->execute()) {
$stmt->close();
return true;
} else {
$stmt->close();
return false;
}
} else {
return $errors;
}
}

function receive_email_from_contact_form(mysqli $db, array $settings, array $text_functions, string $spam_trap_form, string $from_email_form, string $from_name_form, string $email_text_form, string $subject_form, string $contact_security_question_answer_form, string $html_body) {

$errors = array();


if (! empty($spam_trap_form)) {
$errors [] = $text_functions['message_manage_emails_spam_trap'];
}

if (empty($from_email_form)) {
$errors [] = $text_functions['message_manage_emails_no_contact_form_email'];
}

if (empty($from_name_form)) {
$errors [] = $text_functions['message_manage_emails_no_contact_form_name'];
}

if (empty($email_text_form)) {
$errors [] = $text_functions['message_manage_emails_no_contact_form_text'];
}

if (empty($subject_form)) {
$errors [] = $text_functions['message_manage_emails_no_contact_form_subject'];
}

if (empty($contact_security_question_answer_form)) {
$errors [] = $text_functions['message_manage_emails_no_security_question'];
}

if (! empty($from_email_form) && ! filter_var($from_email_form, FILTER_VALIDATE_EMAIL)) {
$errors [] = $text_functions['message_manage_emails_contact_form_email_address_invalid'];
}

if (! empty($contact_security_question_answer_form) && $contact_security_question_answer_form !== $settings['security_question_answer']) {
$errors [] = $text_functions['message_manage_emails_contact_form_security_question_invalid'];
}

$from_email_form = filter_var(trim($from_email_form), FILTER_VALIDATE_EMAIL);

$from_name_form = preg_replace("/[\r\n]/", "", trim($from_name_form));

$subject_form = preg_replace("/[\r\n]/", "", trim($subject_form));

if (empty($errors)) {
$result_receive_email = receive_email($db, $from_email_form, $from_name_form, $subject_form, $html_body);
if ($result_receive_email === true) {
return true;
}
} else {
return $errors;
}

}
