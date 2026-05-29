<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//manage_settings.php
//MMXXVI MSCRATCH

function get_settings_from_db(mysqli $db, array $text_fatal_error_message) {
$stmt = $db->query("SELECT setting_id, setting_title, setting_key, setting_value FROM settings");
$settings = $stmt->fetch_all(MYSQLI_ASSOC);
$stmt->free();
if ($settings !== false && ! empty($settings)) {
return $settings;
} else {
$fatal_error_message = ([
'message_title' => $text_fatal_error_message['fatal_error_message_load_settings_title'],
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => $text_fatal_error_message['fatal_error_message_load_settings'],
'view_missing_files'     =>  'no',
]);
fatal_error_message($fatal_error_message, $text_fatal_error_message);
}
}


function update_setting(mysqli $db, array $text_functions, array $settings_form) {

$errors = array();

$allowed_keys = array(
'page_title',
'security_question',
'security_question_answer',
'system_message_title',
'disable_registration',
'footer_text',
'page_description',
'page_keywords',
'language',
'maintenance_mode_enabled',
'disable_contact_form',
'website_domain',
);

foreach ($settings_form as $setting_key_form => $setting_value_form) {

if (! in_array($setting_key_form, $allowed_keys)) {
$errors [] = $text_functions['message_settings_invalid_key'];
}

if (empty($settings_form)) {
$errors [] = $text_functions['message_settings_no_settings'];
}

if (empty($setting_value_form)) {
$errors [] = $text_functions['message_settings_no_setting'];
}

if (empty($setting_key_form)) {
$errors [] = $text_functions['message_settings_no_key'];
}

if ($setting_key_form === "disable_registration") {
if ($setting_value_form !== "yes" && $setting_value_form !== "no") {
$errors [] = $text_functions['message_settings_invalid_register_value'];
}
}

if ($setting_key_form === "language") {
if ($setting_value_form !== "en" && $setting_value_form !== "de") {
$errors [] = $text_functions['message_settings_invalid_language_value'];
}
}

if ($setting_key_form === "maintenance_mode_enabled") {
if ($setting_value_form !== "yes" && $setting_value_form !== "no") {
$errors [] = $text_functions['message_settings_invalid_maintenance_mode_enabled_value'];
}
}

if ($setting_key_form === "disable_contact_form") {
if ($setting_value_form !== "yes" && $setting_value_form !== "no") {
$errors [] = $text_functions['message_settings_invalid_disable_contact_form_value'];
}
}

}

if (empty($errors)) {
foreach ($settings_form as $setting_key_form => $setting_value_form) {
$setting_value_form_trimmed = trim($setting_value_form);
$setting_key_form_trimmed = trim($setting_key_form);
$stmt = $db->prepare("UPDATE settings SET setting_value = ? WHERE setting_key = ? LIMIT 1");
$stmt->bind_param('ss', $setting_value_form_trimmed, $setting_key_form_trimmed);
$stmt->execute();
if ($stmt->errno) {
$errors [] = $text_functions['message_settings_stmt_failed'];
}
}
if (empty($errors)) {
return true;
} else {
return $errors;
}
} else {
return $errors;
}
}
