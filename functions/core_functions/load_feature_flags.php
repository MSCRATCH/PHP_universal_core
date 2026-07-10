<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//load_feature_flags.php
//MMXXVI MSCRATCH

function load_feature_flags(mysqli $db, array $text_fatal_error_message) {
$stmt = $db->query("SELECT feature_flag_key, feature_flag_value FROM feature_flags");
$result = $stmt->fetch_all(MYSQLI_ASSOC);
$stmt->free();
if (! empty($result)) {
foreach ($result as $row) {
//cast feature_flag_value, since the database returns the value as a string
$feature_flags[$row['feature_flag_key']] = (INT) $row['feature_flag_value'];
}
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
