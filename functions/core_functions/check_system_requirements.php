<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//check_system_requirements.php
//MMXXVI MSCRATCH

function check_php_version() {
if (version_compare(PHP_VERSION, '8.0.0', '>=')) {
return true;
} else {
return false;
}
}

function check_mysqli() {
if (extension_loaded('mysqli')) {
return true;
} else {
return false;
}
}

function check_fileinfo() {
if (extension_loaded('fileinfo')) {
return true;
} else {
return false;
}
}

function check_system_requirements($text_fatal_error_message) {

$result_php_version = check_php_version();
$result_mysqli = check_mysqli();
$result_fileinfo = check_fileinfo();

if ($result_php_version === false) {
$fatal_error_message = ([
'message_title' => $text_fatal_error_message['fatal_error_message_system_requirement_php_title'],
'message_additional_title' => $text_fatal_error_message['fatal_error_message_system_requirement_php_additional_title'],
'message_text'    => $text_fatal_error_message['fatal_error_message_system_requirement_php_text'],
]);
fatal_error_message($fatal_error_message, $text_fatal_error_message);
}

if ($result_mysqli === false) {
$fatal_error_message = ([
'message_title' => $text_fatal_error_message['fatal_error_message_system_requirement_mysqli_title'],
'message_additional_title' => $text_fatal_error_message['fatal_error_message_system_requirement_mysqli_additional_title'],
'message_text'    => $text_fatal_error_message['fatal_error_message_system_requirement_mysqli_text'],
]);
fatal_error_message($fatal_error_message, $text_fatal_error_message);
}

if ($result_fileinfo === false) {
$fatal_error_message = ([
'message_title' => $text_fatal_error_message['fatal_error_message_system_requirement_fileinfo_title'],
'message_additional_title' => $text_fatal_error_message['fatal_error_message_system_requirement_fileinfo_additional_title'],
'message_text'    => $text_fatal_error_message['fatal_error_message_system_requirement_fileinfo_text'],
]);
fatal_error_message($fatal_error_message, $text_fatal_error_message);
}
}
