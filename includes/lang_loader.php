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
$fatal_error_message = ([
'message_title' => $text_fatal_error_message['fatal_error_message_lang_loader_title'],
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => $text_fatal_error_message['fatal_error_message_lang_loader'],
'view_missing_files'     =>  'yes',
'missing_files'     =>  $missing_lang_loader_files,
]);
fatal_error_message($fatal_error_message, $text_fatal_error_message);
}
