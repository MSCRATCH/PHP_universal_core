<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//make_safe_url.php
//MMXXVI MSCRATCH

function make_safe_url(string $content) {
$content = strtolower($content ?? '');
$content = preg_replace('/[^a-z0-9]/', '', $content ?? '');
return ($content);
}
