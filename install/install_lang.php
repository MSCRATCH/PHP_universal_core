<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//install_lang.php
//MMXXVI MSCRATCH

$text_install = [

//global for all install_page_templates
'install_page_btn_next_step' => 'Next Step',
'install_page_btn_previous_step' => 'Previous Step',
'install_page_installation_routine' => 'installation routine',
'install_page_installer_version' => 'installer version',
'install_page_programmed_by' => 'programmed by',
'install_page_error_message' => 'An error has occurred',
'install_page_config_file_is_missing.' => 'A critical error has occurred, the config file does not exist.',
//global for all install_page_templates

//install_page_1
'install_page_1_title' => 'Step 1. Start installation',
'install_page_1_text_1' => 'Welcome to the installation routine of the PHPUC CMS. I am pleased that you have chosen to use this system. PHPUC is designed to be lightweight, maintainable, and extensible, featuring a clear and straightforward codebase without unnecessary complexity. It is intended for users who wish to operate a simple, secure, and reliable website with blog functionality and user interaction features.',
'install_page_1_text_2' => 'PHP universal core is licensed under the Creative Commons Attribution 4.0 International License CC BY 4.0.',
'install_page_1_text_3' => 'PHP universal core, developed by MSCRATCH.',
'install_page_1_text_4' => 'PHP installer agent, developed by MSCRATCH.',
'install_page_1_text_5' => 'All rights reserved. Attribution required. 2026.',
'install_page_1_text_6' => 'The use of this software is at your own risk. The author assumes no liability for any damages resulting from its use.',
'install_page_1_text_7' => 'By proceeding with the installation, you acknowledge and agree to the terms and conditions set out above.',
'install_page_1_text_8' => 'Please follow the steps below to complete the installation.',
'install_page_1_btn_start_installation' => 'Start installation',
//install_page_1

//install_page_2
'install_page_2_title' => 'Step 2. Check compatibility',
'install_page_2_compatible' => 'Compatible:',
'install_page_2_incompatible' => 'Incompatible:',
'install_page_2_php_version_compatible' => 'The PHP version of your web server is compatible.',
'install_page_2_php_version_incompatible' => 'The PHP version of your web server is incompatible. PHPUC supports PHP versions 8.1, 8.2, 8,3, 8.4 & 8.5.',
'install_page_2_mysqli_installed' => 'The mySQLi extension is installed and enabled.',
'install_page_2_mysqli_not_installed' => 'The mySQLi extension is not installed. PHPUC requires mySQLi. It is either not installed or not enabled on your web server. You must enable or install mySQLi to proceed.',
'install_page_2_fileinfo_enabled' => 'The fileinfo extension is installed and enabled.',
'install_page_2_fileinfo_not_enabled' => 'The fileinfo extension is not installed. PHPUC requires fileinfo. It is either not installed or not enabled on your web server. You must enable or install fileinfo to proceed.',
//install_page_2

//install_page_3
'install_page_3_title' => 'Step 3. Verify whether all system folders exist',
'install_page_3_missing_folder' => 'Missing folder:',
'install_page_3_no_missing_folder' => 'All critical system folders are present, verification successful.',
//install_page_3

//install_page_4
'install_page_4_title' => 'Step 4. Check if all files are complete',
'install_page_4_missing_file' => 'Missing file:',
'install_page_4_no_missing_file' => 'All relevant system files are present, verification successful.',
//install_page_4

//install_page_5
'install_page_5_title' => 'Step 5. Check if necessary folders are writable',
'install_page_5_non_writable_folder' => 'Non writable folder:',
'install_page_5_non_writable_folder_text' => 'Set the chmod permissions of the affected folder to 775.',
'install_page_5_writable' => 'All folders that need to be writable are writable, verification successful.',
//install_page_5

//install_page_6
'install_page_6_title' => 'Step 6. Create configuration file',
'install_page_6_label_servername' => 'Servername',
'install_page_6_label_username' => 'Username',
'install_page_6_label_password' => 'Password',
'install_page_6_label_database_name' => 'Database name',
'install_page_6_btn' => 'Create config',
'install_page_6_config_created' => 'The configuration file has been successfully created.',
//install_page_6

//install_page_7
'install_page_7_title' => 'Step 7. Create the necessary SQL tables',
'install_page_7_sql_tables_not_created' => 'In this area, the necessary tables are written to the database.',
'install_page_7_sql_tables_successfully_created' => 'The SQL tables have been successfully created.',
'install_page_7_btn' => 'Create tables',
//install_page_7

//install_page_8
'install_page_8_title' => 'Step 8. Create administrator account',
'install_page_8_label_username' => 'Username',
'install_page_8_label_password' => 'Password',
'install_page_8_label_password_comparison' => 'Password comparison',
'install_page_8_label_e_mail_address' => 'E-mail address',
'install_page_8_administrator_successfully_registered' => 'The administrator account has been successfully created.',
'install_page_8_btn' => 'Create administrator account ',
//install_page_8

//install_page_9
'install_page_9_title' => 'Step 9. Create email config',
'install_page_9_label_smtp_host' => 'Smtp host',
'install_page_9_label_smtp_port' => 'Smtp port',
'install_page_9_label_smtp_user' => 'Smtp user',
'install_page_9_label_smtp_password' => 'Smtp password',
'install_page_9_label_smtp_encryption' => 'Smtp encryption',
'install_page_9_label_from_email' => 'Email',
'install_page_9_label_from_name' => 'Name',
'install_page_9_btn' => 'Create email config',
'install_page_9_email_config_successfully_created' => 'Your email configuration has been successfully saved.',
//install_page_9

//install_page_10
'install_page_10_title' => 'Step 10. Save settings',
'install_page_10_settings_successfully_saved' => 'The settings have been successfully saved.',
'install_page_10_btn' => 'Save settings',
//install_page_10

//install_page_11
'install_page_11_title' => 'Step 10. Complete installation',
'install_page_11_text_1' => 'PHPUC has been successfully installed. Clicking the button removes the installation file from the main directory and completes the installation. Be sure to manually remove the installation directory.',
'install_page_11_text_2' => 'Verify that the installation file has been removed from the main directory. Failure to do so may result in serious security vulnerabilities.',
'install_page_11_btn' => 'Complete the installation',
//install_page_11

//install/install_functions\manage_install.php
'message_register_administrator_no_username' => 'No username was provided.',
'message_register_administrator_no_password' => 'No password was provided.',
'message_register_administrator_no_password_confirmation' => 'No password confirmation was provided.',
'message_register_administrator_no_email_address' => 'No email address was provided.',
'message_register_administrator_username_length' => 'The username cannot be longer than 30 characters.',
'message_register_administrator_username_short' => 'The username must contain a minimum of 5 characters.',
'message_register_administrator_username_special_characters' => 'The username may only contain letters and numbers.',
'message_register_administrator_password_length' => 'The password cannot be longer than 30 characters.',
'message_register_administrator_password_short' => 'The password must contain a minimum of 8 characters.',
'message_register_administrator_password_no_match' => 'The passwords entered do not match.',
'message_register_administrator_email_address_invalid' => 'The email address provided is invalid.',
'message_register_administrator_critical_error' => 'Something went wrong. Please try again later.',

'message_create_config_server_name_missing' => 'The server name is missing.',
'message_create_config_username_missing' => 'The username name is missing.',
'message_create_config_db_password_missing' => 'The database password is missing.',
'message_create_config_db_name_missing' => 'The database name is missing.',

'message_insert_sql_tables_sql_file_missing' => 'The SQL file is missing. Check the install directory and verify that the file install.sql is present in the main directory.',

'message_check_email_connection_invalid_smtp' => 'Invalid SMTP encryption type.',
'message_save_email_config_no_host' => 'The hostname is missing.',
'message_save_email_config_no_port' => 'The port is missing.',
'message_save_email_config_no_user' => 'The email address is missing.',
'message_save_email_config_no_password' => 'The password is missing.',
'message_save_email_config_no_encryption' => 'The encryption is missing.',
'message_save_email_config_no_from_email' => 'The email address is missing.',
'message_save_email_config_no_from_name' => 'The name is missing.',

'message_save_settings_no_settings' => 'No settings have been submitted.',
'message_save_settings_invalid_key' => 'You have submitted an invalid setting key.',
'message_save_settings_no_value' => 'You have not provided a value for a setting.',
'message_save_settings_no_key' => 'You have not provided a key for a setting.',
//install/install_functions\manage_install.php

];
