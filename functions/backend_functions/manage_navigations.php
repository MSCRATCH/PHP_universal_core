<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//manage_navigations.php
//MMXXVI MSCRATCH

function view_custom_navs(mysqli $db) {
$stmt = $db->query("SELECT custom_nav_id, custom_nav_placeholder FROM custom_navs ORDER BY custom_nav_id ASC");
$custom_navs = $stmt->fetch_all(MYSQLI_ASSOC);
$stmt->free();
if (! empty($custom_navs)) {
return $custom_navs;
} else {
return false;
}
}

function view_custom_nav_links_by_id(mysqli $db, int $custom_nav_id_get) {
$stmt = $db->prepare("SELECT custom_navs_links.custom_nav_link_id, custom_navs_links.custom_nav_link_name, custom_navs_links.custom_nav_link_order, custom_navs_links.custom_nav_link_url, custom_navs.custom_nav_placeholder FROM custom_navs_links INNER JOIN custom_navs ON custom_navs_links.custom_nav_id = custom_navs.custom_nav_id WHERE custom_navs_links.custom_nav_id = ?");
$stmt->bind_param('i', $custom_nav_id_get);
$stmt->execute();
$result = $stmt->get_result();
$custom_nav_links = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
if (! empty($custom_nav_links)) {
return $custom_nav_links;
} else {
return false;
}
}

function check_custom_nav_id(mysqli $db, int $custom_nav_id_get) {
$stmt = $db->prepare("SELECT custom_nav_id FROM custom_navs WHERE custom_nav_id = ?");
$stmt->bind_param('i', $custom_nav_id_get);
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

function get_custom_nav_by_id(mysqli $db, int $custom_nav_id_get) {
$stmt = $db->prepare("SELECT custom_nav_placeholder FROM custom_navs WHERE custom_nav_id = ?");
$stmt->bind_param('i', $custom_nav_id_get);
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

function check_if_custom_nav_already_exists(mysqli $db, string $custom_nav_placeholder_form) {
$stmt = $db->prepare("SELECT custom_nav_placeholder FROM custom_navs WHERE custom_nav_placeholder = ?");
$stmt->bind_param('s', $custom_nav_placeholder_form);
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows === 1) {
$stmt->close();
return true;
} else {
$stmt->close();
return false;
}
}

function save_custom_nav(mysqli $db, array $text_functions, string $custom_nav_placeholder_form) {

$errors = array();

$nav_already_exists = check_if_custom_nav_already_exists($db, $custom_nav_placeholder_form);

$custom_nav_placeholder_pattern = '/^[a-zA-Z0-9_]+$/';

if (! preg_match($custom_nav_placeholder_pattern, $custom_nav_placeholder_form)) {
$errors [] = $text_functions['message_manage_navigations_invalid_placeholder_format'];
}

if (empty($custom_nav_placeholder_form)) {
$errors [] = $text_functions['message_manage_navigations_no_placeholder'];
}

if (empty($errors)) {
$stmt = $db->prepare("INSERT INTO custom_navs(custom_nav_placeholder) VALUES(?)");
$stmt->bind_param('s', $custom_nav_placeholder_form);
$stmt->execute();
$stmt->close();
return true;
} else {
return $errors;
}
}

function update_custom_nav(mysqli $db, array $text_functions, string $custom_nav_placeholder_form, int $custom_nav_id_get) {

$errors = array();

$custom_nav_placeholder_pattern = '/^[a-zA-Z0-9_]+$/';

if (! preg_match($custom_nav_placeholder_pattern, $custom_nav_placeholder_form)) {
$errors [] = $text_functions['message_manage_navigations_invalid_placeholder_format'];
}

if (empty($custom_nav_placeholder_form)) {
$errors [] = $text_functions['message_manage_navigations_no_placeholder'];
}

if (empty($errors)) {
$stmt = $db->prepare("UPDATE custom_navs SET custom_nav_placeholder = ? WHERE custom_nav_id = ? LIMIT 1");
$stmt->bind_param('si', $custom_nav_placeholder_form, $custom_nav_id_get);
$stmt->execute();
$stmt->close();
return true;
} else {
return $errors;
}
}

function save_nav_link(mysqli $db, array $text_functions, array $allowed_backend_sections, array $allowed_frontend_sections, int $custom_nav_id_get, string $custom_nav_link_url_form, string $custom_nav_link_name_form, int $custom_nav_link_order_form) {

$errors = array();

if (in_array($custom_nav_link_url_form, $allowed_backend_sections, true)) {
$errors [] = $text_functions['message_manage_navigations_forbidden_url'];
}

if (in_array($custom_nav_link_url_form, $allowed_frontend_sections, true)) {
$errors [] = $text_functions['message_manage_navigations_forbidden_url'];
}

if (empty($custom_nav_link_url_form)) {
$errors [] = $text_functions['message_manage_navigations_no_url'];
}

if (empty($custom_nav_link_name_form)) {
$errors [] = $text_functions['message_manage_navigations_no_name'];
}

if (empty($custom_nav_link_order_form)) {
$errors [] = $text_functions['message_manage_navigations_no_order'];
}

if (! is_numeric($custom_nav_link_order_form)) {
$errors [] = $text_functions['message_manage_navigations_order_not_numeric'];
}

if (empty($errors)) {
$stmt = $db->prepare("INSERT INTO custom_navs_links(custom_nav_id, custom_nav_link_url, custom_nav_link_name, custom_nav_link_order) VALUES(?, ?, ?, ?)");
$stmt->bind_param('issi', $custom_nav_id_get, $custom_nav_link_url_form, $custom_nav_link_name_form, $custom_nav_link_order_form);
$stmt->execute();
$stmt->close();
return true;
} else {
return $errors;
}
}

function remove_custom_nav(mysqli $db, int $navigation_id_form) {
$stmt = $db->prepare("DELETE FROM custom_navs WHERE custom_nav_id = ? LIMIT 1");
$stmt->bind_param('i', $navigation_id_form);
$stmt->execute();
$stmt->close();
return true;
}

function remove_custom_nav_link(mysqli $db, int $custom_nav_link_id_form) {
$stmt = $db->prepare("DELETE FROM custom_navs_links WHERE custom_nav_link_id = ? LIMIT 1");
$stmt->bind_param('i', $custom_nav_link_id_form);
$stmt->execute();
$stmt->close();
return true;
}
