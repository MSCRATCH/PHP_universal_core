<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//manage_feature_flags.php
//MMXXVI MSCRATCH

function get_feature_flags_from_db(mysqli $db, array $text_fatal_error_message) {
$stmt = $db->query("SELECT feature_flag_id, feature_flag_title, feature_flag_key, feature_flag_value FROM feature_flags");
$feature_flags = $stmt->fetch_all(MYSQLI_ASSOC);
$stmt->free();
if (! empty($feature_flags)) {
return $feature_flags;
} else {
$fatal_error_message = ([
'message_title' => $text_fatal_error_message['fatal_error_message_load_feature_flags_title'],
'message_additional_title' => $text_fatal_error_message['fatal_error_message_load_feature_flags_additional_title'],
'message_text'    => $text_fatal_error_message['fatal_error_message_load_feature_flags_text'],
]);
fatal_error_message($fatal_error_message, $text_fatal_error_message);
}
}


function update_feature_flag(mysqli $db, array $text_functions, string $feature_flag_key_form, int $feature_flag_value_form) {

$errors = array();

$allowed_feature_flags_keys = array(
'registration_enabled',
'maintenance_mode_enabled',
'contact_form_enabled',
'user_profile_system_enabled',
'rate_limiter_enabled',
'cct_enabled',
'log_requests_enabled',
'notifications_enabled',
'user_comments_enabled',
'email_verification_enabled',
'new_users_locked_enabled',
);

if (empty($feature_flag_key_form)) {
$errors [] = $text_functions['message_feature_flags_no_key'];
}

if ($feature_flag_value_form === '') {
$errors [] = $text_functions['message_feature_flags_no_value'];
}

if (! in_array($feature_flag_key_form, $allowed_feature_flags_keys, true)) {
$errors [] = $text_functions['message_feature_flags_invalid_key'];
}

if (! in_array($feature_flag_value_form, [0, 1], true)) {
$errors[] = $text_functions['message_feature_flags_invalid_value'];
}

if ($feature_flag_key_form === "new_users_locked_enabled" && $feature_flag_value_form === 1) {
$db->query("ALTER TABLE users
MODIFY COLUMN user_level VARCHAR(50) DEFAULT 'not_activated'");
} elseif ($feature_flag_key_form === "new_users_locked_enabled" && $feature_flag_value_form === 0) {
$db->query("ALTER TABLE users
MODIFY COLUMN user_level VARCHAR(50) DEFAULT 'user'");
}

if (! empty($errors)) {
return $errors;
}

$stmt = $db->prepare("UPDATE feature_flags SET feature_flag_value = ? WHERE feature_flag_key = ? LIMIT 1");
$stmt->bind_param('is', $feature_flag_value_form, $feature_flag_key_form);
$stmt->execute();
$stmt->close();
return true;

}
