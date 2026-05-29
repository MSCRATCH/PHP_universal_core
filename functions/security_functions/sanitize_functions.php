<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//sanitize_functions.php
//MMXXVI MSCRATCH

function sanitize_1(?string $content) {
$content = trim($content ?? '');
$content = htmlentities($content ?? '', ENT_QUOTES, "UTF-8");
return ($content);
}

function sanitize_2(?string $content) {
$content = trim($content ?? '');
$content = strtoupper($content ?? '');
$content = htmlentities($content ?? '', ENT_QUOTES, "UTF-8");
return ($content);
}

function sanitize_3(?string $content) {
$content = trim($content ?? '');
$content = ucfirst($content ?? '');
$content = htmlentities($content ?? '', ENT_QUOTES, "UTF-8");
return ($content);
}
