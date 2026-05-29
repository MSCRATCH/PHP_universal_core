<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//lang_templates_de.php
//MMXXVI MSCRATCH

$text_templates = [

//templates\frontend_templates\blog_template.php
'blog_template_read_more' => 'Weiterlesen',
'blog_template_number_of_comments' => 'Anzahl der Kommentare:',
'blog_template_no_entries_title' => 'Derzeit keine Blogbeiträge',
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
'manage_profile_template_label_location' => 'Standort',
'manage_profile_template_label_profile_description' => 'Profilbeschreibung',
'manage_profile_template_btn_search_for_image_file' => 'Bilddatei suchen',
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
'register_template_label_password_comparison' => 'Passwort-Wiederholung',
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
'article_template_backend_access_not_verified' => 'Backend-Authentifizierung ist erforderlich, um Kommentare zu moderieren.',
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

//templates\frontend_templates\user_activity_log_template.php
'user_activity_log_template_new_comment' => 'hat einen Kommentar zu deinem Artikel geschrieben',
'user_activity_log_template_at' => 'um',
'user_activity_log_template_by' => 'von',
'user_activity_log_template_comment_hidden' => 'hat deinen Kommentar ausgeblendet',
'user_activity_log_template_comment_restored' => 'hat deinen Kommentar wiederhergestellt',
'user_activity_log_template_comment_removed' => 'hat deinen Kommentar dauerhaft entfernt',
'user_activity_log_template_user_level_changed' => 'hat deine Benutzerstufe geändert',
'user_activity_log_template_empty_log_title' => 'Keine Einträge im Protokoll.',
'user_activity_log_template_all_viewed_title' => 'Alle Protokolleinträge als gelesen markieren.',
'user_activity_log_template_empty_log_text' => 'Das Protokoll enthält derzeit keine Einträge.',
'user_activity_log_template_btn_show_article' => 'Artikel anzeigen',
'user_activity_log_template_btn_viewed' => 'Als gelesen markieren',
'user_activity_log_template_btn_all_viewed' => 'Alle als gelesen markieren',
'user_activity_log_template_btn_all_viewed_text' => 'In diesem Bereich können alle bisherigen Protokolleinträge als gelesen markiert werden.',
'user_activity_log_template_notice_comment_hidden' => 'Kommentar ausgeblendet am',
'user_activity_log_template_notice_comment_removed' => 'Kommentar entfernt am',
'user_activity_log_template_notice_comment_restored' => 'Kommentar wiederhergestellt am',
'user_activity_log_template_notice_comment_new_comment' => 'Neuer Kommentar zu deinem Artikel',
'user_activity_log_template_notice_comment_viewed' => 'Du hast diesen Eintrag als gelesen markiert.',
'user_activity_log_template_notice_user_level_changed' => 'Benutzerstufe geändert',
'user_activity_log_template_user_level_user_text' => 'Deine Benutzerstufe wurde auf Benutzer geändert. Als Benutzer kannst du dein Profil verwalten und Kommentare schreiben.',
'user_activity_log_template_user_level_moderator_text' => 'Deine Benutzerstufe wurde auf Moderator geändert. Du kannst nun Kommentare anderer Benutzer ausblenden und das Blog-System nutzen.',
//templates\frontend_templates\user_activity_log_template.php

//templates\frontend_templates\users_template.php
'maintenance_mode_template_text' => 'Der Wartungsmodus wurde aktiviert, diese Seite ist derzeit nicht verfügbar.',
'maintenance_mode_template_btn_login' => 'Anmelden',
'maintenance_mode_template_btn_logout' => 'Abmelden',
//templates\frontend_templates\users_template.php

//templates\frontend_templates\user_not_activated_template.php
'user_not_activated_template_text' => 'Dein Benutzerkonto wurde noch nicht aktiviert oder wurde gesperrt.',
'user_not_activated_template_btn_logout' => 'Abmelden',
//templates\frontend_templates\user_not_activated_template.php

//templates\frontend_templates\user_not_verified_email_template.php
'user_not_verified_email_template_text' => 'Deine E-Mail-Adresse wurde noch nicht verifiziert. Bitte überprüfe dein E-Mail-Postfach und folge den Anweisungen in der Registrierungs-E-Mail.',
'user_not_verified_email_template_btn_logout' => 'Abmelden',
'user_not_verified_email_template_btn_resend_verification_email' => 'Bestätigungs-E-Mail erneut senden',
//templates\frontend_templates\user_not_verified_email_template.php

//templates\frontend_templates\email_verification_template.php
'email_verification_template_text' => 'Vielen Dank für Ihre Registrierung auf unserer Website. Bitte klicken Sie auf den Link, um Ihre E-Mail-Adresse zu verifizieren. Ihre E-Mail-Adresse wird ausschließlich zur Verifizierung Ihrer Identität als Benutzer und zur Kontaktaufnahme verwendet, falls erforderlich. Wir geben Ihre E-Mail-Adresse nicht an Dritte weiter.',
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

//templates\backend_templates\blocklist_template.php
'blocklist_template_title_blocklist' => 'Blockliste für Registrierung',
'blocklist_template_text' => 'In diesem Bereich können Benutzernamen, E-Mail-Präfixe und E-Mail-Domains blockiert werden, sodass sie bei der Registrierung nicht akzeptiert werden. Das System basiert auf Präfixen, die verwendet werden müssen, um die Art der zu blockierenden Daten zu definieren. Das Speichern oder Entfernen erfolgt über das jeweilige Präfix.',
'blocklist_template_label_command' => 'Befehl eingeben',
'blocklist_template_btn_submit' => 'Absenden',
'blocklist_template_title_blocked_usernames' => 'Gesperrte Benutzernamen',
'blocklist_template_text_no_usernames_excluded' => 'Derzeit sind keine Benutzernamen von der Registrierung ausgeschlossen.',
'blocklist_template_title_blocked_email_names' => 'Gesperrte E-Mail-Namen',
'blocklist_template_text_no_email_names_excluded' => 'Derzeit sind keine E-Mail-Namen von der Registrierung ausgeschlossen.',
'blocklist_template_title_blocked_email_addresses' => 'Gesperrte E-Mail-Adressen',
'blocklist_template_text_no_email_addresses_excluded' => 'Derzeit sind keine E-Mail-Adressen von der Registrierung ausgeschlossen.',
'blocklist_template_title_blocked_email_domains' => 'Gesperrte E-Mail-Domains',
'blocklist_template_text_no_email_excluded' => 'Derzeit sind keine E-Mail-Domains von der Registrierung ausgeschlossen.',
//templates\backend_templates\blocklist_template.php

//templates\backend_templates\dashboard_moderator_template.php
'dashboard_moderator_template_title' => 'Moderator-Dashboard',
'dashboard_moderator_template_text' => 'Sie befinden sich jetzt im Moderationsbereich des Dashboards.',
//templates\backend_templates\dashboard_moderator_template.php

//templates\backend_templates\dashboard_template.php
'dashboard_template_title_error_system' => 'Fehlersystem',
'dashboard_template_text_error_system' => 'Dieser Bereich zeigt allgemeine Fehler an. Wenn hier keine Fehler angezeigt werden, funktioniert alles wie erwartet.',
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
'error_log_template_text_error_log' => 'Das Fehlerprotokoll kann nur gelöscht werden, wenn die Fehler behoben wurden. Andernfalls werden sie erneut erfasst.',
'error_log_template_btn_clear_error_log' => 'Fehlerprotokoll löschen',
'error_log_template_error_number' => 'Fehlernummer',
'error_log_template_error_string' => 'Fehlertext',
'error_log_template_error_file' => 'Fehlerdatei',
'error_log_template_error_line' => 'Zeile',
'error_log_template_registered_at' => 'Erfasst am',
'error_log_template_title_no_entries' => 'Keine Einträge im Fehlerprotokoll',
'error_log_template_text_no_entries' => 'Das Fehlerprotokoll enthält keine Fehler, daher funktioniert das System fehlerfrei.',
//templates\backend_templates\error_log_template.php

//templates\backend_templates\show_blog_articles_template.php
'show_blog_articles_template_title' => 'Blog',
'show_blog_articles_template_text' => 'Dieser Bereich dient zur Verwaltung von Blogbeiträgen. Diese können mit internem Code formatiert werden. Moderatoren können nur ihre eigenen Beiträge sehen.',
'show_blog_articles_template_author' => 'Autor:',
'show_blog_articles_template_creation_date' => 'Erstellungsdatum:',
'show_blog_articles_template_btn_create' => 'Blogbeitrag erstellen',
'show_blog_articles_template_btn_remove' => 'Entfernen',
'show_blog_articles_template_btn_edit' => 'Bearbeiten',
'show_blog_articles_template_no_entries_title' => 'Keine Blogbeiträge',
'show_blog_articles_template_no_entries_text' => 'Es wurden noch keine Blogbeiträge erstellt.',
//templates\backend_templates\show_blog_articles_template.php

//templates\backend_templates\create_blog_article_template.php
'create_blog_article_template_title' => 'Blogbeitrag erstellen',
'create_blog_article_template_label_title' => 'Titel',
'create_blog_article_template_label_preview' => 'Vorschau',
'create_blog_article_template_label_content' => 'Inhalt',
'create_blog_article_template_btn_save' => 'Speichern',
'create_blog_article_template_btn_return' => 'Zurück',
//templates\backend_templates\create_blog_article_template.php

//templates\backend_templates\edit_blog_article_template.php
'edit_blog_article_template_title' => 'Blogbeitrag bearbeiten',
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

//templates\backend_templates\show_primary_navigation_template.php
'show_primary_navigation_template_title' => 'Verwaltung der primären Navigationselemente',
'show_primary_navigation_template_text' => 'In diesem Bereich kann die primäre Navigation konfiguriert werden, die mithilfe eines entsprechenden Platzhalters frei im Layout positioniert werden kann.',
'show_primary_navigation_template_btn_create_nav_element' => 'Element erstellen',
'show_primary_navigation_template_url' => 'URL des Navigationselements:',
'show_primary_navigation_template_order' => 'Numerische Reihenfolge des Navigationselements:',
'show_primary_navigation_template_btn_remove_nav_element' => 'Element entfernen',
'show_primary_navigation_template_btn_edit_nav_element' => 'Element bearbeiten',
'show_primary_navigation_template_no_elements_text' => 'Es wurden noch keine primären Navigationselemente erstellt.',
'show_primary_navigation_template_no_elements_title' => 'Keine primären Navigationselemente',
//templates\backend_templates\show_primary_navigation_template.php

//templates\backend_templates\create_primary_navigation_element_template.php
'create_primary_navigation_element_template_title' => 'Primäres Navigationselement erstellen',
'create_primary_navigation_element_template_label_order' => 'Reihenfolge',
'create_primary_navigation_element_template_label_url' => 'URL',
'create_primary_navigation_element_template_label_name' => 'Name',
'create_primary_navigation_element_template_btn_save' => 'Element speichern',
'create_primary_navigation_element_template_btn_return' => 'Zurück',
//templates\backend_templates\create_primary_navigation_element_template.php

//templates\backend_templates\edit_primary_navigation_element_template.php
'edit_primary_navigation_element_template_title' => 'Primäres Navigationselement bearbeiten',
'edit_primary_navigation_element_template_label_url' => 'URL',
'edit_primary_navigation_element_template_label_name' => 'Name',
'edit_primary_navigation_element_template_label_order' => 'Reihenfolge',
'edit_primary_navigation_element_template_btn_edit_primary_nav_element' => 'Element bearbeiten',
'edit_primary_navigation_element_template_btn_return' => 'Zurück',
//templates\backend_templates\edit_primary_navigation_element_template.php

//templates\backend_templates\show_secondary_navigation_template.php
'show_secondary_navigation_template_title' => 'Verwaltung der sekundären Navigationselemente',
'show_secondary_navigation_template_text' => 'In diesem Bereich kann die sekundäre Navigation konfiguriert werden, die mithilfe eines entsprechenden Platzhalters frei im Layout positioniert werden kann.',
'show_secondary_navigation_template_btn_create_nav_element' => 'Element erstellen',
'show_secondary_navigation_template_url' => 'URL des Navigationselements:',
'show_secondary_navigation_template_order' => 'Numerische Reihenfolge des Navigationselements:',
'show_secondary_navigation_template_btn_remove_nav_element' => 'Element entfernen',
'show_secondary_navigation_template_btn_edit_nav_element' => 'Element bearbeiten',
'show_secondary_navigation_template_no_elements_text' => 'Es wurden noch keine sekundären Navigationselemente erstellt.',
'show_secondary_navigation_template_no_elements_title' => 'Keine sekundären Navigationselemente',
//templates\backend_templates\show_secondary_navigation_template.php

//templates\backend_templates\create_secondary_navigation_element_template.php
'create_secondary_navigation_element_template_title' => 'Sekundäres Navigationselement erstellen',
'create_secondary_navigation_element_template_label_order' => 'Reihenfolge',
'create_secondary_navigation_element_template_label_url' => 'URL',
'create_secondary_navigation_element_template_label_name' => 'Name',
'create_secondary_navigation_element_template_btn_save' => 'Element speichern',
'create_secondary_navigation_element_template_btn_return' => 'Zurück',
//templates\backend_templates\create_secondary_navigation_element_template.php

//templates\backend_templates\edit_secondary_navigation_element_template.php
'edit_secondary_navigation_element_template_title' => 'Sekundäres Navigationselement bearbeiten',
'edit_secondary_navigation_element_template_label_url' => 'URL',
'edit_secondary_navigation_element_template_label_name' => 'Name',
'edit_secondary_navigation_element_template_label_order' => 'Reihenfolge',
'edit_secondary_navigation_element_template_btn_edit_secondary_nav_element' => 'Element bearbeiten',
'edit_secondary_navigation_element_template_btn_return' => 'Zurück',
//templates\backend_templates\edit_primary_navigation_element_template.php

//templates\backend_templates\message_remove_user.php
'message_remove_user_text' => 'Sind Sie sicher, dass Sie diesen Benutzer entfernen möchten?',
'message_remove_user_btn_confirm' => 'Bestätigen',
'message_remove_user_btn_cancel' => 'Abbrechen',
//templates\backend_templates\message_remove_user.php

//templates\backend_templates\settings_template.php
'settings_template_title' => 'Einstellungen',
'settings_template_btn' => 'Absenden',
//templates\backend_templates\settings_template.php

//templates\backend_templates\show_uploaded_files_template.php
'show_uploaded_files_template_title' => 'Verwaltung hochgeladener Dateien',
'show_uploaded_files_template_text' => 'In diesem Bereich können hochgeladene Dateien verwaltet und anschließend über internen Code eingebunden werden.',
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
'upload_file_template_label_file' => 'Datei auswählen',
'upload_files_template_btn_upload' => 'Datei hochladen',
'upload_files_template_btn_return' => 'Zurück',
'upload_file_template_upload_max_filesize' => 'Maximale Dateigröße:',
'upload_file_template_post_max_size' => 'Maximale post Dateigröße:',
'upload_file_template_max_filesize_text' => 'Die beiden oben genannten Einstellungen müssen auf 100M gesetzt werden. Diese können in der php ini Ihres Webservers konfiguriert werden. Andernfalls funktioniert das System nicht wie vorgesehen. Wenn bei beiden Einträgen 100 MB angezeigt werden, müssen Sie keine weiteren Maßnahmen ergreifen.',
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

//templates\backend_templates\show_user_activity_log_template.php
'show_user_activity_log_template_comment_created' => 'Ein Kommentar wurde erstellt',
'show_user_activity_log_template_comment_removed' => 'Ein Kommentar wurde entfernt',
'show_user_activity_log_template_comment_hidden' => 'Ein Kommentar wurde ausgeblendet',
'show_user_activity_log_template_comment_restored' => 'Ein Kommentar wurde wiederhergestellt',
'show_user_activity_log_template_user_level_changed' => 'Eine Benutzerstufe wurde geändert',
'show_user_activity_log_template_btn_show_article' => 'Artikel anzeigen',
'show_user_activity_log_template_btn_show_user' => 'Benutzer anzeigen',
'show_user_activity_log_template_activity_performed_by' => 'Aktion ausgeführt von:',
'show_user_activity_log_template_activity_affects' => 'Aktion betrifft:',
'show_user_activity_log_template_activity_performed' => 'Aktion ausgeführt:',
'show_user_activity_log_template_user_level_changed_to' => 'Benutzerstufe geändert zu:',
'show_user_activity_log_template_viewed_by_affected_user' => 'Der Eintrag wurde vom betroffenen Benutzer als gelesen markiert.',
'show_user_activity_log_template_no_entries_title' => 'Keine Einträge im Aktivitätsprotokoll',
'show_user_activity_log_template_no_entries_text' => 'Das Benutzeraktivitätsprotokoll enthält keine Einträge.',
//templates\backend_templates\show_user_activity_log_template.php

//templates\backend_templates\show_hidden_comments_template.php
'show_hidden_comments_template_title' => 'Ausgeblendete Kommentare',
'show_hidden_comments_template_title_hidden_comment' => 'Ein Kommentar wurde ausgeblendet',
'show_hidden_comments_template_text' => 'Dieser Bereich zeigt Kommentare, die von Ihnen oder Ihren Moderatoren ausgeblendet wurden. Sie können sie direkt im Frontend oder hier auf dieser Seite entfernen oder wiederherstellen.',
'show_hidden_comments_template_btn_mark_comments_as_viewed' => 'Kommentare als gelesen markieren',
'show_hidden_comments_template_btn_restore' => 'Wiederherstellen',
'show_hidden_comments_template_btn_remove' => 'Entfernen',
'show_hidden_comments_template_activity_performed_by' => 'Aktion ausgeführt von:',
'show_hidden_comments_template_comment_written_by' => 'Kommentar geschrieben von:',
'show_hidden_comments_template_activity_performed' => 'Aktion ausgeführt:',
'show_hidden_comments_template_comment_affected_article' => 'Betroffener Artikel:',
'show_hidden_comments_template_viewed' => 'Der Eintrag wurde gelesen.',
'show_hidden_comments_template_not_viewed' => 'Der Eintrag wurde nicht gelesen.',
'show_hidden_comments_template_no_entries_title' => 'Keine ausgeblendeten Kommentare',
'show_hidden_comments_template_no_entries_text' => 'Derzeit gibt es keine ausgeblendeten Kommentare.',
//templates\backend_templates\show_hidden_comments_template.php

//templates\backend_templates\manage_themes_template.php
'manage_themes_template_title' => 'Themes',
'manage_themes_template_text' => 'In diesem Bereich können Themes verwaltet werden. Sie werden automatisch erkannt, wenn sie sich im Themes-Verzeichnis befinden. Die Datei theme.json muss vorhanden und vollständig sein.',
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

];
