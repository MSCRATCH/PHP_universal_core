<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//dashboard_moderator_handler.php
//MMXXVI MSCRATCH

//Moderator access only.
if (user_is_moderator() === false) {
header('Location:'. BASE_URL. 'login');
exit();
}

if (backend_access_is_verified() === false) {
header('Location:'. BASE_URL. 'backend_login');
exit();
}
//Moderator access only.

render_page($db, $settings, $text_functions, $text_handlers, $text_templates, $text_fatal_error_message, 'backend_templates', 'backend_theme', 'backend_layout', [
'template_name' => 'dashboard_moderator_template',
]);
