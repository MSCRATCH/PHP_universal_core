<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//manage_custom_pages.php
//MMXXVI MSCRATCH

function get_custom_pages(mysqli $db) {
$stmt = $db->query("SELECT custom_page_id, custom_page_url, custom_page_title FROM custom_pages");
$custom_pages = $stmt->fetch_all(MYSQLI_ASSOC);
$stmt->free();
if ($custom_pages !== false && ! empty($custom_pages)) {
return $custom_pages;
} else {
return false;
}
}

function check_custom_page_id(mysqli $db, int $custom_page_id_get) {
$stmt = $db->prepare("SELECT custom_page_id FROM custom_pages WHERE custom_page_id = ?");
$stmt->bind_param('i', $custom_page_id_get);
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

function get_custom_page_by_id(mysqli $db, int $custom_page_id_get) {
$stmt = $db->prepare("SELECT custom_page_url, custom_page_title, custom_page_content FROM custom_pages WHERE custom_page_id = ?");
$stmt->bind_param('i', $custom_page_id_get);
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

function get_custom_page(mysqli $db, string $section) {
$stmt = $db->prepare("SELECT custom_page_title, custom_page_content FROM custom_pages WHERE custom_page_url = ?");
$stmt->bind_param('s', $section);
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

function save_custom_page(mysqli $db, array $allowed_frontend_sections, array $allowed_backend_sections, array $text_functions, string $custom_page_url_form, string $custom_page_title_form, string $custom_page_content_form) {

$errors = array();

if (empty($custom_page_url_form)) {
$errors [] = $text_functions['message_manage_custom_pages_no_name'];
}

if (in_array($custom_page_url_form, $allowed_frontend_sections)) {
$errors [] = $text_functions['message_manage_custom_pages_invalid_url'];
}

if (in_array($custom_page_url_form, $allowed_backend_sections)) {
$errors [] = $text_functions['message_manage_custom_pages_invalid_url'];
}

if (empty($custom_page_title_form)) {
$errors [] = $text_functions['message_manage_custom_pages_no_title'];
}

if (empty($custom_page_content_form)) {
$errors [] = $text_functions['message_manage_custom_pages_no_content'];
}

if (empty($errors)) {
$stmt = $db->prepare("INSERT INTO custom_pages(custom_page_url, custom_page_title, custom_page_content) VALUES(?, ?, ?)");
$stmt->bind_param('sss', $custom_page_url_form, $custom_page_title_form, $custom_page_content_form);
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

function update_custom_page(mysqli $db, array $allowed_frontend_sections, array $allowed_backend_sections, array $text_functions, string $custom_page_url_update_form, string $custom_page_title_update_form, string $custom_page_content_update_form, int $custom_page_id_get) {

$errors = array();

if (empty($custom_page_url_update_form)) {
$errors [] = $text_functions['message_manage_custom_pages_no_name'];
}

if (in_array($custom_page_url_update_form, $allowed_frontend_sections)) {
$errors [] = $text_functions['message_manage_custom_pages_invalid_url'];
}

if (in_array($custom_page_url_update_form, $allowed_backend_sections)) {
$errors [] = $text_functions['message_manage_custom_pages_invalid_url'];
}

if (empty($custom_page_title_update_form)) {
$errors [] = $text_functions['message_manage_custom_pages_no_title'];
}

if (empty($custom_page_content_update_form)) {
$errors [] = $text_functions['message_manage_custom_pages_no_content'];
}

if (empty($errors)) {
$stmt = $db->prepare("UPDATE custom_pages SET custom_page_url = ?, custom_page_title = ?, custom_page_content = ?  WHERE custom_page_id = ? LIMIT 1");
$stmt->bind_param('sssi', $custom_page_url_update_form , $custom_page_title_update_form, $custom_page_content_update_form, $custom_page_id_get);
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

function remove_custom_page(mysqli $db, int $custom_page_id_form) {
$stmt = $db->prepare("DELETE FROM custom_pages WHERE custom_page_id = ? LIMIT 1");
$stmt->bind_param('i', $custom_page_id_form);
if ($stmt->execute()) {
$stmt->close();
return true;
} else {
$stmt->close();
return false;
}
}
