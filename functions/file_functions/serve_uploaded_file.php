<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//serve_uploaded_file.php
//MMXXVI MSCRATCH

function serve_uploaded_file(mysqli $db, array $text_functions, array $text_handlers, array $text_templates, string $file, array $settings) {
$file = basename($file);
$real = realpath(files_path . '/' . $file);

if (! $real || ! str_starts_with($real, realpath(files_path)) || ! file_exists($real)) {
$frontend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => $text_functions['message_serve_uploaded_file_no_file'],
'message_url'     => BASE_URL . 'blog',
'message_button_text'  => $text_functions['message_serve_uploaded_file_btn'],
]);
frontend_system_message($frontend_system_message, $settings);
}

$ext = strtolower(pathinfo($real, PATHINFO_EXTENSION));

if ($ext === 'mp4') {
header('Content-Type: video/mp4');
header('Content-Disposition: inline; filename="' . $file . '"');
header('Content-Length: ' . filesize($real));
header('Accept-Ranges: bytes');
readfile($real);
exit();
}

if (in_array($ext, ['jpg', 'jpeg', 'png'], true)) {
header('Content-Type: image/' . ($ext === 'png' ? 'png' : 'jpeg'));
header('Content-Disposition: inline; filename="' . $file . '"');
header('Content-Length: ' . filesize($real));
readfile($real);
exit();
}

if (in_array($ext, ['zip', 'rar'], true)) {
$file_data = get_uploaded_file_by_file_name($db, $file);

if ($file_data === false) {
$frontend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => $text_functions['message_serve_uploaded_file_no_file'],
'message_url'     => BASE_URL . 'blog',
'message_button_text'  => $text_functions['message_serve_uploaded_file_btn'],
]);
frontend_system_message($frontend_system_message, $settings);
}

if (isset($_POST['csrf_token'])) {
if (validate_token('download_file', $_POST['csrf_token'])) {
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="' . $file . '"');
header('Content-Length: ' . filesize($real));
readfile($real);
exit();
} else {
$frontend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => $text_functions['csrf_text'],
'message_url'     => BASE_URL . 'blog',
'message_button_text'  => $text_functions['csrf_btn'],
]);
frontend_system_message($frontend_system_message, $settings);
}
}
require templates_path . "/frontend_templates/serve_uploaded_file_template.php";
exit();
}
}
