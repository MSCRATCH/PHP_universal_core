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
'memory_usage' => 'Speicherverbrauch während der Seitengenerierung:',
'included_files' => 'Anzahl der geladenen Dateien:',
//functions\helper_functions\render_performance_stats.php

//functions\helper_functions\cct.php
'cct_title' => 'Hinweis zur Verwendung von Cookies.',
'cct_text' => 'Diese Website verwendet Cookies und protokolliert Aktivitäten, wie z. B. IP-Adressen, um die Sicherheit aller Benutzer zu gewährleisten. Mit dem Besuch dieser Website erklären Sie sich damit einverstanden.',
'cct_btn' => 'Akzeptieren',
//functions\helper_functions\cct.php

//functions\helper_functions\pagination.php
'pagination_of' => 'von',
'pagination_page' => 'Seite',
'pagination_previous_page' => 'Vorherige Seite',
'pagination_next_page' => 'Nächste Seite',
//functions\helper_functions\pagination.php

//functions\mail_functions\public_emails.php
'message_public_emails_no_contact_form_email' => 'Die E-Mail-Adresse fehlt.',
'message_public_emails_no_contact_form_name' => 'Der Name fehlt.',
'message_public_emails_no_contact_form_text' => 'Die Nachricht fehlt.',
'message_public_emails_no_contact_form_subject' => 'Der Betreff der E-Mail fehlt.',
'message_public_emails_contact_form_email_address_invalid' => 'Die eingegebene E-Mail-Adresse ist ungültig.',
'message_public_emails_contact_form_security_question_invalid' => 'Die Sicherheitsfrage ist ungültig.',
'message_public_emails_no_security_question' => 'Die Sicherheitsfrage fehlt.',
//functions\mail_functions\public_emails.php

//functions\mail_functions\verify_email.php
'message_verify_email_unauthorized_access' => 'Ihre Anfrage ist ungültig.',
'message_verify_email_invalid_token' => 'Der Bestätigungstoken ist ungültig oder abgelaufen.',
'message_verify_email_already_verified' => 'Ihre E-Mail-Adresse wurde bereits bestätigt.',
//functions\mail_functions\verify_email.php

//functions\file_functions\serve_uploaded_file.php
'message_serve_uploaded_file_no_file' => 'Die angeforderte Datei konnte nicht gefunden werden.',
'message_serve_uploaded_file_btn' => 'Zur Startseite',
//functions\file_functions\serve_uploaded_file.php

//functions\file_functions\serve_profile_image.php
'message_serve_profile_images_no_profile_image' => 'Ein solches Profilbild existiert nicht.',
'message_serve_profile_images_profile_btn' => 'Zur Startseite',
//functions\file_functions\serve_profile_image.php

//functions\auth_functions\login.php
'message_login_no_username' => 'Es wurde kein Benutzername angegeben.',
'message_login_no_password' => 'Es wurde kein Passwort angegeben.',
'message_login_failed' => 'Die Anmeldung war nicht erfolgreich. Bitte überprüfen Sie Ihre Zugangsdaten und versuchen Sie es erneut.',
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
'message_register_username_already_taken' => 'Der angegebene Benutzername ist nicht verfügbar. Bitte wählen Sie einen anderen.',
'message_register_email_address_already_taken' => 'Die angegebene E-Mail-Adresse ist nicht verfügbar. Bitte wählen Sie eine andere.',
'message_register_critical_error' => 'Etwas ist schiefgelaufen. Bitte versuchen Sie es später erneut.',
//functions\auth_functions\register.php

//functions\frontend_functions\public_profile_image_upload.php
'message_profile_image_invalid_size' => 'Das Profilbild konnte aufgrund einer ungültigen Bildgröße nicht hochgeladen werden.',
'message_profile_image_invalid_extension' => 'Das Profilbild konnte aufgrund eines ungültigen Dateityps nicht hochgeladen werden. Es sind nur JPG-, JPEG- oder PNG-Dateien erlaubt.',
'message_profile_image_invalid_type' => 'Das Profilbild konnte aufgrund eines ungültigen Dateityps nicht hochgeladen werden.',
'message_profile_image_invalid_dimension' => 'Das Profilbild konnte nicht hochgeladen werden, da es genau 500 × 500 Pixel groß sein muss.',
'message_profile_image_no_file' => 'Das Profilbild konnte nicht hochgeladen werden, da keine Datei ausgewählt wurde.',
//functions\frontend_functions\public_profile_image_upload.php

