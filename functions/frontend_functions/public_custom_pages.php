<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//public_custom_pages.php
//MMXXVI MSCRATCH

function get_custom_page(mysqli $db, string $section) {
$stmt = $db->prepare("SELECT custom_page_title, custom_page_content FROM custom_pages WHERE custom_page_url = ?");
$stmt->bind_param('s', $section);
$stmt->execute();
$result = $stmt->get_result();
if ($result && $row = $result->fetch_assoc()) {
$stmt->close();
return $row;
} else {
$stmt->close();
return false;
}
}
