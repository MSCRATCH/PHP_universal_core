<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//render_page.php
//MMXXVI MSCRATCH

function render_page(mysqli $db, array $settings, array $text_functions, array $text_handlers, array $text_templates, array $text_fatal_error_message, string $area, string $theme, string $layout, array $page_view = [], array $widgets = []) {

ob_start();

//extract variables from handler.
//EXTR_SKIP to prevent variables from being overwritten.

extract($page_view, EXTR_SKIP);

//load template and assign to $content.
//$content always contains the respective template from the directory.
//$page_view contains all variables required by the templates.

$template_path = templates_path . "/$area/{$template_name}.php";
$real_template_path = realpath($template_path);

if ($real_template_path && str_starts_with($real_template_path, realpath(templates_path)) && file_exists($real_template_path)) {
require $real_template_path;
} else {
$fatal_error_message = ([
'message_title' => $text_fatal_error_message['fatal_error_message_template_loading_failed_title'],
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => $text_fatal_error_message['fatal_error_message_template_loading_failed'],
'view_missing_files'     =>  'yes',
'missing_files'     =>  $template_path,
]);
fatal_error_message($fatal_error_message, $text_fatal_error_message);
}

$content = ob_get_clean();

//loading performance stats.

$performance_stats = render_performance_stats($text_functions);

//define placeholders.

$data = [
'content' => $content,
'page_title' => sanitize_1($settings['page_title']),
'page_description' => sanitize_1($settings['page_description']),
'page_keywords' => sanitize_1($settings['page_keywords']),
'footer_text' => sanitize_1($settings['footer_text']),
'primary_nav' => primary_nav($db),
'secondary_nav' => secondary_nav($db),
'home_nav_item' => home_nav_item($text_functions),
'contact_nav_item' => contact_nav_item($text_functions),
'login_nav_item' => login_nav_item($text_functions),
'register_nav_item' => register_nav_item($text_functions, $settings),
'profile_nav_item' => profile_nav_item(),
'user_activity_log_nav_item' => user_activity_log_nav_item($db, $text_functions),
'profile_settings_nav_item' => profile_settings_nav_item($text_functions),
'dashboard_nav_item' => dashboard_nav_item($text_functions),
'dashboard_moderator_nav_item' => dashboard_moderator_nav_item($text_functions),
'logout_nav_item' => logout_nav_item($text_functions),
'dashboard_nav_moderator' => dashboard_nav_moderator($text_functions),
'dashboard_nav_administrator' => dashboard_nav_administrator($db, $text_functions),
'dashboard_nav' => dashboard_nav($text_functions),
'script_name' => sanitize_1(SCRIPTNAME),
'full_script_name' => sanitize_1(FULL_SCRIPTNAME),
'script_version' => sanitize_1(VERSION),
'script_author' => sanitize_1(AUTHOR),
'base_url' => sanitize_1(BASE_URL),
'page_rendering_time' => $performance_stats['page_rendering_time'],
'memory_usage' => $performance_stats['memory_usage'],
'included_files' => $performance_stats['included_files'],
];

//merge optional widget array.

$data = array_merge($data, $widgets);

//loading the layout and replacing the placeholders.

$layout_path = themes_path . "/$theme/{$layout}.php";
$real_layout = realpath($layout_path);

if ($real_layout && str_starts_with($real_layout, realpath(themes_path)) && file_exists($real_layout)) {
ob_start();
require $real_layout;
$layout_html = ob_get_clean();

foreach ($data as $key => $value) {
$layout_html = str_replace('{' . $key . '}', (string)$value, $layout_html);
}
echo $layout_html;
} else {
$fatal_error_message = ([
'message_title' => $text_fatal_error_message['fatal_error_message_layout_loading_failed_title'],
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => $text_fatal_error_message['fatal_error_message_layout_loading_failed'],
'view_missing_files'     =>  'yes',
'missing_files'     =>  $layout_path,
]);
fatal_error_message($fatal_error_message, $text_fatal_error_message);
}
}
