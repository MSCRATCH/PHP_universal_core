<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//format_file_size.php
//MMXXVI MSCRATCH

function get_file_size($file_path) {
if (file_exists($file_path)) {
$file_size = filesize($file_path);
$formatted_file_size = format_file_size($file_size);
return $formatted_file_size;
} else {
return 0;
}
}

function format_file_size($bytes) {
if ($bytes < 1024) return $bytes. "B";
elseif ($bytes < 1048576) return round($bytes / 1024, 2). "KB";
elseif ($bytes < 1073741824) return round($bytes / 1048576, 2). "MB";
else return round($bytes / 1073741824, 2). "GB";
}
