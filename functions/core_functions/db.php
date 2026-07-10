<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//db.php
//MMXXVI MSCRATCH

function connect($text_fatal_error_message) {

$real_config_path = config_path. '/config.php';

if (file_exists($real_config_path)) {
require_once config_path. '/config.php';
} else {
$fatal_error_message = ([
'message_title' => $text_fatal_error_message['fatal_error_message_no_config_title'],
'message_additional_title' => $text_fatal_error_message['fatal_error_message_no_config_additional_title'],
'message_text'    => $text_fatal_error_message['fatal_error_message_no_config_text'],
]);
fatal_error_message($fatal_error_message, $text_fatal_error_message);
}

$db = new mysqli(SERVERNAME, USERNAME, PASSWORD, DB_NAME);
$db->set_charset('utf8mb4');
return $db;
}
