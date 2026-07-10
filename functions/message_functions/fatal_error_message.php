<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//fatal_error_message.php
//MMXXVI MSCRATCH

$text_fatal_error_message = [

//generally, globally used
'fatal_error_message_incident_reference_title' => 'Incident reference:',
'fatal_error_message_missing_files_title' => 'Missing files',
//generally, globally used

//includes\core_loader.php
'fatal_error_message_core_loader_title' => 'Core loader error',
'fatal_error_message_core_loader_additional_title' => 'Critical file system exception',
'fatal_error_message_core_loader_text' => 'The core loader failed to load files, either the path is incorrect or the files are missing.',
//includes\core_loader.php

//includes\app_loader.php
'fatal_error_message_app_loader_title' => 'App loader error',
'fatal_error_message_app_loader_additional_title' => 'Critical file system exception',
'fatal_error_message_app_loader_text' => 'The app loader failed to load files, either the path is incorrect or the files are missing.',
//includes\app_loader.php

//includes\lang_loader.php
'fatal_error_message_lang_loader_title' => 'Lang loader error',
'fatal_error_message_lang_loader_additional_title' => 'Critical file system exception',
'fatal_error_message_lang_loader_text' => 'The lang loader failed to load files, either the path is incorrect or the files are missing.',
//includes\lang_loader.php

//functions\core_functions\register_exception_handler.php
'fatal_error_message_db_error_title' => 'Database error',
'fatal_error_message_db_error_additional_title' => 'Critical database exception',
'fatal_error_message_db_error_title_text' => 'A critical database error occurred. The request could not be completed and has been logged automatically.',

'fatal_error_message_system_error_title' => 'System error',
'fatal_error_message_system_error_additional_title' => 'Critical system exception',
'fatal_error_message_system_error_title_text' => 'A critical system error occurred. The request could not be completed and has been logged automatically.',
'fatal_error_message_fatal_shutdown_title' => 'Fatal shutdown',
'fatal_error_message_fatal_shutdown_additional_title' => 'Critical fatal shutdown',
'fatal_error_message_fatal_shutdown_title_text' => 'The system has crashed. It regrets everything.',
//functions\core_functions\register_exception_handler.php

//functions\core_functions\db.php
'fatal_error_message_no_config_title' => 'Config is missing',
'fatal_error_message_no_config_additional_title' => 'Critical file system exception',
'fatal_error_message_no_config_text' => 'The config is missing, the system is not functional in its current state.',
//core_functions\core_functions\db.php

//functions\core_functions\check_system_requirements.php
'fatal_error_message_system_requirement_php_title' => 'Incompatible PHP version',
'fatal_error_message_system_requirement_php_additional_title' => 'Critical incompatibility identified',
'fatal_error_message_system_requirement_php_text' => 'The PHP version you are using is incompatible with PHP universal core. PHP universal core supports PHP 8.0 to 8.5.',
'fatal_error_message_system_requirement_mysqli_title' => 'MySQLi is disabled',
'fatal_error_message_system_requirement_mysqli_additional_title' => 'Critical incompatibility identified',
'fatal_error_message_system_requirement_mysqli_text' => 'Either your web server does not support MySQLi, or it has been disabled. PHP universal core uses MySQLi as its database API and will not function otherwise.',
'fatal_error_message_system_requirement_fileinfo_title' => 'Fileinfo is disabled',
'fatal_error_message_system_requirement_fileinfo_additional_title' => 'Critical incompatibility identified',
'fatal_error_message_system_requirement_fileinfo_text' => 'Either your web server does not support fileinfo, or it has been disabled. PHP universal core requires fileinfo.',
//core_functions\core_functions\check_system_requirements.php


//functions\core_functions\load_settings.php & manage_settings
'fatal_error_message_load_settings_title' => 'System settings loading failed',
'fatal_error_message_load_settings_additional_title' => 'Critical system settings exception',
'fatal_error_message_load_settings_text' => 'The system settings could not be loaded.',
//core_functions\core_functions\load_settings.php & manage_settings

//functions\core_functions\load_feature_flags.php
'fatal_error_message_load_feature_flags_title' => 'System feature flags loading failed',
'fatal_error_message_load_feature_flags_additional_title' => 'Critical system feature flags exception',
'fatal_error_message_load_feature_flags_text' => 'The system feature flags could not be loaded.',
//core_functions\core_functions\load_feature_flags.php

//functions\core_functions\render_page.php
'fatal_error_message_template_loading_failed_title' => 'Error loading template',
'fatal_error_message_template_loading_failed_additional_title' => 'Critical file system exception',
'fatal_error_message_template_loading_failed_text' => 'A critical error occurred while loading a template file.',

'fatal_error_message_layout_loading_failed_title' => 'Error loading layout',
'fatal_error_message_layout_loading_failed_additional_title' => 'Critical file system exception',
'fatal_error_message_layout_loading_failed_text' => 'A critical error occurred while loading a layout file.',
//functions\core_functions\render_page.php

//functions\user_functions\manage_users.php
'fatal_error_message_remove_administrator_title' => 'Attempt to remove an administrator detected',
'fatal_error_message_remove_administrator_additional_title' => 'Security policy violation',
'fatal_error_message_remove_administrator_text' => 'An administrator cannot be removed.',
'fatal_error_message_update_administrator_title' => 'Attempt detected to change an administrators user level',
'fatal_error_message_update_administrator_additional_title' => 'Security policy violation',
'fatal_error_message_update_administrator_text' => 'The user level of an administrator cannot be changed.',
//functions\user_functions\manage_users.php

];

function fatal_error_message(array $fatal_error_message, array $text_fatal_error_message) {
if (! empty($fatal_error_message)) {
//two buffers are open, if an error occurs in the templates, the buffer needs to be cleared.
while (ob_get_level() > 0) {
ob_end_clean();
}
require templates_path . "/shared_templates/fatal_error_message_template.php";
exit();
}
}
