<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//frontend_system_message.php
//MMXXVI MSCRATCH

function frontend_system_message(array $frontend_system_message, array $settings, array $activated_theme) {
if (! empty($frontend_system_message)) {
require templates_path . "/frontend_templates/frontend_system_message_template.php";
exit();
}
}
