<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//load_activated_theme.php
//MMXXVI MSCRATCH

function load_activated_theme(mysqli $db) {

$active_theme = 1;

$theme = [
'theme_key'        => 'default_theme',
'theme_stylesheet' => 'default.css',
'layout_config'     => [],
'template_config'     => []
];

$stmt = $db->prepare("SELECT theme_key, theme_stylesheet FROM themes WHERE active_theme = ?");
$stmt->bind_param('i', $active_theme);
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows === 1) {
$stmt->bind_result($theme_key, $theme_stylesheet);
$stmt->fetch();
$stmt->close();
$theme['theme_key'] = $theme_key;
$theme['theme_stylesheet'] = $theme_stylesheet;
}

$layout_config_file = themes_path. "/{$theme['theme_key']}/layout_config.json";
if (file_exists($layout_config_file)) {
$layout_config = json_decode(file_get_contents($layout_config_file), true);
$theme['layout_config'] = $layout_config;
}

$template_config_file = themes_path. "/{$theme['theme_key']}/template_config.json";
if (file_exists($template_config_file)) {
$template_config = json_decode(file_get_contents($template_config_file), true);
$theme['template_config'] = $template_config;
}

return $theme;

}