//functions\backend_functions\backend_login.php
'message_backend_login_too_many_attempts' => 'Sie haben die maximale Anzahl an Anmeldeversuchen überschritten. Bitte warten Sie, bevor Sie es erneut versuchen.',
'message_backend_login_no_username' => 'Es wurde kein Benutzername angegeben.',
'message_backend_login_no_password' => 'Es wurde kein Passwort angegeben.',
'message_backend_login_failed' => 'Die Anmeldung war nicht erfolgreich. Bitte überprüfen Sie Ihre Zugangsdaten und versuchen Sie es erneut.',
//functions\backend_functions\backend_login.php

//functions\backend_functions\manage_uploaded_files.php
'message_upload_files_no_file' => 'Es wurde keine Datei angegeben.',
'message_upload_files_no_file_title' => 'Es wurde kein Dateititel angegeben.',
'message_upload_files_no_file_description' => 'Es wurde keine Dateibeschreibung angegeben.',
'message_upload_files_invalid_extension' => 'Ungültige Dateiendung.',
'message_upload_files_invalid_size' => 'Ungültige Dateigröße. Die Datei darf maximal 100 MB groß sein.',
'message_upload_files_invalid_type' => 'Ungültige Datei.',
//functions\backend_functions\manage_uploaded_files.php

//functions\backend_functions\manage_comments.php
'message_manage_comments_no_comment' => 'Es wurde kein Kommentar eingegeben.',
'message_manage_comments_too_long' => 'Der eingegebene Kommentar ist zu lang. Kommentare sind auf 500 Zeichen begrenzt.',
'message_manage_comments_contains_link' => 'Kommentare dürfen keine Links enthalten.',
//functions\backend_functions\manage_comments.php

//functions\backend_functions\manage_emails.php
'message_manage_emails_spam_trap' => 'Ihre Anfrage ist ungültig.',
'message_manage_emails_no_host' => 'Der Hostname fehlt.',
'message_manage_emails_no_port' => 'Der Port fehlt.',
'message_manage_emails_no_user' => 'Die E-Mail-Adresse fehlt.',
'message_manage_emails_no_password' => 'Das Passwort fehlt.',
'message_manage_emails_no_encryption' => 'Die Verschlüsselung fehlt.',
'message_manage_emails_no_from_email' => 'Die E-Mail-Adresse fehlt.',
'message_manage_emails_no_from_name' => 'Der Name fehlt.',
'message_manage_emails_connection_failed' => 'Die Zugangsdaten sind falsch. Die Verbindung konnte nicht hergestellt werden.',
//functions\backend_functions\manage_emails.php

//functions\backend_functions\manage_settings.php
'message_settings_no_settings' => 'Es wurden keine Einstellungen übermittelt.',
'message_settings_invalid_key' => 'Sie haben einen ungültigen Einstellungsschlüssel übermittelt.',
'message_settings_no_value' => 'Sie haben keinen Wert für die Einstellung angegeben.',
'message_settings_no_key' => 'Sie haben keinen Schlüssel für die Einstellung angegeben.',
'message_settings_invalid_language_value' => 'Es werden nur en oder de als gültige Parameter akzeptiert.',
//functions\backend_functions\manage_settings.php

//functions\backend_functions\manage_feature_flags.php
'message_feature_flags_no_flags' => 'Es wurden keine Flags übermittelt.',
'message_feature_flags_no_value' => 'Sie haben keinen Wert für das Flag angegeben.',
'message_feature_flags_invalid_key' => 'Sie haben einen ungültigen Flag-Schlüssel übermittelt.',
'message_feature_flags_invalid_value' => 'Sie haben einen ungültigen Flag-Wert übermittelt.',
'message_feature_flags_no_key' => 'Sie haben keinen Schlüssel für das Flag angegeben.',
//functions\backend_functions\manage_feature_flags.php

//functions\backend_functions\manage_custom_pages.php
'message_manage_custom_pages_no_name' => 'Es wurde kein Name angegeben.',
'message_manage_custom_pages_invalid_url' => 'Die angegebene URL ist für das System reserviert und daher nicht verfügbar.',
'message_manage_custom_pages_no_title' => 'Es wurde kein Titel angegeben.',
'message_manage_custom_pages_no_content' => 'Es wurde kein Inhalt angegeben.',
//functions\backend_functions\manage_custom_pages.php

