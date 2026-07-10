<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//lang_handlers_de.php
//MMXXVI MSCRATCH

$text_handlers = [

//Available globally for all handlers
'csrf_text' => 'Ihre Sitzung wurde aus Sicherheitsgründen beendet.',
'csrf_btn' => 'Zurück',
//Available globally for all handlers

//handlers_frontend\login_handler.php
'login_handler_successful_login' => 'Sie wurden erfolgreich angemeldet.',
'login_handler_btn_return' => 'Zurück',
//handlers_frontend\login_handler.php

//handlers_frontend\logout_handler.php
'logout_handler_successful_logout' => 'Sie wurden erfolgreich abgemeldet.',
'logout_handler_successful_backend_logout' => 'Sie wurden erfolgreich sowohl aus dem Frontend als auch aus dem Backend abgemeldet.',
'logout_handler_btn_return' => 'Zurück',
//handlers_frontend\logout_handler.php

//handlers_frontend\manage_profile_handler.php
'manage_profile_handler_successful_updated' => 'Ihr Profil wurde erfolgreich aktualisiert.',
'manage_profile_handler_successful_uploaded' => 'Ihr Profilbild wurde erfolgreich hochgeladen.',
'manage_profile_handler_btn_return' => 'Zurück',
//handlers_frontend\manage_profile_handler.php

//handlers_frontend\profile_handler.php
'profile_handler_user_dont_exist' => 'Der gesuchte Benutzer existiert nicht.',
'profile_handler_account_not_activated' => 'Dieses Konto ist nicht aktiviert und daher nicht erreichbar.',
'profile_handler_btn_back_to_the_homepage' => 'Zur Startseite',
//handlers_frontend\profile_handler.php

//handlers_frontend\register_handler.php
'register_handler_successful_registered' => 'Sie wurden erfolgreich registriert.',
'register_handler_btn_back_to_the_homepage' => 'Zur Startseite',
//handlers\register_handler.php

//handlers_frontend\article_handler.php
'article_handler_article_dont_exist' => 'Der angeforderte Artikel existiert nicht.',
'article_handler_btn_return' => 'Zurück',
'article_handler_successful_saved' => 'Der Kommentar wurde erfolgreich gespeichert.',
'article_handler_successful_removed' => 'Der Kommentar wurde erfolgreich gelöscht.',
'article_handler_successful_hidden' => 'Der Kommentar wurde erfolgreich ausgeblendet.',
'article_handler_successful_restored' => 'Der Kommentar wurde erfolgreich wiederhergestellt.',
'article_handler_btn_back_to_article' => 'Zurück zum Artikel',
//handlers_frontend\article_handler.php

//handlers_frontend\notifications_handler.php
'notifications_handler_successful_marked' => 'Die Benachrichtigungen in Ihrem Protokoll wurden erfolgreich als gelesen markiert.',
'notifications_handler_successful_marked_all' => 'Alle Benachrichtigungen wurden erfolgreich als gelesen markiert.',
'notifications_handler_btn_return' => 'Zurück',
//handlers_frontend\notifications_handler.php

//handlers_frontend\verify_email_address_handler.php
'verify_email_address_handler_successful_verified' => 'Ihre E-Mail-Adresse wurde erfolgreich bestätigt.',
'verify_email_address_handler_verification_failed' => 'Die Bestätigung der E-Mail-Adresse ist fehlgeschlagen.',
'verify_email_address_handler_btn_return' => 'Zurück',
//handlers_frontend\verify_email_address_handler.php

//handlers_frontend\contact_handler.php
'contact_handler_successful_received' => 'Wir haben Ihre Nachricht erfolgreich erhalten.',
'contact_handler_btn_return' => 'Zurück',
//handlers_frontend\contact_handler.php

//handlers_frontend\resend_verification_email_handler.php
'resend_verification_email_handler_successful_sent' => 'Die Bestätigungs-E-Mail wurde erfolgreich versendet.',
'resend_verification_email_handler_sending_failed' => 'Die Registrierungs-E-Mail konnte nicht erfolgreich versendet werden.',
'resend_verification_email_handler_btn_return' => 'Zurück',
//handlers_frontend\resend_verification_email_handler.php

//handlers_backend\backend_login_handler.php
'backend_login_handler_successful_authorized_to_access_backend' => 'Sie haben sich erfolgreich für den Zugriff auf das Backend autorisiert.',
'backend_login_handler_btn_go_to_the_dashboard' => 'Zum Dashboard',
//handlers_backend\backend_login_handler.php

//handlers_backend\error_log_handler.php
'error_log_handler_successful_cleared' => 'Das Fehlerprotokoll wurde erfolgreich geleert.',
'error_log_handler_btn_return' => 'Zurück',
//handlers_backend\error_log_handler.php

//handlers_backend\show_blog_articles_handler.php
'show_blog_articles_handler_successful_removed' => 'Der Blogartikel wurde erfolgreich gelöscht.',
'show_blog_articles_handler_btn_return' => 'Zurück',
//handlers_backend\show_blog_articles_handler.php

//handlers_backend\create_blog_article_handler.php
'create_blog_article_handler_successful_saved' => 'Der Blogartikel wurde erfolgreich gespeichert.',
'create_blog_article_handler_btn_return' => 'Zurück',
//handlers_backend\create_blog_article_handler.php

//handlers_backend\edit_blog_article_handler.php
'edit_blog_article_handler_page_dont_exist' => 'Der angeforderte Blogartikel existiert nicht.',
'edit_blog_article_handler_successful_edited' => 'Der Blogartikel wurde erfolgreich bearbeitet.',
'edit_blog_article_handler_btn_return' => 'Zurück',
//handlers_backend\edit_blog_article_handler.php

//handlers_backend\manage_custom_pages_handler.php
'show_custom_pages_handler_successful_removed' => 'Die benutzerdefinierte Seite wurde erfolgreich gelöscht.',
'show_custom_pages_handler_btn_return' => 'Zurück',
//handlers_backend\manage_custom_pages_handler.php

//handlers_backend\create_custom_page_handler.php
'create_custom_page_handler_saved' => 'Die benutzerdefinierte Seite wurde erfolgreich gespeichert.',
'create_custom_page_handler_btn_return' => 'Zurück',
//handlers_backend\create_custom_page_handler.php

//handlers_backend\edit_custom_page_handler.php
'edit_custom_page_handler_page_dont_exist' => 'Die angeforderte benutzerdefinierte Seite existiert nicht.',
'edit_custom_page_handler_successful_edited' => 'Die benutzerdefinierte Seite wurde erfolgreich bearbeitet.',
'edit_custom_page_handler_btn_return' => 'Zurück',
//handlers_backend\edit_custom_page_handler.php

//handlers_backend\show_navigation_handler.php
'show_navigation_handler_successful_removed' => 'Die Navigation wurde erfolgreich gelöscht.',
'show_navigation_handler_btn_return' => 'Zurück',
//handlers_backend\show_navigation_handler.php

//handlers_backend\create_navigation_handler.php
'create_navigation_handler_successful_created' => 'Die Navigation wurde erfolgreich erstellt.',
'create_navigation_handler_btn_return' => 'Zurück',
//handlers_backend\create_navigation_handler.php

//handlers_backend\edit_navigation_handler.php
'edit_navigation_handler_no_nav' => 'Eine solche Navigation existiert nicht.',
'edit_navigation_handler_successful_edited' => 'Die Navigation wurde erfolgreich bearbeitet.',
'edit_navigation_handler_btn_return' => 'Zurück',
//handlers_backend\edit_navigation_handler.php

//handlers_backend\show_navigation_links_handler.php
'show_navigation_links_handler_no_nav' => 'Eine solche Navigation existiert nicht.',
'show_navigation_links_handler_successful_removed' => 'Der Navigationslink wurde erfolgreich gelöscht.',
'show_navigation_links_handler_btn_return' => 'Zurück',
//handlers_backend\show_navigation_links_handler.php

//handlers_backend\create_navigation_link_handler.php
'create_navigation_link_handler_successful_created' => 'Der Navigationslink wurde erfolgreich erstellt.',
'create_navigation_link_handler_btn_return' => 'Zurück',
//handlers_backend\create_navigation_link_handler.php

//handlers_backend\settings_handler.php
'settings_handler_successful_edited' => 'Die Einstellungen wurden erfolgreich aktualisiert.',
'settings_handler_btn_return' => 'Zurück',
//handlers_backend\settings_handler.php

//handlers_backend\feature_flags_handler.php
'feature_flags_handler_successful_edited' => 'Die Feature-Flags wurden erfolgreich aktualisiert.',
'feature_flags_handler_btn_return' => 'Zurück',
//handlers_backend\feature_flags_handler.php

//handlers_backend\show_uploaded_files_handler.php
'show_uploaded_files_handler_successful_removed' => 'Die Datei wurde erfolgreich gelöscht.',
'show_uploaded_files_handler_btn_return' => 'Zurück',
//handlers_backend\show_upload_files_handler.php

//handlers_backend\upload_file_handler.php
'upload_file_handler_successful_uploaded' => 'Die Datei wurde erfolgreich hochgeladen.',
'upload_file_handler_btn_return' => 'Zurück',
//handlers_backend\upload_file_handler.php

//handlers_backend\edit_uploaded_file_handler.php
'edit_uploaded_file_handler_file_dont_exist' => 'Die Datei existiert nicht.',
'edit_uploaded_file_handler_successful_edited' => 'Die Datei wurde erfolgreich bearbeitet.',
'edit_uploaded_file_handler_btn_return' => 'Zurück',
//handlers_backend\edit_uploaded_file_handler.php

//handlers_backend\users_handler.php
'users_handler_successful_removed' => 'Der Benutzer wurde erfolgreich gelöscht.',
'users_handler_successful_updated' => 'Die Benutzerstufe wurde erfolgreich aktualisiert.',
'users_handler_btn_return' => 'Zurück',
//handlers_backend\users_handler.php

//handlers_backend\email_config_handler.php
'email_config_handler_successful_edited' => 'Die Zugangsdaten sind korrekt und wurden erfolgreich aktualisiert.',
'email_config_handler_btn_return' => 'Zurück',
//handlers_backend\email_config_handler.php

//handlers_backend\show_user_activity_log_handler.php
'show_user_activity_log_handler_user_dont_exist' => 'Ein solcher Benutzer existiert nicht.',
'show_user_activity_log_handler_btn_return' => 'Zurück',
//handlers_backend\show_user_activity_log_handler.php

//handlers_backend\show_hidden_comments_handler.php
'show_hidden_comments_handler_successful_viewed' => 'Alle Einträge wurden erfolgreich als gelesen markiert.',
'show_hidden_comments_handler_btn_return' => 'Zurück',
//handlers_backend\show_hidden_comments_handler.php

//handlers_backend\manage_themes_handler.php
'manage_themes_handler_successful_activated' => 'Das ausgewählte Theme wurde erfolgreich aktiviert.',
'manage_themes_handler_successful_deactivated' => 'Das ausgewählte Theme wurde erfolgreich deaktiviert.',
'manage_themes_handler_btn_return' => 'Zurück',
//handlers_backend\manage_themes_handler.php

//handlers_backend\show_custom_widgets_handler.php
'show_custom_widgets_handler_successful_removed' => 'Das ausgewählte Widget wurde erfolgreich gelöscht.',
'show_custom_widgets_handler_btn_return' => 'Zurück',
//handlers_backend\show_custom_widgets_handler.php

//handlers_backend\show_custom_widgets_handler.php
'create_custom_widget_handler_saved' => 'Das ausgewählte Widget wurde erfolgreich erstellt.',
'create_custom_widget_handler_btn_return' => 'Zurück',
//handlers_backend\show_custom_widgets_handler.php

//handlers_backend\edit_custom_widgets_handler.php
'edit_custom_widget_handler_page_dont_exist' => 'Ein solches Widget-Element existiert nicht.',
'edit_custom_widget_handler_successful_edited' => 'Das Widget wurde erfolgreich bearbeitet.',
'edit_custom_widget_handler_btn_return' => 'Zurück',
//handlers_backend\edit_custom_widgets_handler.php

];
