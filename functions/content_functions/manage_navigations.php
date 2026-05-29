<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//manage_navigations.php
//MMXXVI MSCRATCH

function home_nav_item(array $text_functions) {
return '<li><a href="'. BASE_URL. 'blog">'. $text_functions['home_nav_item']. '</a></li>';
}

function contact_nav_item(array $text_functions) {
if (user_is_administrator() === false) {
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

function register_nav_item(array $text_functions, array $settings) {
if (user_is_logged_in() === false && $settings['disable_registration'] === "no") {
return '<li><a href="'. BASE_URL. 'register">'. $text_functions['register_nav_item']. '</a></li>';
} else {
return '';
}
}

function profile_nav_item() {
if (user_is_logged_in() !== false) {
$username_header = get_username();
return '<li><a href="' .BASE_URL. 'profile/'. sanitize_1($username_header) . '">' . sanitize_3($username_header) . '</a></li>';
} else {
return '';
}
}

function user_activity_log_nav_item(mysqli $db, array $text_functions) {
if (user_is_logged_in() !== false) {
$user_id_header = get_user_id();
$result = number_of_unviewed_user_activity_log_entries($db, $user_id_header);
return '<li><a href="'. BASE_URL. 'user_activity_log">'. $text_functions['user_activity_log_nav_item']. "&nbsp;". '<span class="span_b">'. '['.sanitize_1($result). ']'. '</span>'. '</a></li>';
} else {
return '';
}
}

function profile_settings_nav_item(array $text_functions) {
if (user_is_logged_in() !== false) {
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

function dashboard_nav_moderator(array $text_functions) {
if (user_is_moderator() !== false) {
$output = '';
$output .= '<li><a href="' . BASE_URL . 'blog"><i class="fa-solid fa-arrow-left"></i>'. "&nbsp;". $text_functions['dashboard_nav_moderator_back_to_homepage']. '</a></li>';
$output .= '<li><a href="' . BASE_URL . 'dashboard_moderator"><i class="fa-solid fa-house"></i>'. "&nbsp;". $text_functions['dashboard_nav_moderator_dashboard']. '</a></li>';
return $output;
} else {
return '';
}
}

function dashboard_nav_administrator(mysqli $db, array $text_functions) {
if (user_is_administrator() !== false) {
$result = number_of_unviewed_hidden_comments($db);
$output = '';
$output .= '<li><a href="' . BASE_URL . 'blog"><i class="fa-solid fa-arrow-left"></i>'. "&nbsp;". $text_functions['dashboard_nav_administrator_back_to_homepage']. '</a></li>';
$output .= '<li><a href="' . BASE_URL . 'dashboard"><i class="fa-solid fa-house"></i>'. "&nbsp;". $text_functions['dashboard_nav_administrator_dashboard']. '</a></li>';
$output .= '<li><a href="' . BASE_URL . 'settings"><i class="fa-solid fa-gear"></i>'. "&nbsp;". $text_functions['dashboard_nav_administrator_settings']. '</a></li>';
$output .= '<li><a href="' . BASE_URL . 'email_config"><i class="fa-solid fa-envelope"></i>'. "&nbsp;". $text_functions['dashboard_nav_administrator_email_config']. '</a></li>';
$output .= '<li><a href="' . BASE_URL . 'request_log"><i class="fa-solid fa-floppy-disk"></i>'. "&nbsp;". $text_functions['dashboard_nav_administrator_request_log']. '</a></li>';
$output .= '<li><a href="' . BASE_URL . 'error_log"><i class="fa-solid fa-bug"></i>'. "&nbsp;". $text_functions['dashboard_nav_administrator_error_log']. '</a></li>';
$output .= '<li><a href="' . BASE_URL . 'blocklist"><i class="fa-solid fa-ban"></i>'. "&nbsp;". $text_functions['dashboard_nav_administrator_blocklist']. '</a></li>';
$output .= '<li><a href="' . BASE_URL . 'users"><i class="fa-solid fa-user"></i>'. "&nbsp;". $text_functions['dashboard_nav_administrator_user_management']. '</a></li>';
$output .= '<li><a href="' . BASE_URL . 'show_hidden_comments"><i class="fa-solid fa-comment"></i>'. "&nbsp;". $text_functions['dashboard_nav_administrator_show_hidden_comments']. "&nbsp;". '<span class="span_b">['.sanitize_1($result). ']</span>'. '</a>'. '</li>';
$output .= '<li><a href="' . BASE_URL . 'show_custom_pages"><i class="fa-solid fa-folder"></i>'. "&nbsp;". $text_functions['dashboard_nav_administrator_show_custom_pages']. '</a></li>';
$output .= '<li><a href="' . BASE_URL . 'show_primary_navigation"><i class="fa-solid fa-signs-post"></i>'. "&nbsp;". $text_functions['dashboard_nav_administrator_primary_navigation']. '</a></li>';
$output .= '<li><a href="' . BASE_URL . 'show_secondary_navigation"><i class="fa-solid fa-signs-post"></i>'. "&nbsp;". $text_functions['dashboard_nav_administrator_secondary_navigation']. '</a></li>';
$output .= '<li><a href="' . BASE_URL . 'manage_themes"><i class="fa-solid fa-brush"></i>'. "&nbsp;". $text_functions['dashboard_nav_administrator_manage_themes']. '</a></li>';
return $output;
} else {
return '';
}
}

function dashboard_nav(array $text_functions) {
if (user_is_administrator_or_moderator() !== false) {
$output = '';
$output .= '<li><a href="' . BASE_URL . 'show_uploaded_files"><i class="fa-solid fa-cloud"></i>'. "&nbsp;". $text_functions['dashboard_nav_show_uploaded_files']. '</a></li>';
$output .= '<li><a href="' . BASE_URL . 'show_blog_articles"><i class="fa-solid fa-message"></i>'. "&nbsp;". $text_functions['dashboard_nav_blog_articles']. '</a></li>';
$output .= '<li><a href="' . BASE_URL . 'logout"><i class="fa-solid fa-arrow-right-from-bracket"></i>'. "&nbsp;". $text_functions['dashboard_nav_logout']. '</a></li>';
return $output;
} else {
return '';
}
}

function get_primary_nav(mysqli $db) {
$stmt = $db->query("SELECT primary_nav_id, primary_nav_url, primary_nav_name, primary_nav_order FROM primary_nav ORDER BY primary_nav_order ASC, primary_nav_id ASC");
$primary_nav = $stmt->fetch_all(MYSQLI_ASSOC);
$stmt->free();
if ($primary_nav !== false && ! empty($primary_nav)) {
return $primary_nav;
} else {
return false;
}
}

function get_secondary_nav(mysqli $db) {
$stmt = $db->query("SELECT secondary_nav_id, secondary_nav_url, secondary_nav_name, secondary_nav_order FROM secondary_nav ORDER BY secondary_nav_order ASC, secondary_nav_id ASC");
$secondary_nav = $stmt->fetch_all(MYSQLI_ASSOC);
$stmt->free();
if ($secondary_nav !== false && ! empty($secondary_nav)) {
return $secondary_nav;
} else {
return false;
}
}

function check_primary_navigation_element_id(mysqli $db, int $primary_navigation_element_id_get) {
$stmt = $db->prepare("SELECT primary_nav_id FROM primary_nav WHERE primary_nav_id = ?");
$stmt->bind_param('i', $primary_navigation_element_id_get);
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows !== 1) {
$stmt->close();
return false;
} else {
$stmt->close();
return true;
}
}

function check_secondary_navigation_element_id(mysqli $db, int $secondary_navigation_element_id_get) {
$stmt = $db->prepare("SELECT secondary_nav_id FROM secondary_nav WHERE secondary_nav_id = ?");
$stmt->bind_param('i', $secondary_navigation_element_id_get);
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows !== 1) {
$stmt->close();
return false;
} else {
$stmt->close();
return true;
}
}

function get_primary_navigation_element_by_id(mysqli $db, int $primary_navigation_element_id_get) {
$stmt = $db->prepare("SELECT primary_nav_url, primary_nav_name, primary_nav_order FROM primary_nav WHERE primary_nav_id = ?");
$stmt->bind_param('i', $primary_navigation_element_id_get);
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

function get_secondary_navigation_element_by_id(mysqli $db, int $secondary_navigation_element_id_get) {
$stmt = $db->prepare("SELECT secondary_nav_url, secondary_nav_name, secondary_nav_order FROM secondary_nav WHERE secondary_nav_id = ?");
$stmt->bind_param('i', $secondary_navigation_element_id_get);
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

function primary_nav(mysqli $db) {
$primary_nav_elements = get_primary_nav($db);
$output_primary_nav = '';
if ($primary_nav_elements === false) {
return;
}
foreach ($primary_nav_elements as $primary_nav_element) {
$primary_nav_url  = $primary_nav_element['primary_nav_url'];
$primary_nav_name = $primary_nav_element['primary_nav_name'];
$output_primary_nav .= '<li><a href="' . BASE_URL . sanitize_1($primary_nav_url) . '">' . sanitize_1($primary_nav_name) . '</a></li>';
}
return $output_primary_nav;
}

function secondary_nav(mysqli $db) {
$secondary_nav_elements = get_secondary_nav($db);
$output_secondary_nav = '';
if ($secondary_nav_elements === false) {
$output_secondary_nav .= '<li><a href="' . BASE_URL . 'blog">Blog</a></li>';
return $output_secondary_nav;
}
foreach ($secondary_nav_elements as $secondary_nav_element) {
$secondary_nav_url  = $secondary_nav_element['secondary_nav_url'];
$secondary_nav_name = $secondary_nav_element['secondary_nav_name'];
$output_secondary_nav .= '<li><a href="' . BASE_URL . sanitize_1($secondary_nav_url) . '">' . sanitize_1($secondary_nav_name) . '</a></li>';
}
return $output_secondary_nav;
}

function save_primary_nav_element(mysqli $db, array $allowed_frontend_sections, array $allowed_backend_sections, array $text_functions, string $primary_nav_url_form, string $primary_nav_name_form, int $primary_nav_order_form) {

$errors = array();

if (empty($primary_nav_url_form)) {
$errors [] = $text_functions['message_manage_navigations_no_url'];
}

if (in_array($primary_nav_url_form, $allowed_frontend_sections)) {
$errors [] = $text_functions['message_manage_navigations_invalid_url'];
}

if (in_array($primary_nav_url_form, $allowed_backend_sections)) {
$errors [] = $text_functions['message_manage_navigations_invalid_url'];
}

if (empty($primary_nav_name_form)) {
$errors [] = $text_functions['message_manage_navigations_no_name'];
}

if (empty($primary_nav_order_form)) {
$errors [] = $text_functions['message_manage_navigations_no_order_value'];
}

if (! is_numeric($primary_nav_order_form)) {
$errors [] = $text_functions['message_manage_navigations_invalid_order_value'];
}

if (empty($errors)) {
$stmt = $db->prepare("INSERT INTO primary_nav(primary_nav_url, primary_nav_name, primary_nav_order) VALUES(?, ?, ?)");
$stmt->bind_param('ssi', $primary_nav_url_form, $primary_nav_name_form, $primary_nav_order_form);
if ($stmt->execute()) {
$stmt->close();
return true;
} else {
$stmt->close();
return false;
}
} else {
return $errors;
}

}

function save_secondary_nav_element(mysqli $db, array $allowed_frontend_sections, array $allowed_backend_sections, array $text_functions, string $secondary_nav_url_form, string $secondary_nav_name_form, int $secondary_nav_order_form) {

$errors = array();

if (empty($secondary_nav_url_form)) {
$errors [] = $text_functions['message_manage_navigations_no_url'];
}

if (in_array($secondary_nav_url_form, $allowed_frontend_sections)) {
$errors [] = $text_functions['message_manage_navigations_invalid_url'];
}

if (in_array($secondary_nav_url_form, $allowed_backend_sections)) {
$errors [] = $text_functions['message_manage_navigations_invalid_url'];
}

if (empty($secondary_nav_name_form)) {
$errors [] = $text_functions['message_manage_navigations_no_name'];
}

if (empty($secondary_nav_order_form)) {
$errors [] = $text_functions['message_manage_navigations_no_order_value'];
}

if (! is_numeric($secondary_nav_order_form)) {
$errors [] = $text_functions['message_manage_navigations_invalid_order_value'];
}

if (empty($errors)) {
$stmt = $db->prepare("INSERT INTO secondary_nav(secondary_nav_url, secondary_nav_name, secondary_nav_order) VALUES(?, ?, ?)");
$stmt->bind_param('ssi', $secondary_nav_url_form, $secondary_nav_name_form, $secondary_nav_order_form);
if ($stmt->execute()) {
$stmt->close();
return true;
} else {
$stmt->close();
return false;
}
} else {
return $errors;
}

}


function update_primary_nav_element(mysqli $db, array $allowed_frontend_sections, array $allowed_backend_sections, array $text_functions, string $primary_nav_url_update_form, string $primary_nav_name_update_form, int $primary_nav_order_update_form, int $primary_navigation_element_id_get) {

$errors = array();


if (empty($primary_nav_url_update_form)) {
$errors [] = $text_functions['message_manage_navigations_no_url'];
}

if (in_array($primary_nav_url_update_form, $allowed_frontend_sections)) {
$errors [] = $text_functions['message_manage_navigations_invalid_url'];
}

if (in_array($primary_nav_url_update_form, $allowed_backend_sections)) {
$errors [] = $text_functions['message_manage_navigations_invalid_url'];
}

if (empty($primary_nav_name_update_form)) {
$errors [] = $text_functions['message_manage_navigations_no_name'];
}

if (empty($primary_nav_order_update_form)) {
$errors [] = $text_functions['message_manage_navigations_no_order_value'];
}

if (! is_numeric($primary_nav_order_update_form)) {
$errors [] = $text_functions['message_manage_navigations_invalid_order_value'];
}

if (empty($errors)) {
$stmt = $db->prepare("UPDATE primary_nav SET primary_nav_url = ?, primary_nav_name = ?, primary_nav_order = ? WHERE primary_nav_id = ? LIMIT 1");
$stmt->bind_param('ssii', $primary_nav_url_update_form, $primary_nav_name_update_form, $primary_nav_order_update_form, $primary_navigation_element_id_get);
if ($stmt->execute()) {
$stmt->close();
return true;
} else {
$stmt->close();
return false;
}
} else {
return $errors;
}
}


function update_secondary_nav_element(mysqli $db, array $allowed_frontend_sections, array $allowed_backend_sections, array $text_functions, string $secondary_nav_url_update_form, string $secondary_nav_name_update_form, int $secondary_nav_order_update_form, int $secondary_navigation_element_id_get) {

$errors = array();

if (empty($secondary_nav_url_update_form)) {
$errors [] = $text_functions['message_manage_navigations_no_url'];
}

if (in_array($secondary_nav_url_update_form, $allowed_frontend_sections)) {
$errors [] = $text_functions['message_manage_navigations_invalid_url'];
}

if (in_array($secondary_nav_url_update_form, $allowed_backend_sections)) {
$errors [] = $text_functions['message_manage_navigations_invalid_url'];
}

if (empty($secondary_nav_name_update_form)) {
$errors [] = $text_functions['message_manage_navigations_no_name'];
}

if (empty($secondary_nav_order_update_form)) {
$errors [] = $text_functions['message_manage_navigations_no_order_value'];
}

if (! is_numeric($secondary_nav_order_update_form)) {
$errors [] = $text_functions['message_manage_navigations_invalid_order_value'];
}

if (empty($errors)) {
$stmt = $db->prepare("UPDATE secondary_nav SET secondary_nav_url = ?, secondary_nav_name = ?, secondary_nav_order = ? WHERE secondary_nav_id = ? LIMIT 1");
$stmt->bind_param('ssii', $secondary_nav_url_update_form, $secondary_nav_name_update_form, $secondary_nav_order_update_form, $secondary_navigation_element_id_get);
if ($stmt->execute()) {
$stmt->close();
return true;
} else {
$stmt->close();
return false;
}
} else {
return $errors;
}
}

function remove_primary_nav_element(mysqli $db, int $primary_navigation_element_id_form) {
$stmt = $db->prepare("DELETE FROM primary_nav WHERE primary_nav_id = ? LIMIT 1");
$stmt->bind_param('i', $primary_navigation_element_id_form);
if ($stmt->execute()) {
$stmt->close();
return true;
} else {
$stmt->close();
return false;
}
}

function remove_secondary_nav_element(mysqli $db, int $secondary_navigation_element_id_form) {
$stmt = $db->prepare("DELETE FROM secondary_nav WHERE secondary_nav_id = ? LIMIT 1");
$stmt->bind_param('i', $secondary_navigation_element_id_form);
if ($stmt->execute()) {
$stmt->close();
return true;
} else {
$stmt->close();
return false;
}
}
