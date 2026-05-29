<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//get_profile_widget.php
//MMXXVI MSCRATCH

function get_profile_widget($profile, $text_templates) {
ob_start();
require templates_path . "/widget_templates/profile_widget_template.php";
return ob_get_clean();
}
