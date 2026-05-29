<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//show_primary_navigation_handler.php
//MMXXVI MSCRATCH

//Administrator access only.
if (user_is_administrator() === false) {
header('Location:'. BASE_URL. 'login');
exit();
}

if (backend_access_is_verified() === false) {
header('Location:'. BASE_URL. 'backend_login');
exit();
}
//Administrator access only.

$primary_nav_elements = get_primary_nav($db);

if (isset($_POST['csrf_token'])) {
if (isset($_POST['remove_primary_nav_element'])) {
if (validate_token('remove_primary_nav_element', $_POST['csrf_token'])) {

$primary_navigation_element_id_form = '';
if (isset($_POST['primary_navigation_element_id_form'])) {
$primary_navigation_element_id_form = (INT) $_POST['primary_navigation_element_id_form'];
}

$result_remove_primary_nav_element = remove_primary_nav_element($db, $primary_navigation_element_id_form);
if ($result_remove_primary_nav_element === true) {
$backend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => $text_handlers['show_primary_navigation_handler_successful_removed'],
'message_url'     => BASE_URL . 'show_primary_navigation',
'message_button_text'  => $text_handlers['show_primary_navigation_handler_btn_return'],
]);
backend_system_message($backend_system_message, $settings);
}
} else {
$backend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => $text_handlers['csrf_text'],
'message_url'     => BASE_URL . 'show_primary_navigation',
'message_button_text'  => $text_handlers['csrf_btn'],
]);
backend_system_message($backend_system_message, $settings);
}
}
}

render_page($db, $settings, $text_functions, $text_handlers, $text_templates, $text_fatal_error_message, 'backend_templates', 'backend_theme', 'backend_layout', [
'template_name' => 'show_primary_navigation_template',
'primary_nav_elements' => $primary_nav_elements,
]);
