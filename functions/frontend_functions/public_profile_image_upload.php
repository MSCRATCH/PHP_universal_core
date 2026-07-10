<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//public_profile_image_upload.php
//MMXXVI MSCRATCH

function create_new_profile_image_name(string $file_name) {
$profile_image_name = uniqid();
$file_extension = pathinfo($file_name, PATHINFO_EXTENSION);
return $new_profile_image_name = $profile_image_name.  "." . $file_extension;
}

function check_if_profile_image_exists_db(mysqli $db, int $profile_user_id) {
$stmt = $db->prepare("SELECT user_profile_image FROM user_profiles WHERE user_id = ?");
$stmt->bind_param('i', $profile_user_id);
$stmt->execute();
$stmt->bind_result($user_profile_picture);
$stmt->fetch();
$stmt->close();
if (! empty($user_profile_picture)) {
$path = profile_images_path. '/'. basename($user_profile_picture);
if (file_exists($path)) {
unlink($path);
}
}
}

function update_profile_image_name_db(mysqli $db, int $profile_user_id, string $new_profile_image_name) {
$stmt = $db->prepare("UPDATE user_profiles SET user_profile_image = ? WHERE user_id = ? LIMIT 1");
$stmt->bind_param('si', $new_profile_image_name, $profile_user_id);
$stmt->execute();
$stmt->store_result();
if ($stmt->affected_rows === 1) {
$stmt->close();
return true;
} else {
$stmt->close();
return false;
}
}

function validate_profile_image(array $profile_image_file, array $text_functions, array $allowed_image_extensions, array $allowed_image_mime_types, int $maximum_image_size, string $file_name, int $file_error, string $file_size, string $file_type, string $file_tmp_name) {

$errors = array();

if (isset($profile_image_file) && is_array($profile_image_file)) {
if ($file_error === UPLOAD_ERR_OK) {
if ($file_size > $maximum_image_size) {
$errors [] = $text_functions['message_profile_image_invalid_size'];
}

$image_extension = pathinfo($file_name, PATHINFO_EXTENSION);
if (! in_array(strtolower($image_extension), $allowed_image_extensions)) {
$errors [] = $text_functions['message_profile_image_invalid_extension'];
}

$finfo = finfo_open(FILEINFO_MIME_TYPE);
$real_mime = finfo_file($finfo, $file_tmp_name);
finfo_close($finfo);

if (! in_array($real_mime, $allowed_image_mime_types)) {
$errors[] = $text_functions['message_profile_image_invalid_type'];
}

$file_image_size = getimagesize($file_tmp_name);
if ($file_image_size !== false) {
$width = $file_image_size[0];
$height = $file_image_size[1];

if ($width !== 500 or $height !== 500) {
$errors [] = $text_functions['message_profile_image_invalid_dimension'];
}
} else {
$errors [] = $text_functions['message_profile_image_invalid_dimension'];
}
} elseif ($file_error === UPLOAD_ERR_NO_FILE) {
$errors [] = $text_functions['message_profile_image_no_file'];
}
}
return $errors;
}

function upload_profile_image(mysqli $db, array $text_functions, array $profile_image_file, int $profile_user_id) {

$allowed_image_extensions = array("jpg", "jpeg", "png");
$allowed_image_mime_types = array('image/jpeg', 'image/png');
$maximum_image_size = 2 * 1024 * 1024;

$file_name = $profile_image_file['name'];
$file_error = $profile_image_file['error'];
$file_size = $profile_image_file['size'];
$file_type = $profile_image_file['type'];
$file_tmp_name = $profile_image_file['tmp_name'];

$errors = validate_profile_image($profile_image_file, $text_functions, $allowed_image_extensions, $allowed_image_mime_types, $maximum_image_size, $file_name, $file_error, $file_size, $file_type, $file_tmp_name);

if (empty($errors)) {
$new_profile_image_name = create_new_profile_image_name($file_name);
$upload_path = profile_images_path. '/' . $new_profile_image_name;
if (move_uploaded_file($file_tmp_name , $upload_path)) {
check_if_profile_image_exists_db($db, $profile_user_id);
if (update_profile_image_name_db($db, $profile_user_id, $new_profile_image_name)) {
return true;
} else {
unlink($upload_path);
}
} else {
return false;
}
} else {
return $errors;
}
}
