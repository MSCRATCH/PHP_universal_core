<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//lang_loader.php
//MMXXVI MSCRATCH

$lang = $settings['language'] ?? 'en';
$missing_lang_loader_files = array();
$lang_loader_files = $lang_files[$lang] ?? $lang_files['en'];
foreach ($lang_loader_files as $lang_loader_file) {
if (file_exists($lang_loader_file)) {
require_once $lang_loader_file;
} else {
$missing_lang_loader_files [] = $lang_loader_file;
}
}

if (! empty($missing_lang_loader_files)) {

foreach ($missing_lang_loader_files as $missing_lang_loader_file) {
$file_name = 'missing_lang_loader_files_'. date('Y_m_d'). '.txt';
$file_path = file_system_logs_path;
$log = 'missing_lang_loader_file_'. date('Y_m_d_H_i_s'). '_' . $missing_lang_loader_file. "\r\n";

if (is_writable($file_path)) {
file_put_contents($file_path . '/' . $file_name, $log, FILE_APPEND | LOCK_EX);
}
}

$fatal_error_message = ([
'message_title' => $text_fatal_error_message['fatal_error_message_lang_loader_title'],
'message_additional_title' => $text_fatal_error_message['fatal_error_message_lang_loader_additional_title'],
'message_text'    => $text_fatal_error_message['fatal_error_message_lang_loader_text'],
'message_missing_files'     =>  $missing_lang_loader_files,
]);
fatal_error_message($fatal_error_message, $text_fatal_error_message);
}
