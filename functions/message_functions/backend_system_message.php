<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//backend_system_message.php
//MMXXVI MSCRATCH

function backend_system_message(array $backend_system_message, array $settings) {
if (! empty($backend_system_message)) {
require templates_path . "/backend_templates/backend_system_message_template.php";
exit();
}
}
