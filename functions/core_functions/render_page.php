<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//render_page.php
//MMXXVI MSCRATCH

function render_page(mysqli $db, array $settings, array $feature_flags, array $text_functions, array $text_handlers, array $text_templates, array $text_fatal_error_message, string $theme, string $layout, array $page_view = [], array $widgets = []) {

//extract variables from handler.
//EXTR_SKIP to prevent variables from being overwritten.

extract($page_view, EXTR_SKIP);

//load template and assign to $content.
//$content always contains the respective template from the directory.
//$page_view contains all variables required by the templates.

$is_widget_page = ($page_view['page_type'] ?? '') === 'widget_page';

if ($is_widget_page) {
$content = '';
} else {
ob_start();
$template_path = templates_path . "/$template_directory/{$template_name}.php";
$real_template_path = realpath($template_path);

if ($real_template_path && str_starts_with($real_template_path, realpath(templates_path)) && file_exists($real_template_path)) {
require $real_template_path;
$content = ob_get_clean();
} else {
$fatal_error_message = ([
'message_title' => $text_fatal_error_message['fatal_error_message_template_loading_failed_title'],
'message_additional_title' => $text_fatal_error_message['fatal_error_message_template_loading_failed_additional_title'],
'message_text' => $text_fatal_error_message['fatal_error_message_template_loading_failed_text'],
]);
fatal_error_message($fatal_error_message, $text_fatal_error_message);
}
}

//loading performance stats.

$performance_stats = render_performance_stats($text_functions);

//define placeholders.

$data = [
'content' => $content,
'page_title' => sanitize_1($settings['page_title']),
'page_description' => sanitize_1($settings['page_description']),
'page_keywords' => sanitize_1($settings['page_keywords']),
'footer_text' => sanitize_1($settings['footer_text']),
'home_nav_item' => home_nav_item($text_functions, $settings),
'contact_nav_item' => contact_nav_item($text_functions, $feature_flags),
'login_nav_item' => login_nav_item($text_functions),
'register_nav_item' => register_nav_item($text_functions, $feature_flags),
'profile_nav_item' => profile_nav_item($feature_flags),
'notifications_nav_item' => notifications_nav_item($db, $text_functions, $feature_flags),
'profile_settings_nav_item' => profile_settings_nav_item($text_functions, $feature_flags),
'dashboard_nav_item' => dashboard_nav_item($text_functions),
'dashboard_moderator_nav_item' => dashboard_moderator_nav_item($text_functions),
'logout_nav_item' => logout_nav_item($text_functions),
'script_name' => sanitize_1(SCRIPTNAME),
'full_script_name' => sanitize_1(FULL_SCRIPTNAME),
'script_version' => sanitize_1(VERSION),
'script_author' => sanitize_1(AUTHOR),
'base_url' => sanitize_1(BASE_URL),
'page_rendering_time' => $performance_stats['page_rendering_time'],
'memory_usage' => $performance_stats['memory_usage'],
'included_files' => $performance_stats['included_files'],
];

$data_roles = [];

if (user_is_administrator_or_moderator() === true) {
$data_roles['dashboard_nav_moderator'] = dashboard_nav_moderator($text_functions, $settings);
$data_roles['dashboard_nav_administrator'] = dashboard_nav_administrator($db, $text_functions, $feature_flags, $settings);
$data_roles['dashboard_nav'] = dashboard_nav($text_functions);
}

//load optional custom widgets and custom navs.

$custom_navs = render_custom_navs($db, $text_functions, $settings);

$custom_widgets = get_custom_widgets($db);

if ($custom_widgets !== false) {
foreach ($custom_widgets as $custom_widget) {
$widgets["widget_". sanitize_1($custom_widget['custom_widget_placeholder'])] = parse_bb_code_raw($db, $custom_widget['custom_widget_content'], $text_functions);
}
}

//merge optional arrays.

$data = array_merge($data, $widgets, $custom_navs, $data_roles);

//loading the layout and replacing the placeholders.

$layout_path = themes_path . "/$theme/{$layout}.php";
$real_layout = realpath($layout_path);

if ($real_layout && str_starts_with($real_layout, realpath(themes_path)) && file_exists($real_layout)) {
ob_start();
require $real_layout;
$layout_html = ob_get_clean();

//unset content to prevent the rendering of placeholders in the templates.

$content = $data['content'];
unset($data['content']);

foreach ($data as $key => $value) {
$layout_html = str_replace('{' . $key . '}', (string)$value, $layout_html);
}

$layout_html = str_replace('{content}', $content, $layout_html);

echo $layout_html;

} else {
$fatal_error_message = ([
'message_title' => $text_fatal_error_message['fatal_error_message_layout_loading_failed_title'],
'message_additional_title' => $text_fatal_error_message['fatal_error_message_layout_loading_failed_additional_title'],
'message_text'    => $text_fatal_error_message['fatal_error_message_layout_loading_failed_text'],
]);
fatal_error_message($fatal_error_message, $text_fatal_error_message);
}
}
