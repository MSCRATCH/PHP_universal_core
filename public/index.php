<?php
//This file is part of PHPUC
//index.php
//MMXXVI MSCRATCH

//start timer to measure render time.

define('PHPUC_START', microtime(true));

//define constant to prevent direct access to files.

define('CORE_LOADED', true);

//starting and hardening sessions.

ini_set('session.use_only_cookies', 1);
ini_set('session.use_strict_mode', 1);
session_start ();

//define constants for script information.

define('SCRIPTNAME', 'PHPUC');
define('FULL_SCRIPTNAME', 'PHP universal core');
define('VERSION', '3.0.0');
define('AUTHOR', 'MSCRATCH');
define('YEAR', 'MMXXV');

//disable php error reporting.

error_reporting(0);
ini_set('display_errors', 0);

//run pina installation script.

if (file_exists( __DIR__ . '/..' . '/install.php')) {
require_once  __DIR__ . '/..'. '/install.php';
exit();
}

//include path definitions, fatal error system, http error system, and core loader.

require_once '../includes/paths.php';
require_once message_functions_path. '/fatal_error_message.php';
require_once message_functions_path. '/http_error_message.php';
require_once includes_path. '/core_loader.php';

//define content security policy to prevent the embedding of external resources.
//blocks the embedding of external image sources.
//no additional validation available for external image sources.

$csp = "default-src 'self'; "
. "script-src 'self'; "
. "style-src 'self'; "
. "font-src 'self'; "
. "img-src 'self' data:;";

header("Content-Security-Policy: $csp");

//establish connection to db.

$db = connect($text_fatal_error_message);

//save php error messages to db.

register_error_handler($db);

//load settings.

$settings = load_settings($db, $text_fatal_error_message);

//load the active frontend theme. default_theme by default.

$activated_theme = get_activated_theme($db);

//include language files and app loader.

require_once includes_path. '/lang_loader.php';
require_once includes_path. '/app_loader.php';

//set cct.

if (user_is_logged_in() === false) {
set_cct();
}

//log all requests.

log_requests($db);

//handle file requests.

handle_file_requests($db, $text_functions, $text_handlers, $text_templates, $settings);

//update recent activity.

if (user_is_logged_in() === true) {
$user_id_front_controller = get_user_id();
update_last_activity($db, $user_id_front_controller);
}

//the front controller loads the handlers, which pass everything on to render_page.
//index->front_controller->handlers->render_page->templates->layout.

front_controller($db, $settings, $allowed_frontend_sections, $allowed_backend_sections, $text_functions, $text_handlers, $text_templates, $text_fatal_error_message, $activated_theme);

//display cct.

if (user_is_logged_in() === false) {
echo cct($text_functions);
}
