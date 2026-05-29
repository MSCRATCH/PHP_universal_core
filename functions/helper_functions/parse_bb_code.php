<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//parse_bb_code.php
//MMXXVI MSCRATCH

function parse_bb_code(mysqli $db, string $text, array $text_functions) {
$text = trim($text ?? '');
$text = htmlentities($text ?? '', ENT_QUOTES, "UTF-8");
/* [H][/H]*/ $text = preg_replace("/\[H\](.*)\[\/H\]/Usi", "<H3>\\1</H3>", $text);
/* [A][/A]*/ $text = preg_replace("/\[A\](.*)\[\/A\]/Usi", '<p class="bb_code_paragraph">\\1</p>', $text);
/* [LIST][/LIST]*/ $text = preg_replace("/\[LIST\](.*)\[\/LIST\]/Usi", '<ul class="bb_code_ul">\\1</ul>', $text);
/* [LIST_ITEM][/LIST_ITEM]*/ $text = preg_replace("/\[LIST_ITEM\](.*)\[\/LIST_ITEM\]/Usi", '<li class="bb_code_li">\\1</li>', $text);

/* [IMG][/IMG] */
$text = preg_replace_callback(
'/\[IMG\](.*?)\[\/IMG\]/si',
function ($m) use ($db, $text_functions) {
$file = trim($m[1]);
$file_data = get_uploaded_file_by_file_name($db, $file);
if ($file_data !== false) {
$file_name = $file_data['file_name'];
$title = $file_data['file_title'];
$url = BASE_URL . 'file/' . urlencode($file_data['file_name']);
return '<div class="bb_code_wrapper">'.
'<div class="bb_code_title"><h2><i class="fa-solid fa-image"></i>&nbsp;' . htmlspecialchars($title) . '</h2></div>'. '<img src="'. htmlspecialchars($url) . '" class="bb_code_image" alt="' . htmlspecialchars($file_name). '" title="'. htmlspecialchars($file_name). '">'. '</div>';
} else {
$error =  $text_functions['parse_bb_code_no_file'];
return '<div class="bb_code_wrapper"><div class="bb_code_title"><h2><i class="fa-solid fa-image"></i>&nbsp;'. htmlspecialchars($error). '</h2></div>'. '<div class="bb_code_content">' . htmlspecialchars($error) . '</div>'. '</div>';
}
},
$text
);

/* [FILE][/FILE] */
$text = preg_replace_callback(
'/\[FILE\](.*?)\[\/FILE\]/si',
function ($m) use ($db, $text_functions) {
$file = trim($m[1]);
$file_data = get_uploaded_file_by_file_name($db, $file);
if ($file_data !== false) {
$file_name = $file_data['file_name'];
$title = $file_data['file_title'];
$url = BASE_URL . 'file/' . urlencode($file_data['file_name']);
return '<div class="bb_code_wrapper">'. '<div class="bb_code_title"><h2><i class="fa-solid fa-cloud"></i>&nbsp;'. htmlspecialchars($title) . '</h2>'. '</div>'. '<div class="bb_code_download_wrapper">'. '<a href="' . htmlspecialchars($url). '" class="bb_code_download">'. htmlspecialchars($file_name). '</a>'. '</div>'. '</div>';
} else {
$error =  $text_functions['parse_bb_code_no_file'];
return '<div class="bb_code_wrapper"><div class="bb_code_title"><h2><i class="fa-solid fa-cloud"></i>&nbsp;'. htmlspecialchars($error). '</h2>'. '</div>'. '<div class="bb_code_content">' . htmlspecialchars($error) . '</div>'. '</div>';
}
},
$text
);

$text = preg_replace_callback(
'/\[VIDEO(?:=(.*?))?\](.*?)\[\/VIDEO\]/si',
function ($m) use ($db, $text_functions) {
$thumbnail = trim($m[1] ?? '');
$file = trim($m[2]);
$file_data = get_uploaded_file_by_file_name($db, $file);
if ($file_data !== false) {
$file_name = $file_data['file_name'];
$title = $file_data['file_title'];
$url = BASE_URL . 'file/' . urlencode($file_name);
$ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
if (! in_array($ext, ['mp4'], true)) {
$error = $text_functions['parse_bb_code_no_file'];
return '<div class="bb_code_wrapper"><div class="bb_code_title"><h2>
<i class="fa-solid fa-camera"></i>&nbsp;' . htmlspecialchars($error) . '</h2></div><div class="bb_code_content">' . htmlspecialchars($error) . '</div></div>';
}
$poster = '';
if ($thumbnail !== '') {
$thumb_data = get_uploaded_file_by_file_name($db, $thumbnail);
if ($thumb_data !== false) {
$poster_url = BASE_URL . 'file/' . urlencode($thumb_data['file_name']);
$poster = ' poster="' . htmlspecialchars($poster_url) . '"';
}
}
return '<div class="bb_code_wrapper"><div class="bb_code_title"><h2>
<i class="fa-solid fa-camera"></i>&nbsp;' . htmlspecialchars($title) . '</h2></div><video class="bb_code_video" controls preload="metadata"' . $poster . '>
<source src="' . htmlspecialchars($url) . '" type="video/' . $ext . '"></video></div>';
} else {
$error = $text_functions['parse_bb_code_no_file'];
return '<div class="bb_code_wrapper"><div class="bb_code_title">
<i class="fa-solid fa-camera"></i>&nbsp;' . htmlspecialchars($error) . '</div>
<div class="bb_code_content">' . htmlspecialchars($error) . '</div></div>';
}
},
$text
);
return ($text ?? '');
}
