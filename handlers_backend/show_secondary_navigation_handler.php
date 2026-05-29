<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//show_secondary_navigation_handler.php
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

$secondary_nav_elements = get_secondary_nav($db);

if (isset($_POST['csrf_token'])) {
if (isset($_POST['remove_secondary_nav_element'])) {
if (validate_token('remove_secondary_nav_element', $_POST['csrf_token'])) {

$secondary_navigation_element_id_form = '';
if (isset($_POST['secondary_navigation_element_id_form'])) {
$secondary_navigation_element_id_form = (INT) $_POST['secondary_navigation_element_id_form'];
}

$result_remove_secondary_nav_element = remove_secondary_nav_element($db, $secondary_navigation_element_id_form);
if ($result_remove_secondary_nav_element === true) {
$backend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => $text_handlers['show_secondary_navigation_handler_successful_removed'],
'message_url'     => BASE_URL . 'show_secondary_navigation',
'message_button_text'  => $text_handlers['show_secondary_navigation_handler_btn_return'],
]);
backend_system_message($backend_system_message, $settings);
}
} else {
$backend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => $text_handlers['csrf_text'],
'message_url'     => BASE_URL . 'show_secondary_navigation',
'message_button_text'  => $text_handlers['csrf_btn'],
]);
backend_system_message($backend_system_message, $settings);
}
}
}

render_page($db, $settings, $text_functions, $text_handlers, $text_templates, $text_fatal_error_message, 'backend_templates', 'backend_theme', 'backend_layout', [
'template_name' => 'show_secondary_navigation_template',
'secondary_nav_elements' => $secondary_nav_elements,
]);
