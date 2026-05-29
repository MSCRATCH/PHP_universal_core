<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//login.php
//MMXXVI MSCRATCH

function login(mysqli $db, array $text_functions, string $username_form, string $user_password_form) {

$errors = array();

if (is_login_blocked($db, $username_form)) {
$errors [] = $text_functions['message_login_too_many_attempts'];
return $errors;
}

if (empty($username_form)) {
$errors [] = $text_functions['message_login_no_username'];
}

if (empty($user_password_form)) {
$errors [] = $text_functions['message_login_no_password'];
}

if (empty($errors)) {
$stmt = $db->prepare("SELECT user_id, username, user_password, user_level FROM users WHERE username = ?");
$stmt->bind_param('s', $username_form);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($user_id, $username, $user_password, $user_level);
$stmt->fetch();
if ($stmt->num_rows === 1 && password_verify($user_password_form, $user_password)) {
clear_login_attempts($db, $username_form);
update_last_activity($db, $user_id);
session_regenerate_id(true);
$_SESSION['logged_in']['username'] = $username;
$_SESSION['logged_in']['user_level'] = $user_level;
$_SESSION['logged_in']['user_id'] = $user_id;
$stmt->close();
return true;
} else {
register_failed_login($db, $username_form);
$errors [] = $text_functions['message_login_failed'];
unset($_SESSION['logged_in']['username']);
unset($_SESSION['logged_in']['user_level']);
unset($_SESSION['logged_in']['user_id']);
$stmt->close();
return $errors;
}
} else {
return $errors;
}

}
