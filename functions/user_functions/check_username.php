<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//check_username.php
//MMXXVI MSCRATCH

function check_username(mysqli $db, string $username_get) {
$stmt = $db->prepare("SELECT user_id FROM users WHERE username = ?");
$stmt->bind_param('s', $username_get);
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows !== 1) {
$stmt->close();
return false;
} else {
$stmt->close();
return true;
}
}
