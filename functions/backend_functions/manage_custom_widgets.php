<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//manage_custom_widgets.php
//MMXXVI MSCRATCH

function view_custom_widgets(mysqli $db) {
$stmt = $db->query("SELECT custom_widget_id, custom_widget_content, custom_widget_placeholder FROM custom_widgets");
$custom_widgets = $stmt->fetch_all(MYSQLI_ASSOC);
$stmt->free();
if (! empty($custom_widgets)) {
return $custom_widgets;
} else {
return false;
}
}

function check_custom_widget_id(mysqli $db, int $custom_widget_id_get) {
$stmt = $db->prepare("SELECT custom_widget_id FROM custom_widgets WHERE custom_widget_id = ?");
$stmt->bind_param('i', $custom_widget_id_get);
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

function get_custom_widget_by_id(mysqli $db, int $custom_widget_id_get) {
$stmt = $db->prepare("SELECT custom_widget_content, custom_widget_placeholder FROM custom_widgets WHERE custom_widget_id = ?");
$stmt->bind_param('i', $custom_widget_id_get);
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

function check_if_placeholder_already_exists(mysqli $db, string $custom_widget_placeholder_form) {
$stmt = $db->prepare("SELECT custom_widget_placeholder FROM custom_widgets WHERE custom_widget_placeholder = ?");
$stmt->bind_param('s', $custom_widget_placeholder_form);
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

function save_custom_widget(mysqli $db, array $text_functions, string $custom_widget_content_form, string $custom_widget_placeholder_form) {

$errors = array();

$placeholder_already_exists = check_if_placeholder_already_exists($db, $custom_widget_placeholder_form);

$custom_widget_placeholder_pattern = '/^[a-zA-Z0-9_]+$/';

if (! preg_match($custom_widget_placeholder_pattern, $custom_widget_placeholder_form)) {
$errors [] = $text_functions['manage_custom_widgets_invalid_placeholder_format'];
}

if (empty($custom_widget_content_form)) {
$errors [] = $text_functions['manage_custom_widgets_no_custom_widget_content'];
}

if (empty($custom_widget_placeholder_form)) {
$errors [] = $text_functions['manage_custom_widgets_no_custom_widget_placeholder'];
}

if ($placeholder_already_exists === true) {
$errors [] = $text_functions['manage_custom_widgets_placeholder_already_exists'];
}

if (empty($errors)) {
$stmt = $db->prepare("INSERT INTO custom_widgets(custom_widget_content, custom_widget_placeholder) VALUES(?, ?)");
$stmt->bind_param('ss', $custom_widget_content_form, $custom_widget_placeholder_form);
$stmt->execute();
$stmt->close();
return true;
} else {
return $errors;
}
}

function update_custom_widget(mysqli $db, array $text_functions, string $custom_widget_content_update_form, string $custom_widget_placeholder_update_form, int $custom_widget_id_get) {

$errors = array();

$custom_widget_placeholder_pattern = '/^[a-zA-Z0-9_]+$/';

if (! preg_match($custom_widget_placeholder_pattern, $custom_widget_placeholder_update_form)) {
$errors [] = $text_functions['manage_custom_widgets_invalid_placeholder_format'];
}

if (empty($custom_widget_content_update_form)) {
$errors [] = $text_functions['manage_custom_widgets_no_custom_widget_content'];
}

if (empty($custom_widget_placeholder_update_form)) {
$errors [] = $text_functions['manage_custom_widgets_no_custom_widget_placeholder'];
}

if (empty($errors)) {
$stmt = $db->prepare("UPDATE custom_widgets SET custom_widget_content = ?, custom_widget_placeholder = ? WHERE custom_widget_id = ? LIMIT 1");
$stmt->bind_param('ssi', $custom_widget_content_update_form, $custom_widget_placeholder_update_form, $custom_widget_id_get);
$stmt->execute();
$stmt->close();
return true;
} else {
return $errors;
}
}

function remove_custom_widget(mysqli $db, int $custom_widget_id_form) {
$stmt = $db->prepare("DELETE FROM custom_widgets WHERE custom_widget_id = ? LIMIT 1");
$stmt->bind_param('i', $custom_widget_id_form);
$stmt->execute();
$stmt->close();
return true;
}
