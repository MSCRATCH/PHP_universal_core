<?php
//This file is part of PHPUC
//index.php
// @name      PHP universal core
// @author    MSCRATCH
// @copyright Copyright MMXXVI, MSCRATCH
// @version   1.2.1 stable
// @license   https://creativecommons.org/licenses/by/4.0/deed.en

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
define('VERSION', '1.2.1');
define('AUTHOR', 'MSCRATCH');
define('YEAR', 'MMXXV');

//define content security policy to prevent the embedding of external resources.
//also blocks the embedding of external image sources.
//no additional validation available for external image sources.
//disabling "img-src 'self' data:;" would allow users to embed external image sources without further validation. Disable at your own risk.

$csp = "default-src 'self'; "
. "script-src 'self'; "
. "style-src 'self'; "
. "font-src 'self'; "
. "img-src 'self' data:; "
. "frame-ancestors 'none'; ";

header("Content-Security-Policy: $csp");

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
require_once core_functions_path. '/sanitize_functions.php';
require_once message_functions_path. '/fatal_error_message.php';
require_once message_functions_path. '/http_error_message.php';
require_once core_functions_path. '/register_exception_handler.php';

require_once core_functions_path. '/check_system_requirements.php';
require_once core_functions_path. '/db.php';
require_once core_functions_path. '/register_error_handler.php';

//additional check of the compatibility.

check_system_requirements($text_fatal_error_message);

//establish connection to db.

$db = connect($text_fatal_error_message);

//save php error messages to db.

register_error_handler($db);

//load feature flags.

require_once core_functions_path. '/load_feature_flags.php';

$feature_flags = load_feature_flags($db, $text_fatal_error_message);

//load settings

require_once core_functions_path. '/load_settings.php';

$settings = load_settings($db, $text_fatal_error_message);

require_once includes_path. '/lang_files.php';
require_once includes_path. '/lang_loader.php';
require_once includes_path. '/core_loader.php';


//load the active frontend theme. default_theme by default.

$activated_theme = load_activated_theme($db);

//limit the access rate for specific pages.

if ($feature_flags['rate_limiter_enabled'] === 1) {
rate_limiter($db, $text_functions, $settings, $activated_theme);
}

//include app loader.

require_once includes_path. '/app_loader.php';

//set cct.

if (user_is_logged_in() === false && $feature_flags['cct_enabled'] === 1) {
set_cct();
}

//log all requests.

if ($feature_flags['log_requests_enabled'] === 1) {
log_requests($db);
}

//handle file requests.

handle_file_requests($db, $text_functions, $text_handlers, $text_templates, $settings, $activated_theme);

//update recent activity.

if (user_is_logged_in() === true) {
$user_id_front_controller = get_user_id();
update_last_activity($db, $user_id_front_controller);
}

//the front controller loads the handlers, which pass everything on to render_page.
//index->front_controller->handlers->render_page->templates->layout.

front_controller($db, $settings, $feature_flags, $allowed_frontend_sections, $allowed_backend_sections, $text_functions, $text_handlers, $text_templates, $text_fatal_error_message, $activated_theme);

//display cct.

if (user_is_logged_in() === false && $feature_flags['cct_enabled'] === 1) {
echo cct($text_functions);
}
