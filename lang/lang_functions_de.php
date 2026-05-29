<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//lang_functions_de.php
//MMXXVI MSCRATCH

$text_functions = [

//Available globally for all functions
'csrf_text' => 'Ihre Sitzung wurde aus Sicherheitsgründen beendet.',
'csrf_btn' => 'Zurück',
//Available globally for all functions

//functions\helper_functions\parse_bb_code.php
'parse_bb_code_no_file' => 'Beim Laden der Datei ist ein Fehler aufgetreten.',
//functions\helper_functions\parse_bb_code.php

//functions\helper_functions\render_performance_stats.php
'page_rendering_time' => 'Diese Seite wurde generiert in:',
'memory_usage' => 'Speichernutzung während der Seitengenerierung:',
'included_files' => 'Anzahl geladener Dateien:',
//functions\helper_functions\render_performance_stats.php

//functions\helper_functions\cct.php
'cct_title' => 'Hinweis zur Verwendung von Cookies.',
'cct_text' => 'Diese Website verwendet Cookies und protokolliert Aktivitäten wie IP-Adressen, um die Sicherheit aller Benutzer zu gewährleisten. Durch den Besuch dieser Website stimmen Sie dem zu.',
'cct_btn' => 'Akzeptieren',
//functions\helper_functions\cct.php

//functions\helper_functions\manage_emails.php
'message_manage_emails_spam_trap' => 'Ihre Anfrage ist ungültig.',
'message_manage_emails_no_host' => 'Der Hostname fehlt.',
'message_manage_emails_no_port' => 'Der Port fehlt.',
'message_manage_emails_no_user' => 'Die E-Mail-Adresse fehlt.',
'message_manage_emails_no_password' => 'Das Passwort fehlt.',
'message_manage_emails_no_encryption' => 'Die Verschlüsselung fehlt.',
'message_manage_emails_no_from_email' => 'Die E-Mail-Adresse fehlt.',
'message_manage_emails_no_from_name' => 'Der Name fehlt.',
'message_manage_emails_connection_failed' => 'Die Zugangsdaten sind falsch. Die Verbindung ist fehlgeschlagen.',
'message_manage_emails_no_contact_form_email' => 'Die E-Mail-Adresse fehlt.',
'message_manage_emails_no_contact_form_name' => 'Der Name fehlt.',
'message_manage_emails_no_contact_form_text' => 'Die Nachricht fehlt.',
'message_manage_emails_no_contact_form_subject' => 'Der Betreff der E-Mail fehlt.',
'message_manage_emails_contact_form_email_address_invalid' => 'Die eingegebene E-Mail-Adresse ist ungültig.',
'message_manage_emails_contact_form_security_question_invalid' => 'Die Sicherheitsfrage ist ungültig.',
'message_manage_emails_no_security_question' => 'Die Sicherheitsfrage fehlt.',
//functions\helper_functions\manage_emails.php

//functions\helper_functions\pagination.php
'pagination_of' => 'von',
'pagination_page' => 'Seite',
'pagination_previous_page' => 'Vorherige Seite',
'pagination_next_page' => 'Nächste Seite',
//functions\helper_functions\pagination.php

//functions\file_functions\upload_profile_image.php
'message_profile_image_invalid_size' => 'Das Profilbild konnte aufgrund einer ungültigen Bildgröße nicht hochgeladen werden.',
'message_profile_image_invalid_extension' => 'Das Profilbild konnte aufgrund eines ungültigen Dateityps nicht hochgeladen werden. Es sind nur JPG-, JPEG- oder PNG-Dateien erlaubt.',
'message_profile_image_invalid_type' => 'Das Profilbild konnte aufgrund eines ungültigen Dateityps nicht hochgeladen werden.',
'message_profile_image_invalid_dimension' => 'Das Profilbild konnte nicht hochgeladen werden, da es genau 500 x 500 Pixel groß sein muss.',
'message_profile_image_no_file' => 'Das Profilbild konnte nicht hochgeladen werden, da keine Datei ausgewählt wurde.',
//functions\file_functions\upload_profile_image.php

//functions\file_functions\serve_uploaded_file.php
'message_serve_uploaded_file_no_file' => 'Die angeforderte Datei konnte nicht gefunden werden.',
'message_serve_uploaded_file_btn' => 'Zurück zur Startseite',
//functions\file_functions\serve_uploaded_file.php

//functions\file_functions\serve_profile_images.php
'message_serve_profile_images_no_profile_image' => 'Ein solches Profilbild existiert nicht.',
'message_serve_profile_images_profile_btn' => 'Zurück zur Startseite',
//functions\file_functions\serve_profile_images.php

//functions\file_functions\clearing_request_log.php
'message_request_log_save_failed' => 'Im Anfrageprotokoll ist ein Fehler aufgetreten. Das System löscht Protokolle nach 1000 Einträgen automatisch aus der Datenbank und speichert sie in Textdateien. Bitte stellen Sie sicher, dass das Logs-Verzeichnis existiert und beschreibbar ist.',
'message_request_log_remove_failed' => 'Es gab ein Problem mit dem Anfrageprotokoll. Das System konnte das Datenbankprotokoll nicht löschen.',
//functions\file_functions\clearing_request_log.php

//functions\file_functions\upload_files.php
'message_upload_files_no_file' => 'Es wurde keine Datei bereitgestellt.',
'message_upload_files_no_file_title' => 'Es wurde kein Dateititel angegeben.',
'message_upload_files_no_file_description' => 'Es wurde keine Dateibeschreibung angegeben.',
'message_upload_files_invalid_extension' => 'Ungültige Dateiendung.',
'message_upload_files_invalid_size' => 'Ungültige Dateigröße, die Datei darf maximal 100 MB groß sein.',
'message_upload_files_invalid_type' => 'Ungültige Datei.',
//functions\file_functions\upload_files.php

//functions\auth_functions\login.php
'message_login_no_username' => 'Es wurde kein Benutzername angegeben.',
'message_login_no_password' => 'Es wurde kein Passwort angegeben.',
'message_login_failed' => 'Ihre Anmeldung war nicht erfolgreich. Bitte überprüfen Sie Ihre Zugangsdaten und versuchen Sie es erneut.',
'message_login_too_many_attempts' => 'Sie haben die maximale Anzahl an Anmeldeversuchen überschritten. Bitte warten Sie, bevor Sie es erneut versuchen.',
//functions\auth_functions\login.php

//functions\auth_functions\register.php
'message_register_no_username' => 'Es wurde kein Benutzername angegeben.',
'message_register_no_password' => 'Es wurde kein Passwort angegeben.',
'message_register_no_password_confirmation' => 'Es wurde keine Passwortbestätigung angegeben.',
'message_register_no_email_address' => 'Es wurde keine E-Mail-Adresse angegeben.',
'message_register_no_security_question' => 'Es wurde keine Antwort auf die Sicherheitsfrage angegeben.',
'message_register_username_length' => 'Der Benutzername darf nicht länger als 30 Zeichen sein.',
'message_register_username_short' => 'Der Benutzername muss mindestens 5 Zeichen enthalten.',
'message_register_username_special_characters' => 'Der Benutzername darf nur Buchstaben und Zahlen enthalten.',
'message_register_password_length' => 'Das Passwort darf nicht länger als 30 Zeichen sein.',
'message_register_password_short' => 'Das Passwort muss mindestens 8 Zeichen enthalten.',
'message_register_password_no_match' => 'Die eingegebenen Passwörter stimmen nicht überein.',
'message_register_email_address_invalid' => 'Die angegebene E-Mail-Adresse ist ungültig.',
'message_register_security_question_invalid' => 'Die Antwort auf die Sicherheitsfrage ist ungültig.',
'message_register_username_already_taken' => 'Der angegebene Benutzername ist nicht verfügbar. Versuchen Sie einen anderen.',
'message_register_email_address_already_taken' => 'Die angegebene E-Mail-Adresse ist nicht verfügbar. Versuchen Sie eine andere.',
'message_register_critical_error' => 'Etwas ist schiefgelaufen. Bitte versuchen Sie es später erneut.',
//functions\auth_functions\register.php

//functions\security_functions\check_blocklist.php
'message_blocklist_invalid_email_name' => 'Die angegebene E-Mail-Adresse verwendet ein eingeschränktes Präfix. Kontaktieren Sie den Administrator für Unterstützung.',
'message_blocklist_invalid_domain_name' => 'Die von Ihnen verwendete E-Mail-Domain ist von der Registrierung ausgeschlossen. Kontaktieren Sie den Administrator für Unterstützung.',
'message_blocklist_invalid_email_address' => 'Die angegebene E-Mail-Adresse ist von der Registrierung ausgeschlossen. Kontaktieren Sie den Administrator für Unterstützung.',
'message_blocklist_invalid_username' => 'Der angegebene Benutzername ist von der Registrierung ausgeschlossen. Kontaktieren Sie den Administrator für Unterstützung.',
//functions\security_functions\check_blocklist.php

//functions\auth_functions\backend_login.php
'message_backend_login_too_many_attempts' => 'Sie haben die maximale Anzahl an Anmeldeversuchen überschritten. Bitte warten Sie, bevor Sie es erneut versuchen.',
'message_backend_login_no_username' => 'Es wurde kein Benutzername angegeben.',
'message_backend_login_no_password' => 'Es wurde kein Passwort angegeben.',
'message_backend_login_failed' => 'Ihre Anmeldung war nicht erfolgreich. Bitte überprüfen Sie Ihre Zugangsdaten und versuchen Sie es erneut.',
//functions\auth_functions\backend_login.php

//functions\content_functions\manage_comments.php
'message_manage_comments_no_comment' => 'Es wurde kein Kommentar eingegeben.',
'message_manage_comments_too_long' => 'Der eingegebene Kommentar ist zu lang. Kommentare sind auf 500 Zeichen begrenzt.',
'message_manage_comments_contains_link' => 'Kommentare dürfen keine Links enthalten.',
//functions\content_functions\manage_comments.php

//functions\content_functions\manage_settings.php
'message_settings_no_settings' => 'Es wurden keine Einstellungen übermittelt.',
'message_settings_invalid_key' => 'Sie haben einen ungültigen Einstellungsschlüssel übermittelt.',
'message_settings_no_value' => 'Sie haben keinen Wert für die Einstellung angegeben.',
'message_settings_no_key' => 'Sie haben keinen Schlüssel für die Einstellung angegeben.',
'message_settings_invalid_register_value' => 'Nur yes oder no werden als gültige Parameter akzeptiert.',
'message_settings_invalid_language_value' => 'Nur en oder de werden als gültige Parameter akzeptiert.',
'message_settings_invalid_maintenance_mode_enabled_value' => 'Nur yes oder no werden als gültige Parameter akzeptiert.',
'message_settings_invalid_disable_contact_form_value' => 'Nur yes oder no werden als gültige Parameter akzeptiert.',
'message_settings_stmt_failed' => 'Etwas ist schiefgelaufen. Bitte versuchen Sie es später erneut.',
//functions\content_functions\manage_settings.php

//functions\content_functions\manage_blocklist.php
'message_manage_blocklist_no_value' => 'Es wurden keine Befehle übermittelt.',
'message_manage_blocklist_invalid_format' => 'Ungültiges Befehlsformat. Ein gültiger Befehl muss aus einem Präfix und einem durch einen Unterstrich getrennten Wert bestehen.',
'message_manage_blocklist_invalid_command' => 'Ungültiger Befehl. Nur save_ und remove_ Präfixe sind erlaubt.',
'message_manage_blocklist_invalid_type' => 'Ungültiger Typ. Zulässige Typen sind username_value, name_value, domain_value, email_value.',
'message_manage_blocklist_invalid_value_username' => 'Ein gültiger Benutzername darf nur aus alphabetischen Zeichen bestehen.',
'message_manage_blocklist_invalid_value_name' => 'Ein gültiger Name darf nur aus alphabetischen Zeichen bestehen.',
'message_manage_blocklist_invalid_value_email' => 'Eine E-Mail-Adresse muss dem Standardformat name@domain.tld entsprechen.',
'message_manage_blocklist_invalid_value_domain' => 'Ein Domainname muss dem Standardformat domain.tld entsprechen.',
'message_manage_blocklist_no_existing_value' => 'Der mit dem remove_-Befehl verbundene Wert kann keinem Datensatz zugeordnet werden.',
'message_manage_blocklist_remove_stmt_failed' => 'Etwas ist schiefgelaufen. Bitte versuchen Sie es später erneut.',
'message_manage_blocklist_save_stmt_failed' => 'Etwas ist schiefgelaufen. Bitte versuchen Sie es später erneut.',
//functions\content_functions\manage_blocklist.php

//functions\content_functions\manage_custom_pages.php
'message_manage_custom_pages_no_name' => 'Es wurde kein Name angegeben.',
'message_manage_custom_pages_invalid_url' => 'Die angegebene URL ist für das System reserviert und daher nicht verfügbar.',
'message_manage_custom_pages_no_title' => 'Es wurde kein Titel angegeben.',
'message_manage_custom_pages_no_content' => 'Es wurde kein Inhalt angegeben.',
//functions\content_functions\manage_custom_pages.php

//functions\content_functions\manage_navigations.php
'message_manage_navigations_no_url' => 'Es wurde keine URL angegeben.',
'message_manage_navigations_invalid_url' => 'Die angegebene URL ist für das System reserviert und daher nicht verfügbar.',
'message_manage_navigations_no_name' => 'Es wurde kein Name angegeben.',
'message_manage_navigations_no_order_value' => 'Es wurde keine Nummer für die Reihenfolge angegeben.',
'message_manage_navigations_invalid_order_value' => 'Der Wert ist nicht numerisch.',
//functions\content_functions\manage_navigations.php

//functions\content_functions\manage_blog.php
'message_manage_blog_no_title' => 'Es wurde kein Titel angegeben.',
'message_manage_blog_no_preview' => 'Es wurde keine Vorschau angegeben.',
'message_manage_blog_no_content' => 'Es wurde kein Inhalt angegeben.',
//functions\content_functions\manage_blog.php

//functions\content_functions\manage_navigations.php
'home_nav_item' => 'Startseite',
'contact_nav_item' => 'Kontakt',
'blog_nav_item' => 'Blog',
'login_nav_item' => 'Anmelden',
'register_nav_item' => 'Registrieren',
'user_activity_log_nav_item' => 'Aktivitätsprotokoll',
'profile_settings_nav_item' => 'Profileinstellungen',
'dashboard_nav_item' => 'Dashboard',
'dashboard_moderator_nav_item' => 'Dashboard',
'logout_nav_item' => 'Abmelden',
'dashboard_nav_moderator_back_to_homepage' => 'Zurück zur Startseite',
'dashboard_nav_moderator_dashboard' => 'Dashboard',
'dashboard_nav_administrator_back_to_homepage' => 'Zurück zur Startseite',
'dashboard_nav_administrator_dashboard' => 'Dashboard',
'dashboard_nav_administrator_settings' => 'Einstellungen',
'dashboard_nav_administrator_email_config' => 'E-Mail Konfiguration',
'dashboard_nav_administrator_request_log' => 'Anfrageprotokoll',
'dashboard_nav_administrator_error_log' => 'Fehlerprotokoll',
'dashboard_nav_administrator_blocklist' => 'Blockliste',
'dashboard_nav_administrator_user_management' => 'Benutzerverwaltung',
'dashboard_nav_administrator_show_hidden_comments' => 'Versteckte Kommentare',
'dashboard_nav_administrator_show_custom_pages' => 'Benutzerdefinierte Seiten',
'dashboard_nav_administrator_primary_navigation' => 'Primäre Navigation',
'dashboard_nav_administrator_secondary_navigation' => 'Sekundäre Navigation',
'dashboard_nav_administrator_manage_themes' => 'Themes',
'dashboard_nav_show_uploaded_files' => 'Dateien hochladen',
'dashboard_nav_blog_articles' => 'Blog',
'dashboard_nav_logout' => 'Abmelden',
//functions\content_functions\manage_navigations.php

];
