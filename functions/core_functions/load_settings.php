<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//load_settings.php
//MMXXVI MSCRATCH

function load_settings(mysqli $db, array $text_fatal_error_message) {
$stmt = $db->query("SELECT setting_key, setting_value FROM settings");
$result = $stmt->fetch_all(MYSQLI_ASSOC);
$stmt->free();
if ($result !== false && ! empty($result)) {
foreach ($result as $row) {
$settings[$row['setting_key']] = $row['setting_value'];
}
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
