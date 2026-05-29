<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//manage_profile_handler.php
//MMXXVI MSCRATCH

//Access only by users who are logged in.
if (user_is_logged_in() === false) {
header('Location:'. BASE_URL. 'blog');
exit();
}
//Access only by users who are logged in.

if (user_is_logged_in() === true) {
$profile_user_id = get_user_id();
}

$profile = get_profile_by_id($db, $profile_user_id);


if (isset($_POST['csrf_token'])) {
if (isset($_POST['update_profile'])) {
if (validate_token('update_profile', $_POST['csrf_token'])) {

$user_profile_location_form = '';
if (isset($_POST['user_profile_location_form'])) {
$user_profile_location_form = trim($_POST['user_profile_location_form']);
}

$user_profile_description_form = '';
if (isset($_POST['user_profile_description_form'])) {
$user_profile_description_form = trim($_POST['user_profile_description_form']);
}

$result = update_profile($db, $user_profile_location_form, $user_profile_description_form, $profile_user_id);
if ($result === true) {
$frontend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => $text_handlers['manage_profile_handler_successful_updated'],
'message_url'     => BASE_URL . 'manage_profile',
'message_button_text'  => $text_handlers['manage_profile_handler_btn_return'],
]);
frontend_system_message($frontend_system_message, $settings, $activated_theme);
}
} else {
$frontend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => $text_handlers['csrf_text'],
'message_url'     => BASE_URL . 'manage_profile',
'message_button_text'  => $text_handlers['csrf_btn'],
]);
frontend_system_message($frontend_system_message, $settings, $activated_theme);
}
}
}

if (isset($_POST['csrf_token'])) {
if (isset($_POST['upload_user_profile_image'])) {
if (validate_token('upload_user_profile_image', $_POST['csrf_token'])) {

$profile_image_file = '';
if (isset($_FILES['user_profile_image'])) {
$profile_image_file = $_FILES['user_profile_image'];
}

$result = upload_profile_image($db, $text_functions, $profile_image_file, $profile_user_id);
if ($result === true) {
$frontend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => $text_handlers['manage_profile_handler_successful_uploaded'],
'message_url'     => BASE_URL . 'manage_profile',
'message_button_text'  => $text_handlers['manage_profile_handler_btn_return'],
]);
frontend_system_message($frontend_system_message, $settings, $activated_theme);
} else {
$errors = $result;
}
} else {
$frontend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => $text_handlers['csrf_text'],
'message_url'     => BASE_URL . 'manage_profile',
'message_button_text'  => $text_handlers['csrf_btn'],
]);
frontend_system_message($frontend_system_message, $settings, $activated_theme);
}
}
}

render_page($db, $settings, $text_functions, $text_handlers, $text_templates, $text_fatal_error_message, 'frontend_templates', $activated_theme['theme_key'], 'layout', [
'template_name' => 'manage_profile_template',
'profile'  => $profile,
'errors'  => $errors ?? [],
]);