//functions\backend_functions\manage_navigations.php
'message_manage_navigations_invalid_placeholder_format' => 'Das Format des Platzhalters ist ungültig.',
'message_manage_navigations_no_placeholder' => 'Sie haben keinen Platzhalter angegeben.',
'message_manage_navigations_forbidden_url' => 'Dies ist ein systemkritischer Navigationslink, der auf diese Weise nicht verwendet werden kann. Systemkritische Links besitzen feste Platzhalter, die innerhalb des Layouts frei positioniert werden können. Weitere Informationen finden Sie in der Dokumentation.',
'message_manage_navigations_no_url' => 'Es wurde keine URL angegeben.',
'message_manage_navigations_no_name' => 'Es wurde kein Name angegeben.',
'message_manage_navigations_no_order' => 'Es wurde keine Reihenfolgenummer angegeben.',
'message_manage_navigations_order_not_numeric' => 'Die Reihenfolgenummer ist keine Zahl.',
//functions\backend_functions\manage_navigations.php

//functions\backend_functions\manage_blog.php
'message_manage_blog_no_title' => 'Es wurde kein Titel angegeben.',
'message_manage_blog_no_preview' => 'Es wurde keine Vorschau angegeben.',
'message_manage_blog_no_content' => 'Es wurde kein Inhalt angegeben.',
//functions\backend_functions\manage_blog.php

//functions\backend_functions\render_backend_navigation.php
//functions\frontend_functions\public_navigations.php
'home_nav_item' => 'Startseite',
'contact_nav_item' => 'Kontakt',
'blog_nav_item' => 'Blog',
'login_nav_item' => 'Anmelden',
'register_nav_item' => 'Registrieren',
'notifications_nav_item' => 'Benachrichtigungen',
'profile_settings_nav_item' => 'Profileinstellungen',
'dashboard_nav_item' => 'Dashboard',
'dashboard_moderator_nav_item' => 'Dashboard',
'logout_nav_item' => 'Abmelden',
'dashboard_moderator_nav_item' => 'Dashboard',
'dashboard_nav_moderator_back_to_homepage' => 'Zur Startseite',
'dashboard_nav_moderator_dashboard' => 'Dashboard',
'dashboard_nav_administrator_back_to_homepage' => 'Zur Startseite',
'dashboard_nav_administrator_dashboard' => 'Dashboard',
'dashboard_nav_administrator_feature_flags' => 'Feature-Flags',
'dashboard_nav_administrator_settings' => 'Einstellungen',
'dashboard_nav_administrator_email_config' => 'E-Mail-Konfiguration',
'dashboard_nav_administrator_request_log' => 'Anfrageprotokoll',
'dashboard_nav_administrator_error_log' => 'Fehlerprotokoll',
'dashboard_nav_administrator_blocklist' => 'Sperrliste',
'dashboard_nav_administrator_user_management' => 'Benutzerverwaltung',
'dashboard_nav_administrator_show_hidden_comments' => 'Versteckte Kommentare',
'dashboard_nav_administrator_show_custom_pages' => 'Benutzerdefinierte Seiten',
'dashboard_nav_administrator_navigations' => 'Navigationen',
'dashboard_nav_administrator_manage_themes' => 'Themes',
'dashboard_nav_administrator_show_custom_widgets' => 'Widgets',
'dashboard_nav_show_uploaded_files' => 'Dateien hochladen',
'dashboard_nav_blog_articles' => 'Blog',
'dashboard_nav_logout' => 'Abmelden',
//functions\backend_functions\render_backend_navigation.php
//functions\frontend_functions\public_navigations.php

//functions\backend_functions\manage_custom_widgets.php
'manage_custom_widgets_invalid_placeholder_format' => 'Ungültiges Platzhalterformat. Platzhalter dürfen nur alphabetische Zeichen enthalten.',
'manage_custom_widgets_no_custom_widget_content' => 'Es wurde kein Widget-Inhalt angegeben.',
'manage_custom_widgets_no_custom_widget_placeholder' => 'Es wurde kein Widget-Platzhalter angegeben.',
'manage_custom_widgets_placeholder_already_exists' => 'Der Platzhalter existiert bereits. Bitte wählen Sie einen anderen.',
//functions\backend_functions\manage_custom_widgets.php

//functions\security_functions\rate_limiter.php
'message_rate_limiter_text' => 'Sie haben zu viele Anfragen gesendet. Bitte warten Sie 5 Minuten, bevor Sie es erneut versuchen.',
'message_rate_limiter_btn_return' => 'Zurück',
//functions\security_functions\rate_limiter.php

];
