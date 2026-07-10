<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//load_settings.php
//MMXXVI MSCRATCH

function check_settings(string $setting_key, string $setting_value) {

$allowed_setting_keys = [
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
];

if (! in_array($setting_key, $allowed_setting_keys, true)) {
return false;
}

if (empty($setting_value)) {
return false;
}

}


function load_settings(mysqli $db, array $text_fatal_error_message) {
$stmt = $db->query("SELECT setting_key, setting_value FROM settings");
$result = $stmt->fetch_all(MYSQLI_ASSOC);
$stmt->free();
if (! empty($result)) {
foreach ($result as $row) {
$result_check_settings = check_settings($row['setting_key'], $row['setting_value']);
if ($result_check_settings === false) {
$fatal_error_message = ([
'message_title' => $text_fatal_error_message['fatal_error_message_load_settings_title'],
'message_additional_title' => $text_fatal_error_message['fatal_error_message_load_settings_additional_title'],
'message_text'    => $text_fatal_error_message['fatal_error_message_load_settings_text'],
]);
fatal_error_message($fatal_error_message, $text_fatal_error_message);
}
$settings[$row['setting_key']] = $row['setting_value'];
}
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
