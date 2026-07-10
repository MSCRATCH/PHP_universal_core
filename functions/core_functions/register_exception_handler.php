<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//register_exception_handler.php
//MMXXVI MSCRATCH

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

set_exception_handler(function($e) use ($text_fatal_error_message) {

if($e instanceof mysqli_sql_exception) {

$ref_code = strtoupper(substr(hash('sha256', 'DB' . $e->getMessage() . $e->getFile() . $e->getLine()), 0, 10));

$file_name = 'db_error_log_'. date('Y_m_d'). '.txt';
$file_path = db_error_logs_path;
$log = $ref_code. '_db_error_'. date('Y_m_d_H_i_s'). ":" . $e->getMessage(). " in " . $e->getFile(). ":". $e->getLine(). PHP_EOL;

if (is_writable($file_path)) {
file_put_contents($file_path . '/' . $file_name, $log, FILE_APPEND | LOCK_EX);
}

$fatal_error_message = ([
'message_title' => $text_fatal_error_message['fatal_error_message_db_error_title'],
'message_additional_title' => $text_fatal_error_message['fatal_error_message_db_error_additional_title'],
'message_ref_code' => $ref_code,
'message_text'    => $text_fatal_error_message['fatal_error_message_db_error_title_text'],
]);
fatal_error_message($fatal_error_message, $text_fatal_error_message);
}


$ref_code = strtoupper(substr(hash('sha256','EXC' . $e->getMessage() . $e->getFile() . $e->getLine()), 0, 10));

$file_name = 'system_error_log_' . date('Y_m_d') . '.txt';
$file_path = system_error_logs_path;

$log = $ref_code . '_system_error_' . date('Y_m_d_H_i_s') . ":". $e->getMessage() . " in " . $e->getFile() . ":" . $e->getLine() . PHP_EOL;

if (is_writable($file_path)) {
file_put_contents($file_path . '/' . $file_name, $log, FILE_APPEND | LOCK_EX);
}

$fatal_error_message = ([
'message_title' => $text_fatal_error_message['fatal_error_message_system_error_title'],
'message_additional_title' => $text_fatal_error_message['fatal_error_message_system_error_additional_title'],
'message_ref_code' => $ref_code,
'message_text'    => $text_fatal_error_message['fatal_error_message_system_error_title_text'],
]);
fatal_error_message($fatal_error_message, $text_fatal_error_message);

});

register_shutdown_function(function() use ($text_fatal_error_message) {
$error = error_get_last();

if ($error && in_array($error['type'], [E_ERROR,E_PARSE,E_CORE_ERROR,E_COMPILE_ERROR])) {

$ref_code = strtoupper(substr(hash('sha256','fatal_shutdown' . $error['message'] . $error['file'] . $error['line']), 0, 10));


$file_name = 'fatal_shutdown_log_' . date('Y_m_d') . '.txt';
$file_path = system_error_logs_path;

$log = $ref_code . '_fatal_shutdown_' . date('Y_m_d_H_i_s') . "_". $error['type'] . ": ". $error['message'] . " in " . $error['file'] . ":" . $error['line'] . PHP_EOL;

if (is_writable($file_path)) {
file_put_contents($file_path . '/' . $file_name, $log, FILE_APPEND | LOCK_EX);
}

$fatal_error_message = ([
'message_title' => $text_fatal_error_message['fatal_error_message_fatal_shutdown_title'],
'message_additional_title' => $text_fatal_error_message['fatal_error_message_fatal_shutdown_additional_title'],
'message_ref_code' => $ref_code,
'message_text' => $text_fatal_error_message['fatal_error_message_fatal_shutdown_title_text'],
]);

fatal_error_message($fatal_error_message, $text_fatal_error_message);

}
});
