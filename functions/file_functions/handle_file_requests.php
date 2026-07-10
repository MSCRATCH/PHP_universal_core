<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//handle_file_requests.php
//MMXXVI MSCRATCH

function get_uploaded_file_by_file_name(mysqli $db, string $file) {
$stmt = $db->prepare("SELECT file_name, file_title, file_description FROM files WHERE file_name = ?");
$stmt->bind_param('s', $file);
$stmt->execute();
$result = $stmt->get_result();
if ($result && $row = $result->fetch_assoc()) {
$stmt->close();
return $row;
} else {
$stmt->close();
return false;
}
}

function handle_file_requests(mysqli $db, array $text_functions, array $text_handlers, array $text_templates, array $settings, array $activated_theme) {
if (isset($_GET['p']) && $_GET['p'] === 'profile_image' && isset($_GET['file']) && ! empty($_GET['file'])) {
require file_functions_path . '/serve_profile_image.php';
serve_profile_image($_GET['file'], $text_functions, $settings, $activated_theme);
exit();
}

if (isset($_GET['p']) && $_GET['p'] === 'file' && isset($_GET['file']) && ! empty($_GET['file'])) {
require file_functions_path . '/serve_uploaded_file.php';
serve_uploaded_file($db, $text_functions, $text_handlers, $text_templates, $_GET['file'], $settings, $activated_theme);
exit();
}
}
