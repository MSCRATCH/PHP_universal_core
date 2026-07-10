<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//public_navigations.php
//MMXXVI MSCRATCH

function home_nav_item(array $text_functions, array $settings) {
return '<li><a href="'. BASE_URL. sanitize_1($settings['default_start_page']). '">'. $text_functions['home_nav_item']. '</a></li>';
}

function contact_nav_item(array $text_functions, array $feature_flags) {
if (user_is_administrator() === false && $feature_flags['contact_form_enabled'] === 1) {
return '<li><a href="'. BASE_URL. 'contact">'. $text_functions['contact_nav_item']. '</a></li>';
} else {
return '';
}
}

function login_nav_item(array $text_functions) {
if (user_is_logged_in() === false) {
return '<li><a href="'. BASE_URL. 'login">'. $text_functions['login_nav_item']. '</a></li>';
} else {
return '';
}
}

function register_nav_item(array $text_functions, array $feature_flags) {
if (user_is_logged_in() === false && $feature_flags['registration_enabled'] === 1) {
return '<li><a href="'. BASE_URL. 'register">'. $text_functions['register_nav_item']. '</a></li>';
} else {
return '';
}
}

function profile_nav_item(array $feature_flags) {
if (user_is_logged_in() !== false && $feature_flags['user_profile_system_enabled'] === 1) {
$username_header = get_username();
return '<li><a href="' .BASE_URL. 'profile/'. sanitize_1($username_header) . '">' . sanitize_3($username_header) . '</a></li>';
} else {
return '';
}
}

function notifications_nav_item(mysqli $db, array $text_functions, array $feature_flags) {
if (user_is_logged_in() !== false && $feature_flags['notifications_enabled'] === 1) {
$user_id_header = get_user_id();
$result = number_of_unviewed_notifications($db, $user_id_header);
return '<li><a href="'. BASE_URL. 'notifications">'. $text_functions['notifications_nav_item']. "&nbsp;". '<span class="span_b">'. '['.sanitize_1($result). ']'. '</span>'. '</a></li>';
} else {
return '';
}
}

function profile_settings_nav_item(array $text_functions, array $feature_flags) {
if (user_is_logged_in() !== false && $feature_flags['user_profile_system_enabled'] === 1) {
return '<li><a href="'. BASE_URL. 'manage_profile">'. $text_functions['profile_settings_nav_item']. '</a></li>';
} else {
return '';
}
}

function dashboard_nav_item(array $text_functions) {
if (user_is_administrator() !== false) {
return '<li><a href="'. BASE_URL. 'dashboard">'. $text_functions['dashboard_nav_item']. '</a></li>';
} else {
return '';
}
}

function dashboard_moderator_nav_item(array $text_functions) {
if (user_is_moderator() !== false) {
return '<li><a href="'. BASE_URL. 'dashboard_moderator">'. $text_functions['dashboard_moderator_nav_item']. '</a></li>';
} else {
return '';
}
}

function logout_nav_item(array $text_functions) {
if (user_is_logged_in() !== false) {
return '<li><a href="'. BASE_URL. 'logout">'. $text_functions['logout_nav_item']. '</a></li>';
} else {
return '';
}
}

function get_custom_navs(mysqli $db) {
$stmt = $db->query("SELECT custom_navs.custom_nav_placeholder, custom_navs_links.custom_nav_link_url, custom_navs_links.custom_nav_link_name, custom_navs_links.custom_nav_link_order FROM custom_navs LEFT JOIN custom_navs_links ON custom_navs.custom_nav_id = custom_navs_links.custom_nav_id ORDER BY custom_navs_links.custom_nav_link_order ASC");
$primary_nav = $stmt->fetch_all(MYSQLI_ASSOC);
$stmt->free();
if (! empty($primary_nav)) {
return $primary_nav;
} else {
return false;
}
}

function render_custom_navs(mysqli $db, array $text_functions, array $settings) {
$custom_navs = get_custom_navs($db);
if ($custom_navs === false) {
return [];
}

$grouped = [];

foreach ($custom_navs as $row) {

$placeholder = sanitize_1($row['custom_nav_placeholder']);

$grouped[$placeholder][] = [
'url'  => $row['custom_nav_link_url'],
'name' => $row['custom_nav_link_name']
];
}

$result = [];

foreach ($grouped as $placeholder => $links) {

$html = '';

foreach ($links as $link) {

if ($link['url'] === null) {
continue;
}

$html .= '<li>';
$html .= '<a href="'. BASE_URL. sanitize_1($link['url']) . '">';
$html .= sanitize_1($link['name']);
$html .= '</a>';
$html .= '</li>';
}

if ($html === '') {
$html .= '<li>';
$html .= '<a href="'. BASE_URL. sanitize_1($settings['default_start_page']). '">';
$html .= sanitize_1($text_functions['home_nav_item']);
$html .= '</a>';
$html .= '</li>';
}

$result['nav_' . $placeholder] = $html;
}

return $result;
}
