<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//http_error_message.php
//MMXXVI MSCRATCH

function http_error_message(int $http_response_code, $activated_theme) {

$text_http_error_message = [

//404
'404_title' => '404: Page not found',
'404_text' => 'The requested page does not exist.',
'404_btn' => 'Back to home page',
//404

//403
'403_title' => '403: Access denied',
'403_text' => 'The web server has denied access to this page.',
'403_btn' => 'Back to home page',
//403
];

if ($http_response_code === 404) {
http_response_code(404);
$http_error_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_title' => $text_http_error_message['404_title'],
'message_text'    => $text_http_error_message['404_text'],
'message_button_text'  => $text_http_error_message['404_btn'],
]);
require templates_path . "/shared_templates/http_error_message_template.php";
exit();
} elseif ($http_response_code === 403) {
http_response_code(403);
$http_error_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_title' => $text_http_error_message['403_title'],
'message_text'    => $text_http_error_message['403_text'],
'message_button_text'  => $text_http_error_message['403_btn'],
]);
require templates_path . "/shared_templates/http_error_message_template.php";
exit();
}
}
