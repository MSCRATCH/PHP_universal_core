<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//manage_themes.php
//MMXXVI MSCRATCH

function check_if_theme_is_already_active(mysqli $db) {
$active_theme = 1;
$stmt = $db->prepare("SELECT theme_id FROM themes WHERE active_theme = ?");
$stmt->bind_param('i', $active_theme);
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows === 1) {
return true;
} else {
return false;
}
}

function get_themes(mysqli $db) {
$stmt = $db->query("SELECT theme_id, theme_key, theme_name, theme_author, theme_version, active_theme FROM themes");
$themes = $stmt->fetch_all(MYSQLI_ASSOC);
$stmt->free();
if (! empty($themes)) {
return $themes;
} else {
return false;
}
}

function save_new_theme(mysqli $db, array $json, string $theme_key) {
$stmt = $db->prepare("INSERT INTO themes(theme_key, theme_name, theme_author, theme_version, theme_stylesheet) VALUES(?, ?, ?, ?, ?)");
$stmt->bind_param('sssss', $theme_key, $json['theme_name'], $json['theme_author'], $json['theme_version'], $json['theme_stylesheet']);
$stmt->execute();
$stmt->close();
}

function activate_theme(mysqli $db, int $theme_id_form) {
$theme_is_already_active = check_if_theme_is_already_active($db);
if ($theme_is_already_active === false) {
$active_theme = 1;
$stmt = $db->prepare("UPDATE themes SET active_theme = ? WHERE theme_id = ? LIMIT 1");
$stmt->bind_param('ii', $active_theme, $theme_id_form);
$stmt->execute();
$stmt->close();
return true;
} else {
return false;
}
}

function deactivate_theme(mysqli $db, int $theme_id_form) {
$active_theme = 0;
$stmt = $db->prepare("UPDATE themes SET active_theme = ? WHERE theme_id = ? LIMIT 1");
$stmt->bind_param('ii', $active_theme, $theme_id_form);
$stmt->execute();
$stmt->close();
return true;
}

function search_for_themes(mysqli $db) {

$themes_path = themes_path;

$dirs = scandir($themes_path);

$file_system_themes = array();

foreach ($dirs as $dir) {

$dir = trim($dir);

if ($dir === "backend_theme") {
continue;
}

if ($dir === "default_theme") {
continue;
}

$full_path = $themes_path . '/' . $dir;

if (! is_dir($full_path)) {
continue;
}

if (! file_exists($full_path . '/layout.php')) {
continue;
}

$manifest = $full_path . '/theme.json';

if (! file_exists($manifest)) {
continue;
}

$json = json_decode(file_get_contents($manifest),true);

if (! isset($json['theme_name']) or ! isset($json['theme_author']) or ! isset($json['theme_version']) or ! isset($json['theme_stylesheet'])) {
continue;
}

$theme_key = $dir;

$file_system_themes[] = $theme_key;

$stmt = $db->prepare("SELECT theme_id FROM themes WHERE theme_key = ?");
$stmt->bind_param('s', $theme_key);
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows !== 1) {
save_new_theme($db, $json, $theme_key);
}
$stmt->close();
}

if (empty($file_system_themes)) {
return;
}

$stmt = $db->query("SELECT theme_key from themes");
$db_theme_keys = [];

while ($row = $stmt->fetch_assoc()) {
$db_theme_keys[] = $row['theme_key'];
}

foreach ($db_theme_keys as $db_theme_key) {
if (! in_array($db_theme_key, $file_system_themes, true)) {
$stmt = $db->prepare("DELETE FROM themes WHERE theme_key = ?");
$stmt->bind_param('s', $db_theme_key);
$stmt->execute();
$stmt->close();
}
}

}
