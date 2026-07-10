<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//serve_profile_images.php
//MMXXVI MSCRATCH

function serve_profile_image(string $file, array $text_functions, array $settings, array $activated_theme) {
$file = basename($file);
$real = realpath(profile_images_path . '/' . $file);

if (! $real || ! str_starts_with($real, realpath(profile_images_path))) {
$frontend_system_message = ([
'message_text'    => $text_functions['message_serve_profile_images_no_profile_image'],
'message_url'     => BASE_URL . 'blog',
'message_button_text'  => $text_functions['message_serve_profile_images_profile_btn'],
]);
frontend_system_message($frontend_system_message, $settings, $activated_theme);
}

$ext = strtolower(pathinfo($real, PATHINFO_EXTENSION));
switch ($ext) {
case 'jpg':
case 'jpeg':
header('Content-Type: image/jpeg');
break;
case 'png':
header('Content-Type: image/png');
break;
default:
header('Content-Type: application/octet-stream');
}
readfile($real);
exit();
}
