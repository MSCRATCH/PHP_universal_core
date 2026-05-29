<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//fatal_error_message.php
//MMXXVI MSCRATCH

$text_fatal_error_message = [

//includes\core_loader.php
'fatal_error_message_core_loader_title' => 'Core loader error',
'fatal_error_message_core_loader' => 'The core loader failed to load files, either the path is incorrect or the files are missing.',
//includes\core_loader.php

//includes\app_loader.php
'fatal_error_message_app_loader_title' => 'App loader error',
'fatal_error_message_app_loader' => 'The app loader failed to load files, either the path is incorrect or the files are missing.',
//includes\app_loader.php

//includes\lang_loader.php
'fatal_error_message_lang_loader_title' => 'Lang loader error',
'fatal_error_message_lang_loader' => 'The lang loader failed to load files, either the path is incorrect or the files are missing.',
//includes\lang_loader.php

//functions\core_functions\db.php
'fatal_error_message_db_connection_title' => 'Database connection failed',
'fatal_error_message_db_connection_failed' => 'A connection to the database could not be established.',
'fatal_error_message_no_config_title' => 'Config is missing',
'fatal_error_message_no_config_text' => 'The config is missing, the system is not functional in its current state.',
//core_functions\core_functions\db.php

//functions\core_functions\load_settings.php & manage_settings
'fatal_error_message_load_settings_title' => 'System settings loading failed',
'fatal_error_message_load_settings' => 'Loading the system settings failed.',
//core_functions\core_functions\load_settings.php & manage_settings

//functions\core_functions\render_page.php
'fatal_error_message_template_loading_failed_title' => 'Error loading template',
'fatal_error_message_template_loading_failed' => 'A critical error occurred while loading a template file.',
'fatal_error_message_layout_loading_failed_title' => 'Error loading layout',
'fatal_error_message_layout_loading_failed' => 'A critical error occurred while loading a layout file.',
//functions\core_functions\render_page.php

//functions\user_functions\manage_users.php
'fatal_error_message_manage_users_remove_title' => 'Attempt to remove an administrator detected',
'fatal_error_message_manage_users_remove' => 'An administrator cannot be removed.',
'fatal_error_message_manage_users_update_user_level_title' => 'Attempt detected to change an administrators user level.',
'fatal_error_message_manage_users_update_user_level' => 'The user level of an administrator cannot be changed.',
//functions\user_functions\manage_users.php

];

function fatal_error_message(array $fatal_error_message, array $text_fatal_error_message) {
if (! empty($fatal_error_message)) {
require templates_path . "/shared_templates/fatal_error_message_template.php";
exit();
}
}
