<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//rate_limiter.php
//MMXXVI MSCRATCH

function save_request_for_rate_limiter(mysqli $db, string $ip, string $uri) {
$stmt = $db->prepare("INSERT INTO rate_limiter(rate_limit_ip, rate_limit_uri, rate_limit_created_at) VALUES(?, ?, NOW())");
$stmt->bind_param('ss', $ip, $uri);
$stmt->execute();
}

function rate_limiter(mysqli $db, array $text_functions, array $settings, array $activated_theme) {

$ip = $_SERVER['REMOTE_ADDR'];

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$protected_uris = [
'/login',
'/register',
'/contact',
'/backend_login'
];

$is_protected = false;

foreach ($protected_uris as $protected_uri) {
if (str_ends_with($uri, $protected_uri)) {
$is_protected = true;
break;
}
}

if (! $is_protected) {
return;
}

save_request_for_rate_limiter($db, $ip, $uri);

$stmt = $db->prepare("SELECT COUNT(*) FROM rate_limiter WHERE rate_limit_ip = ? AND rate_limit_uri = ? AND rate_limit_created_at > DATE_SUB(NOW(), INTERVAL 25 SECOND)");
$stmt->bind_param('ss', $ip, $uri);
$stmt->execute();
$stmt->bind_result($count_result);
$stmt->fetch();
$stmt->close();

if ($count_result > 5) {
$frontend_system_message = ([
'message_text'    => $text_functions['message_rate_limiter_text'],
'message_url'     => BASE_URL. $settings['default_start_page'],
'message_button_text'  => $text_functions['message_rate_limiter_btn_return'],
]);
frontend_system_message($frontend_system_message, $settings, $activated_theme);
}
}
