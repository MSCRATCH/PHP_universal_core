<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//public_custom_widgets.php
//MMXXVI MSCRATCH

function get_custom_widgets(mysqli $db) {
$stmt = $db->query("SELECT custom_widget_id, custom_widget_content, custom_widget_placeholder FROM custom_widgets");
$custom_widgets = $stmt->fetch_all(MYSQLI_ASSOC);
$stmt->free();
if (! empty($custom_widgets)) {
return $custom_widgets;
} else {
return false;
}
}
