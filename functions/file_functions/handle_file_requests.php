<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//handle_file_requests.php
//MMXXVI MSCRATCH

function handle_file_requests(mysqli $db, array $text_functions, array $text_handlers, array $text_templates, array $settings) {
if (isset($_GET['p']) && $_GET['p'] === 'profile_image' && isset($_GET['file']) && ! empty($_GET['file'])) {
require file_functions_path . '/serve_profile_image.php';
serve_profile_image($_GET['file'], $text_functions, $settings);
exit();
}

if (isset($_GET['p']) && $_GET['p'] === 'file' && isset($_GET['file']) && ! empty($_GET['file'])) {
require file_functions_path . '/serve_uploaded_file.php';
serve_uploaded_file($db, $text_functions, $text_handlers, $text_templates, $_GET['file'], $settings);
exit();
}
}
