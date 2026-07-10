<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//manage_settings.php
//MMXXVI MSCRATCH

function get_settings_from_db(mysqli $db, array $text_fatal_error_message) {
$stmt = $db->query("SELECT setting_id, setting_title, setting_key, setting_value FROM settings");
$settings = $stmt->fetch_all(MYSQLI_ASSOC);
$stmt->free();
if (! empty($settings)) {
return $settings;
} else {
$fatal_error_message = ([
'message_title' => $text_fatal_error_message['fatal_error_message_load_settings_title'],
'message_additional_title' => $text_fatal_error_message['fatal_error_message_load_settings_additional_title'],
'message_text'    => $text_fatal_error_message['fatal_error_message_load_settings_text'],
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
'footer_text',
'page_description',
'page_keywords',
'language',
'website_domain',
'default_start_page',
);

if (empty($settings_form)) {
$errors [] = $text_functions['message_settings_no_settings'];
}

foreach ($settings_form as $setting_key_form => $setting_value_form) {

if (! in_array($setting_key_form, $allowed_keys, true)) {
$errors [] = $text_functions['message_settings_invalid_key'];
}

if (empty($setting_value_form)) {
$errors [] = $text_functions['message_settings_no_setting'];
}

if (empty($setting_key_form)) {
$errors [] = $text_functions['message_settings_no_key'];
}

if ($setting_key_form === "language") {
if ($setting_value_form !== "en" && $setting_value_form !== "de") {
$errors [] = $text_functions['message_settings_invalid_language_value'];
}
}

if (! empty($errors)) {
return $errors;
}

}

$stmt = $db->prepare("UPDATE settings SET setting_value = ? WHERE setting_key = ? LIMIT 1");

foreach ($settings_form as $setting_key_form => $setting_value_form) {
$setting_value_form = trim($setting_value_form);
$setting_key_form = trim($setting_key_form);
if ($setting_key_form === "default_start_page") {
$setting_value_form = make_safe_url($setting_value_form);
}
$stmt->bind_param('ss', $setting_value_form, $setting_key_form);
$stmt->execute();
}

$stmt->close();
return true;
}
