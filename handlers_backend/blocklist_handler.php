<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//blocklist_handler.php
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

$blocklist_usernames = get_blocklist_usernames($db);
$blocklist_names = get_blocklist_names($db);
$blocklist_emails = get_blocklist_emails($db);
$blocklist_domains = get_blocklist_domains($db);

if (isset($_POST['csrf_token'])) {
if (isset($_POST['submit_blocklist_command'])) {
if (validate_token('submit_blocklist_command', $_POST['csrf_token'])) {

$blocklist_command_form = '';
if (isset($_POST['blocklist_command_form'])) {
$blocklist_command_form = $_POST['blocklist_command_form'];
}

$result_save_remove_blocklist_entry = manage_blocklist($db, $text_functions, $blocklist_command_form);
if ($result_save_remove_blocklist_entry === true) {
$backend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => $text_handlers['blocklist_handler_command_successful_executed'],
'message_url'     => BASE_URL . 'blocklist',
'message_button_text'  => $text_handlers['blocklist_handler_btn_return'],
]);
backend_system_message($backend_system_message, $settings);
} else {
$errors = $result_save_remove_blocklist_entry;
}
} else {
$backend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => $text_handlers['csrf_text'],
'message_url'     => BASE_URL . 'blocklist',
'message_button_text'  => $text_handlers['csrf_btn'],
]);
backend_system_message($backend_system_message, $settings);
}
}
}

render_page($db, $settings, $text_functions, $text_handlers, $text_templates, $text_fatal_error_message, 'backend_templates', 'backend_theme', 'backend_layout', [
'template_name' => 'blocklist_template',
'blocklist_usernames' => $blocklist_usernames,
'blocklist_names' => $blocklist_names,
'blocklist_emails' => $blocklist_emails,
'blocklist_domains' => $blocklist_domains,
'errors' => $errors ?? [],
]);
