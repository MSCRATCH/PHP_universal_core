<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//get_profile_widget.php
//MMXXVI MSCRATCH

function get_profile_widget(array $profile, array $text_fatal_error_message, array $text_templates, string $widget_template_directory, string $profile_widget_template) {
ob_start();
$template_path = templates_path . "/$widget_template_directory/{$profile_widget_template}.php";
$real_template_path = realpath($template_path);
if ($real_template_path && str_starts_with($real_template_path, realpath(templates_path)) && file_exists($real_template_path)) {
require $real_template_path;
return $content = ob_get_clean();
} else {
$fatal_error_message = ([
'message_title' => $text_fatal_error_message['fatal_error_message_template_loading_failed_title'],
'message_additional_title' => $text_fatal_error_message['fatal_error_message_template_loading_failed_additional_title'],
'message_text' => $text_fatal_error_message['fatal_error_message_template_loading_failed_text'],
]);
fatal_error_message($fatal_error_message, $text_fatal_error_message);
}
}
