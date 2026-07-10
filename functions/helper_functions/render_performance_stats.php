<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//render_performance_stats.php
//MMXXVI MSCRATCH

function render_performance_stats($text_functions) {
$performance_stats = array();
if (user_is_administrator() === true) {
$performance_stats['page_rendering_time'] = $text_functions['page_rendering_time']. "&nbsp;". round((microtime(true) - PHPUC_START) * 1000, 2). "MS";
$performance_stats['memory_usage'] = $text_functions['memory_usage']. "&nbsp;". round(memory_get_peak_usage(true) / 1024 / 1024 , 2). "MB";
$performance_stats['included_files'] = $text_functions['included_files']. "&nbsp;". count(get_included_files());
return $performance_stats;
} else {
$performance_stats ['page_rendering_time'] = '';
$performance_stats ['memory_usage'] = '';
$performance_stats ['included_files'] = '';
return $performance_stats;
}
}
