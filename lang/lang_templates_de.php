<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//lang_templates_de.php
//MMXXVI MSCRATCH

$text_templates = [

//templates\frontend_templates\blog_template.php
'blog_template_read_more' => 'Mehr lesen',
'blog_template_number_of_comments' => 'Anzahl der Kommentare:',
'blog_template_no_entries_title' => 'Momentan keine Blogbeiträge',
'blog_template_no_entries_text' => 'Derzeit gibt es keine Blogbeiträge.',
//templates\frontend_templates\blog_template.php

//templates\frontend_templates\login_template.php
'login_template_title_log_in' => 'Anmelden',
'login_template_label_username' => 'Benutzername',
'login_template_label_password' => 'Passwort',
'login_template_btn_login' => 'Anmelden',
'login_template_btn_return_to_home_page' => 'Zur Startseite zurückkehren',
//templates\frontend_templates\login_template.php

//templates\frontend_templates\manage_profile_template.php
'manage_profile_template_title_upload' => 'Profilbild hochladen',
'manage_profile_template_title_update_description' => 'Profilbeschreibung aktualisieren',
'manage_profile_template_label_location' => 'Ort',
'manage_profile_template_label_profile_description' => 'Profilbeschreibung',
'manage_profile_template_btn_search_for_image_file' => 'Nach Bilddatei suchen',
'manage_profile_template_btn_upload_profile_image' => 'Profilbild hochladen',
'manage_profile_template_btn_update_profile' => 'Profil aktualisieren',
//templates\frontend_templates\manage_profile_template.php

//templates\frontend_templates\profile_template.php
'profile_template_online' => 'Online',
'profile_template_title_profile_description' => 'Profilbeschreibung',
'profile_template_no_profile_description' => 'Dieser Benutzer hat noch keine Profilbeschreibung angegeben.',
//templates\frontend_templates\profile_template.php

//templates\frontend_templates\register_template.php
'register_template_title_register' => 'Registrieren',
'register_template_label_username' => 'Benutzername',
'register_template_label_password' => 'Passwort',
'register_template_label_password_comparison' => 'Passwortvergleich',
'register_template_label_e_mail_address' => 'E-Mail-Adresse',
'register_template_label_security_question' => 'Sicherheitsfrage',
'register_template_text' => 'Mit der Registrierung stimmen Sie den Nutzungsbedingungen zu.',
'register_template_btn_register' => 'Registrieren',
'register_template_btn_return_to_homepage' => 'Zur Startseite zurückkehren',
//templates\frontend_templates\register_template.php

//templates\frontend_templates\serve_uploaded_file_template.php
'serve_uploaded_file_template_btn_download_file' => 'Datei herunterladen',
'serve_uploaded_file_template_btn_return' => 'Zurück',
//templates\frontend_templates\serve_uploaded_file_template.php

//templates\frontend_templates\article_template.php
'article_template_backend_access_not_verified' => 'Eine Backend-Authentifizierung ist erforderlich, um Kommentare zu verwalten.',
'article_template_comment_hidden' => 'Dieser Kommentar wurde ausgeblendet.',
'article_template_form_title_leave_comment' => 'Kommentar hinterlassen',
'article_template_label_comment' => 'Kommentar',
'article_template_not_registered' => 'Sie müssen sich registrieren oder anmelden, um Kommentare zu schreiben.',
'article_template_btn_remove' => 'Entfernen',
'article_template_btn_restore' => 'Wiederherstellen',
'article_template_btn_hide' => 'Ausblenden',
'article_template_btn_save' => 'Speichern',
'article_template_btn_login' => 'Anmelden',
'article_template_btn_register' => 'Registrieren',
//templates\frontend_templates\article_template.php

//templates\frontend_templates\notifications_template.php
'notifications_template_new_comment' => 'hat einen Kommentar zu Ihrem Artikel geschrieben',
'notifications_template_at' => 'bei',
'notifications_template_by' => 'von',
'notifications_template_comment_hidden' => 'hat Ihren Kommentar ausgeblendet',
'notifications_template_comment_restored' => 'hat Ihren Kommentar wiederhergestellt',
'notifications_template_comment_removed' => 'hat Ihren Kommentar dauerhaft entfernt',
'notifications_template_user_level_changed' => 'hat Ihre Benutzerstufe geändert',
'notifications_template_empty_log_title' => 'Keine Benachrichtigungen',
'notifications_template_all_viewed_title' => 'Alle Benachrichtigungen als gelesen markieren',
'notifications_template_empty_log_text' => 'Derzeit gibt es keine Benachrichtigungen.',
'notifications_template_btn_show_article' => 'Artikel anzeigen',
'notifications_template_btn_viewed' => 'Als gelesen markieren',
'notifications_template_btn_all_viewed' => 'Alle als gelesen markieren',
'notifications_template_btn_all_viewed_text' => 'In diesem Bereich können alle Benachrichtigungen als gelesen markiert werden.',
'notifications_template_notice_comment_hidden' => 'Kommentar ausgeblendet bei',
'notifications_template_notice_comment_removed' => 'Kommentar entfernt bei',
'notifications_template_notice_comment_restored' => 'Kommentar wiederhergestellt bei',
'notifications_template_notice_comment_new_comment' => 'Neuer Kommentar zu Ihrem Artikel',
'notifications_template_notice_comment_viewed' => 'Sie haben diese Benachrichtigung als gelesen markiert.',
'notifications_template_notice_user_level_changed' => 'Benutzerstufe geändert',
'notifications_template_user_level_user_text' => 'Ihre Benutzerstufe wurde auf Benutzer geändert. Als Benutzer können Sie Ihr Profil verwalten und Kommentare schreiben.',
'notifications_template_user_level_moderator_text' => 'Ihre Benutzerstufe wurde auf Moderator geändert. Sie können nun Kommentare anderer Benutzer ausblenden und das Blogsystem verwenden.',
//templates\frontend_templates\user_activity_log_template.php

//templates\frontend_templates\maintenance_mode.php
'maintenance_mode_template_title' => 'Wartungsmodus aktiviert',
'maintenance_mode_template_text' => 'Diese Seite ist derzeit nicht verfügbar, da Wartungsarbeiten durchgeführt werden. Bitte versuchen Sie es später erneut.',
'maintenance_mode_template_btn_login' => 'Anmelden',
'maintenance_mode_template_btn_logout' => 'Abmelden',
//templates\frontend_templates\maintenance_mode.php

//templates\frontend_templates\user_not_activated_template.php
'user_not_activated_template_text' => 'Ihr Benutzerkonto wurde noch nicht aktiviert oder Ihr Konto wurde gesperrt.',
'user_not_activated_template_btn_logout' => 'Abmelden',
//templates\frontend_templates\user_not_activated_template.php

//templates\frontend_templates\user_not_verified_email_template.php
'user_not_verified_email_template_title' => 'E-Mail-Verifizierung erforderlich',
'user_not_verified_email_template_text' => 'Ihr Konto wurde erfolgreich erstellt, aber Ihre E-Mail-Adresse wurde noch nicht verifiziert. Bitte überprüfen Sie Ihren Posteingang und klicken Sie auf den Verifizierungslink. Einige Funktionen bleiben deaktiviert, bis Ihre E-Mail-Adresse bestätigt wurde.',
'user_not_verified_email_template_btn_logout' => 'Abmelden',
'user_not_verified_email_template_btn_resend_verification_email' => 'Verifizierungs-E-Mail erneut senden',
//templates\frontend_templates\user_not_verified_email_template.php

//templates\frontend_templates\email_verification_template.php
'email_verification_template_text' => 'Vielen Dank für Ihre Registrierung auf unserer Website. Bitte klicken Sie auf den Link, um Ihre E-Mail-Adresse zu bestätigen. Ihre E-Mail-Adresse wird ausschließlich zur Verifizierung Ihrer Identität als Benutzer und zur Kontaktaufnahme verwendet, falls dies erforderlich ist. Wir geben Ihre E-Mail-Adresse nicht an Dritte weiter.',
//templates\frontend_templates\email_verification_template.php

//templates\frontend_templates\contact_template.php
'contact_template_title' => 'Kontaktieren Sie uns',
'contact_template_label_subject' => 'Betreff',
'contact_template_label_email' => 'E-Mail',
'contact_template_label_name' => 'Name',
'contact_template_label_text' => 'Nachricht',
'contact_template_label_security_question' => 'Sicherheitsfrage',
'contact_template_btn' => 'Nachricht senden',
//templates\frontend_templates\contact_template.php

//templates\backend_templates\request_log_template.php
'request_log_template_ip_address' => 'IP-Adresse',
'request_log_template_browser' => 'Browser',
'request_log_template_requested_url' => 'Angeforderte URL',
'request_log_template_timestamp' => 'Zeitstempel',
'request_log_template_registered_user' => 'Registrierter Benutzer',
'request_log_template_no_user' => 'Kein registrierter Benutzer',
'request_log_template_no_entries_title' => 'Keine Einträge im Aktivitätsprotokoll',
'request_log_template_no_entries_text' => 'Es gibt keine Einträge im Aktivitätsprotokoll.',
//templates\backend_templates\request_log_template.php

//templates\backend_templates\backend_login_template.php
'backend_login_template_label_username' => 'Benutzername',
'backend_login_template_label_password' => 'Registrierter Benutzer',
'backend_login_template_btn' => 'Authentifizierung für das Backend',
'backend_login_template_btn_return' => 'Zur Startseite zurückkehren',
//templates\backend_templates\backend_login_template.php

//templates\backend_templates\dashboard_moderator_template.php
'dashboard_moderator_template_title' => 'Moderator-Dashboard',
'dashboard_moderator_template_text' => 'Sie befinden sich jetzt im Moderatorenbereich des Dashboards.',
//templates\backend_templates\dashboard_moderator_template.php

//templates\backend_templates\dashboard_template.php
'dashboard_template_title_directory_check_system_title' => 'Verzeichnisprüfung',
'dashboard_template_directory_check_writable' => 'Beschreibbar',
'dashboard_template_directory_check_not_writable' => 'Nicht beschreibbar',
'dashboard_template_directory_check_db_error_logs' => 'Verzeichnis für Datenbank-Fehlerprotokolle:',
'dashboard_template_directory_check_file_system_logs' => 'Verzeichnis für Dateisystem-Protokolle:',
'dashboard_template_directory_check_request_logs' => 'Verzeichnis für Anfrageprotokolle:',
'dashboard_template_directory_check_system_error_logs' => 'Verzeichnis für Systemfehler-Protokolle:',
'dashboard_template_title_system_integrity' => 'Systemintegrität',
'dashboard_template_directory_check_healthy' => 'Funktionsfähig',
'dashboard_template_directory_check_unhealthy' => 'Fehlerhaft',
'dashboard_template_system_integrity_db' => 'Datenbankintegrität:',
'dashboard_template_system_integrity_file_system' => 'Dateisystemintegrität:',
'dashboard_template_system_integrity_system' => 'Systemintegrität:',
'dashboard_template_title_filesize' => 'Maximale Upload-Dateigröße',
'dashboard_template_upload_max_filesize' => 'Maximale Dateigröße:',
'dashboard_template_post_max_size' => 'Maximale POST-Dateigröße:',
'dashboard_template_max_filesize_text' => 'Die oben genannten Einstellungen legen die maximale Größe für Dateien fest, die auf Ihren Webserver hochgeladen werden dürfen. Das Upload-System unterstützt Dateien bis zu 100 MB, diese Grenze kann problemlos erhöht werden. Beide Werte sollten auf 100 MB eingestellt sein, damit das Upload-System korrekt funktioniert. Diese Werte können in der php.ini-Datei Ihres Webservers angepasst werden.',
'dashboard_template_title_system_information' => 'Systeminformationen',
'dashboard_template_title_most_recent_users' => 'Neueste Benutzer',
'dashboard_template_text_most_recent_users' => 'Derzeit sind keine Benutzer registriert.',
'dashboard_template_title_online_users' => 'Online-Benutzer',
'dashboard_template_text_online_users' => 'Derzeit sind keine Benutzer online.',
'dashboard_template_title_users_who_not_activated' => 'Nicht aktivierte Benutzer',
'dashboard_template_text_users_who_not_activated' => 'Derzeit gibt es keine nicht aktivierten Benutzer.',
'dashboard_template_title_moderators' => 'Moderatoren',
'dashboard_template_text_moderators' => 'Derzeit gibt es keine Moderatoren.',
//templates\backend_templates\dashboard_template.php

//templates\backend_templates\error_log_template.php
'error_log_template_title_error_log' => 'Fehlerprotokoll',
'error_log_template_text_error_log' => 'Das Fehlerprotokoll kann erst gelöscht werden, wenn die Fehler behoben wurden. Andernfalls werden sie erneut protokolliert.',
'error_log_template_btn_clear_error_log' => 'Fehlerprotokoll löschen',
'error_log_template_error_number' => 'Fehlernummer',
'error_log_template_error_string' => 'Fehlertext',
'error_log_template_error_file' => 'Fehlerdatei',
'error_log_template_error_line' => 'Fehlerzeile',
'error_log_template_registered_at' => 'Registriert am',
'error_log_template_title_no_entries' => 'Keine Einträge im Fehlerprotokoll',
'error_log_template_text_no_entries' => 'Das Fehlerprotokoll enthält keine Fehler, daher arbeitet das System fehlerfrei.',
//templates\backend_templates\error_log_template.php

//templates\backend_templates\show_blog_articles_template.php
'show_blog_articles_template_title' => 'Blog',
'show_blog_articles_template_text' => 'Dieser Bereich dient zur Verwaltung von Blogbeiträgen. Diese können mit internem Code formatiert werden. Moderatoren können nur ihre eigenen Beiträge sehen.',
'show_blog_articles_template_author' => 'Autor:',
'show_blog_articles_template_creation_date' => 'Erstellungsdatum:',
'show_blog_articles_template_btn_create' => 'Blogartikel erstellen',
'show_blog_articles_template_btn_remove' => 'Entfernen',
'show_blog_articles_template_btn_edit' => 'Bearbeiten',
'show_blog_articles_template_no_entries_title' => 'Keine Blogartikel',
'show_blog_articles_template_no_entries_text' => 'Es wurden noch keine Blogartikel-Seiten erstellt.',
//templates\backend_templates\show_blog_articles_template.php

//templates\backend_templates\create_blog_article_template.php
'create_blog_article_template_title' => 'Blogartikel erstellen',
'create_blog_article_template_label_title' => 'Titel',
'create_blog_article_template_label_preview' => 'Vorschau',
'create_blog_article_template_label_content' => 'Inhalt',
'create_blog_article_template_btn_save' => 'Speichern',
'create_blog_article_template_btn_return' => 'Zurück',
//templates\backend_templates\create_blog_article_template.php

//templates\backend_templates\edit_blog_article_template.php
'edit_blog_article_template_title' => 'Blogartikel bearbeiten',
'edit_blog_article_template_label_title' => 'Titel',
'edit_blog_article_template_label_preview' => 'Vorschau',
'edit_blog_article_template_label_content' => 'Inhalt',
'edit_blog_article_template_btn_edit' => 'Bearbeiten',
'edit_blog_article_template_btn_return' => 'Zurück',
//templates\backend_templates\edit_blog_article_template.php

//templates\backend_templates\show_custom_pages_template.php
'show_custom_pages_template_title' => 'Benutzerdefinierte Seiten',
'show_custom_pages_template_text' => 'In diesem Bereich können benutzerdefinierte Seiten erstellt und mit internem Code formatiert werden.',
'show_custom_pages_template_url' => 'URL der benutzerdefinierten Seite:',
'show_custom_pages_template_btn_remove' => 'Seite entfernen',
'show_custom_pages_template_btn_create' => 'Benutzerdefinierte Seite erstellen',
'show_custom_pages_template_btn_edit' => 'Seite bearbeiten',
'show_custom_pages_template_no_entries_title' => 'Keine benutzerdefinierten Seiten',
'show_custom_pages_template_no_entries_text' => 'Es wurden noch keine benutzerdefinierten Seiten erstellt.',
//templates\backend_templates\show_custom_pages_template.php

//templates\backend_templates\create_custom_page_template.php
'create_custom_page_template_title' => 'Benutzerdefinierte Seite erstellen',
'create_custom_page_template_label_custom_page_url' => 'URL der benutzerdefinierten Seite',
'create_custom_page_template_label_custom_custom_page_title' => 'Titel der benutzerdefinierten Seite',
'create_custom_page_template_label_custom_page_content' => 'Inhalt der benutzerdefinierten Seite',
'create_custom_page_template_template_btn_create_custom_page' => 'Benutzerdefinierte Seite erstellen',
'create_custom_page_template_btn_return' => 'Zurück',
//templates\backend_templates\create_custom_page_template.php

//templates\backend_templates\edit_custom_page_template.php
'edit_custom_page_template_title' => 'Benutzerdefinierte Seite bearbeiten',
'edit_custom_page_template_label_custom_page_url' => 'URL der benutzerdefinierten Seite',
'edit_custom_page_template_custom_custom_page_title' => 'Titel der benutzerdefinierten Seite',
'edit_custom_page_template_custom_page_content' => 'Inhalt der benutzerdefinierten Seite',
'edit_custom_page_template_btn_edit_custom_page' => 'Benutzerdefinierte Seite bearbeiten',
'create_custom_page_template_btn_return' => 'Zurück',
//templates\backend_templates\edit_custom_page_template.php

//templates\backend_templates\show_navigations_template.php
'show_navigations_template_title' => 'Verwaltung der Navigationen',
'show_navigations_template_text' => 'In diesem Bereich können Navigationselemente erstellt und mithilfe des jeweiligen Platzhalters frei im Layout positioniert werden.',
'show_navigations_template_btn_create' => 'Navigation erstellen',
'show_navigations_template_btn_remove' => 'Navigation entfernen',
'show_navigations_template_btn_edit' => 'Navigation bearbeiten',
'show_navigations_template_no_navs_text' => 'Es wurden noch keine Navigationen erstellt.',
'show_navigations_template_no_navs_title' => 'Keine Navigationen',
//templates\backend_templates\show_navigations_template.php

//templates\backend_templates\create_navigation_template.php
'create_navigation_template_title' => 'Navigation erstellen',
'create_navigation_template_label_placeholder' => 'Platzhalter',
'create_navigation_template_btn_create' => 'Navigation erstellen',
'create_navigation_template_btn_return' => 'Zurück',
//templates\backend_templates\create_navigation__template.php

//templates\backend_templates\edit_navigation_template.php
'edit_navigation_template_title' => 'Navigation bearbeiten',
'edit_navigation_template_label_placeholder' => 'Platzhalter',
'edit_navigation_template_btn_edit' => 'Navigation bearbeiten',
'edit_navigation_template_btn_return' => 'Zurück',
//templates\backend_templates\edit_navigation_template.php

//templates\backend_templates\show_navigation_links_template.php
'show_navigation_links_template_title' => 'Verwaltung der Navigationslinks',
'show_navigation_links_template_text' => 'In diesem Bereich können die Links der jeweiligen Navigation bearbeitet werden.',
'show_navigation_links_template_btn_create' => 'Link erstellen',
'show_navigation_links_template_btn_remove' => 'Link entfernen',
'show_navigation_links_template_btn_show' => 'Link anzeigen',
'show_navigation_links_template_btn_return' => 'Zurück',
'show_navigation_links_template_no_links_title' => 'Keine Links',
'show_navigation_links_template_no_links_text' => 'Diese Navigation enthält keine Navigationslinks.',
//templates\backend_templates\show_navigation_links_template.php

//templates\backend_templates\create_navigation_link_template.php
'create_navigation_link_template_title' => 'Link für die ausgewählte Navigation erstellen',
'create_navigation_link_template_label_name' => 'Name des Links',
'create_navigation_link_template_label_url' => 'URL des Links',
'create_navigation_link_template_label_order' => 'Geben Sie eine Nummer an, um die Reihenfolge des Links festzulegen',
'create_navigation_link_template_btn_create' => 'Navigationslink erstellen',
'create_navigation_link_template_btn_return' => 'Zurück',
//templates\backend_templates\create_navigation_link_template.php

//templates\backend_templates\message_remove_user.php
'message_remove_user_text' => 'Möchten Sie wirklich entfernen:',
'message_remove_user_btn_confirm' => 'Bestätigen',
'message_remove_user_btn_cancel' => 'Abbrechen',
//templates\backend_templates\message_remove_user.php

//templates\backend_templates\settings_template.php
'settings_template_title' => 'Einstellungen',
'settings_template_btn' => 'Absenden',
//templates\backend_templates\settings_template.php

//templates\backend_templates\show_uploaded_files_template.php
'show_uploaded_files_template_title' => 'Verwaltung hochgeladener Dateien',
'show_uploaded_files_template_text' => 'In diesem Bereich können hochgeladene Dateien verwaltet und anschließend mithilfe des internen Codes eingebunden werden.',
'show_uploaded_files_template_btn_upload' => 'Datei hochladen',
'show_uploaded_files_template_file_name' => 'Dateiname:',
'show_uploaded_files_template_file_uploader' => 'Hochgeladen von:',
'show_uploaded_files_template_file_size' => 'Dateigröße:',
'show_uploaded_files_template_btn_remove' => 'Datei entfernen',
'show_uploaded_files_template_btn_edit' => 'Datei bearbeiten',
'show_uploaded_files_template_no_files_title' => 'Keine Dateien hochgeladen',
'show_uploaded_files_template_no_files_text' => 'Derzeit wurden noch keine Dateien hochgeladen.',
//templates\backend_templates\show_uploaded_files_template.php

//templates\backend_templates\upload_file_template.php
'upload_file_template_title' => 'Datei hochladen',
'upload_file_template_label_title' => 'Titel',
'upload_file_template_label_description' => 'Beschreibung',
'upload_file_template_label_file' => 'Nach Datei suchen',
'upload_files_template_btn_upload' => 'Datei hochladen',
'upload_files_template_btn_return' => 'Zurück',
//templates\backend_templates\upload_file_template.php

//templates\backend_templates\edit_uploaded_file_template.php
'edit_uploaded_file_template_title' => 'Datei aktualisieren',
'edit_uploaded_file_template_label_title' => 'Titel',
'edit_uploaded_file_template_label_description' => 'Beschreibung',
'edit_uploaded_file_template_btn_update_file' => 'Datei aktualisieren',
'edit_uploaded_file_template_btn_return' => 'Zurück',
//templates\backend_templates\edit_uploaded_file_template.php

//templates\backend_templates\users_template.php
'users_template_email' => 'E-Mail:',
'users_template_user_level' => 'Benutzerstufe:',
'users_template_registered' => 'Registriert:',
'users_template_last_activity' => 'Letzte Aktivität:',
'users_template_remove' => 'Entfernen',
'users_template_online' => 'Online',
'users_template_btn_remove' => 'Entfernen',
'users_template_btn_change' => 'Ändern',
'users_template_no_entries_title' => 'Keine registrierten Benutzer',
'users_template_no_entries_text' => 'Derzeit sind keine Benutzer registriert.',
'users_template_show_user_activity_log' => 'Benutzeraktivitätsprotokoll anzeigen',
'users_template_email_address_verified' => 'Die E-Mail-Adresse wurde verifiziert.',
'users_template_email_address_not_verified' => 'Die E-Mail-Adresse wurde nicht verifiziert.',
//templates\backend_templates\users_template.php

//templates\backend_templates\email_config_template.php
'email_config_template_title' => 'E-Mail-Konfiguration bearbeiten',
'email_config_template_smtp_host' => 'SMTP-Host',
'email_config_template_smtp_port' => 'SMTP-Port',
'email_config_template_smtp_user' => 'SMTP-Benutzer',
'email_config_template_smtp_password' => 'SMTP-Passwort',
'email_config_template_smtp_encryption' => 'SMTP-Verschlüsselung',
'email_config_template_from_email' => 'E-Mail',
'email_config_template_from_name' => 'Name',
'email_config_template_btn' => 'E-Mail-Konfiguration speichern',
//templates\backend_templates\email_config_template.php

//templates\backend_templates\show_hidden_comments_template.php
'show_hidden_comments_template_title' => 'Ausgeblendete Kommentare',
'show_hidden_comments_template_title_hidden_comment' => 'Ein Kommentar wurde ausgeblendet',
'show_hidden_comments_template_text' => 'Dieser Bereich zeigt Kommentare an, die von Ihnen oder Ihren Moderatoren ausgeblendet wurden. Sie können diese direkt im Frontend oder hier auf dieser Seite entfernen oder wiederherstellen.',
'show_hidden_comments_template_btn_mark_comments_as_viewed' => 'Kommentare als gelesen markieren',
'show_hidden_comments_template_btn_restore' => 'Wiederherstellen',
'show_hidden_comments_template_btn_remove' => 'Entfernen',
'show_hidden_comments_template_activity_performed_by' => 'Aktion durchgeführt von:',
'show_hidden_comments_template_comment_written_by' => 'Kommentar geschrieben von:',
'show_hidden_comments_template_activity_performed' => 'Durchgeführte Aktion:',
'show_hidden_comments_template_comment_affected_article' => 'Betroffener Artikel:',
'show_hidden_comments_template_viewed' => 'Der Eintrag wurde angesehen.',
'show_hidden_comments_template_not_viewed' => 'Der Eintrag wurde nicht angesehen.',
'show_hidden_comments_template_no_entries_title' => 'Keine ausgeblendeten Kommentare',
'show_hidden_comments_template_no_entries_text' => 'Derzeit gibt es keine ausgeblendeten Kommentare.',
//templates\backend_templates\show_hidden_comments_template.php

//templates\backend_templates\manage_themes_template.php
'manage_themes_template_title' => 'Themes',
'manage_themes_template_text' => 'In diesem Bereich können Themes verwaltet werden. Sie werden automatisch erkannt, sobald sie sich im Themes-Verzeichnis befinden. Die Datei theme.json muss vorhanden und vollständig sein.',
'manage_themes_template_key' => 'Schlüssel:',
'manage_themes_template_author' => 'Autor:',
'manage_themes_template_version' => 'Version:',
'manage_themes_template_is_active_theme' => 'Das Theme ist aktiviert.',
'manage_themes_template_is_not_active_theme' => 'Das Theme ist nicht aktiviert.',
'manage_themes_template_btn_activate_theme' => 'Aktivieren',
'manage_themes_template_btn_deactivate_theme' => 'Deaktivieren',
'manage_themes_template_no_themes_title' => 'Keine Themes',
'manage_themes_template_no_themes_text' => 'Derzeit sind keine Themes verfügbar.',
'manage_themes_template_theme_already_activated' => 'Ein Theme ist bereits aktiv.',
//templates\backend_templates\manage_themes_template.php

//templates\backend_templates\show_custom_widgets_template.php
'show_custom_widgets_template_title' => 'Widgets',
'show_custom_widgets_template_text' => 'In diesem Bereich können Widgets erstellt werden. Sie können frei innerhalb der Layout-Dateien platziert werden.',
'show_custom_widgets_template_btn_create' => 'Widget erstellen',
'show_custom_widgets_template_btn_remove' => 'Widget entfernen',
'show_custom_widgets_template_btn_edit' => 'Widget bearbeiten',
'show_custom_widgets_template_no_entries_title' => 'Keine Widgets',
'show_custom_widgets_template_no_entries_text' => 'Es wurden noch keine Widgets erstellt.',
//templates\backend_templates\show_custom_widgets_template.php

//templates\backend_templates\create_custom_widget_template.php
'create_custom_widget_template_title' => 'Benutzerdefiniertes Widget erstellen',
'create_custom_widget_template_label_placeholder' => 'Platzhalter',
'create_custom_widget_template_label_content' => 'Inhalt',
'create_custom_widget_template_template_btn_create' => 'Benutzerdefiniertes Widget erstellen',
'create_custom_widget_template_btn_return' => 'Zurück',
//templates\backend_templates\create_custom_widget_template.php

//templates\backend_templates\edit_custom_widget_template.php
'edit_custom_widget_template_title' => 'Benutzerdefiniertes Widget bearbeiten',
'edit_custom_widget_template_label_placeholder' => 'Platzhalter',
'edit_custom_widget_template_label_content' => 'Inhalt',
'edit_custom_widget_template_btn_edit' => 'Benutzerdefiniertes Widget bearbeiten',
'edit_custom_widget_template_btn_return' => 'Zurück',
//templates\backend_templates\edit_custom_widget_template.php

//templates\backend_templates\feature_flags_template.php
'feature_flags_template_title' => 'Funktionsschalter',
'feature_flags_template_text' => 'In diesem Bereich können Funktionen aktiviert oder deaktiviert werden. Dabei werden deaktivierte Elemente nicht einfach ausgeblendet, sondern die entsprechende Funktionsbibliothek wird überhaupt nicht geladen. Dadurch spart das Deaktivieren von Funktionen Arbeitsspeicher und verbessert zusätzlich die Ladezeiten der Seite.',
'feature_flags_template_status' => 'Status:',
'feature_flags_template_activated' => 'Aktiviert',
'feature_flags_template_deactivated' => 'Deaktiviert',
'feature_flags_template_deactivate' => 'Deaktivieren',
'feature_flags_template_activate' => 'Aktivieren',
'feature_flags_template_registration' => 'Die Registrierung kann hier aktiviert oder deaktiviert werden.',
'feature_flags_template_maintenance_mode' => 'Der Wartungsmodus kann hier aktiviert oder deaktiviert werden.',
'feature_flags_template_contact_form' => 'Das Kontaktformular kann hier aktiviert oder deaktiviert werden.',
'feature_flags_template_user_profile_system' => 'Das Profilsystem kann hier aktiviert oder deaktiviert werden.',
'feature_flags_template_rate_limiter' => 'Der Rate-Limiter kann hier aktiviert oder deaktiviert werden. Obwohl ein Rate-Limiter zwangsläufig erhebliche Einschränkungen für Benutzer verursacht, schützt er die Anmelde-, Kontakt- und Registrierungsfunktionen zuverlässig vor übermäßigen Anfragen.',
'feature_flags_template_cookie_consent_tool' => 'Das Cookie-Zustimmungswerkzeug kann hier aktiviert oder deaktiviert werden.',
'feature_flags_template_log_requests' => 'Diese Einstellung ermöglicht das Aktivieren oder Deaktivieren des Anfrageprotokolls. Es wird empfohlen, dieses zu deaktivieren, da diese Informationen auch über die Protokolle Ihres Webservers verfügbar sind. Sobald das Anfrageprotokoll mehr als tausend Einträge enthält, schreibt es Daten in Textdateien, verbraucht jedoch weiterhin erhebliche Systemressourcen.',
'feature_flags_template_notifications' => 'Benachrichtigungen können hier aktiviert oder deaktiviert werden.',
'feature_flags_template_comments' => 'Das Kommentarsystem kann hier aktiviert oder deaktiviert werden.',
'feature_flags_template_email_verification' => 'Diese Einstellung deaktiviert die erforderliche Bestätigung der E-Mail-Adresse durch Benutzer während der Registrierung. Wenn diese Funktion deaktiviert ist, ist anschließend eine normale Registrierung möglich.',
'feature_flags_template_users_locked_by_default' => 'Diese Einstellung deaktiviert die automatische Sperrung neuer Benutzer, bis diese manuell freigeschaltet wurden.',
//templates\backend_templates\feature_flags_template.php

];
