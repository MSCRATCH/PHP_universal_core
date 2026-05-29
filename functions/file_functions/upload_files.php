<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//upload_files.php
//MMXXVI MSCRATCH

function get_total_number_of_uploaded_files_by_user(mysqli $db, int $user_id_upload_files){
if (user_is_administrator() === true) {
$stmt = $db->query("SELECT COUNT(*) AS count_result FROM files");
$row = $stmt->fetch_assoc();
$stmt->free();
return $row['count_result'];
} elseif (user_is_moderator() === true) {
$stmt = $db->prepare("SELECT COUNT(*) AS count_result FROM files WHERE file_user_id = ?");
$stmt->bind_param('i', $user_id_upload_files);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$stmt->close();
return $row['count_result'];
}
}

function get_paginated_uploaded_files_by_user(mysqli $db, int $offset,int  $entries_per_page, int $user_id_upload_files) {
if (user_is_administrator() === true) {
$stmt = $db->prepare("SELECT files.file_id, files.file_name, files.file_title, files.file_description, users.username FROM files INNER JOIN users ON files.file_user_id = users.user_id ORDER BY files.file_id DESC LIMIT ?, ?");
$stmt->bind_param('ii', $offset, $entries_per_page);
$stmt->execute();
$result = $stmt->get_result();
$uploaded_files = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
if ($uploaded_files !== false && ! empty($uploaded_files)) {
return $uploaded_files;
} else {
return false;
}
} elseif (user_is_moderator() === true) {
$stmt = $db->prepare("SELECT file_id, file_name, file_title, file_description FROM files WHERE file_user_id = ? ORDER BY file_id DESC LIMIT ?, ?");
$stmt->bind_param('iii', $user_id_upload_files, $offset, $entries_per_page);
$stmt->execute();
$result = $stmt->get_result();
$uploaded_files = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
if ($uploaded_files !== false && ! empty($uploaded_files)) {
return $uploaded_files;
} else {
return false;
}
}
}

function check_file_id_by_user(mysqli $db, int $file_id_get, int $user_id_upload_files) {
if (user_is_administrator() === true) {
$stmt = $db->prepare("SELECT file_id FROM files WHERE file_id = ?");
$stmt->bind_param('i', $file_id_get);
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows !== 1) {
$stmt->close();
return false;
} else {
$stmt->close();
return true;
}
} elseif (user_is_moderator() === true) {
$stmt = $db->prepare("SELECT file_id FROM files WHERE file_id = ? AND file_user_id = ?");
$stmt->bind_param('ii', $file_id_get, $user_id_upload_files);
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
}

function get_uploaded_files_by_id_and_by_user(mysqli $db, int $file_id_get, int $user_id_upload_files) {
if (user_is_administrator() === true) {
$stmt = $db->prepare("SELECT files.file_name, files.file_title, files.file_description, users.username FROM files INNER JOIN users ON files.file_user_id = users.user_id WHERE files.file_id = ?");
$stmt->bind_param('i', $file_id_get);
$stmt->execute();
$result = $stmt->get_result();
if ($result && $row = $result->fetch_assoc()) {
$stmt->close();
return $row;
} else {
$stmt->close();
return false;
}
} elseif (user_is_moderator() === true) {
$stmt = $db->prepare("SELECT file_name, file_title, file_description FROM files WHERE file_id = ? AND file_user_id = ?");
$stmt->bind_param('ii', $file_id_get, $user_id_upload_files);
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
}

function get_latest_uploaded_files_by_user(mysqli $db, int $user_id_blog_post) {
if (user_is_administrator() === true) {
$stmt = $db->query("SELECT file_name, file_title FROM files ORDER BY file_id DESC LIMIT 15");
$uploaded_files = $stmt->fetch_all(MYSQLI_ASSOC);
$stmt->free();
if ($uploaded_files !== false && ! empty($uploaded_files)) {
return $uploaded_files;
} else {
return false;
}
} elseif (user_is_moderator() === true) {
$stmt = $db->prepare("SELECT file_name, file_title FROM files WHERE file_user_id = ? ORDER BY file_id DESC LIMIT 15");
$stmt->bind_param('i', $user_id_blog_post);
$stmt->execute();
$result = $stmt->get_result();
$uploaded_files = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
if ($uploaded_files !== false && ! empty($uploaded_files)) {
return $uploaded_files;
} else {
return false;
}
}
}

function get_latest_uploaded_files(mysqli $db) {
$stmt = $db->query("SELECT file_name, file_title FROM files ORDER BY file_id DESC LIMIT 15");
$uploaded_files = $stmt->fetch_all(MYSQLI_ASSOC);
$stmt->free();
if ($uploaded_files !== false && ! empty($uploaded_files)) {
return $uploaded_files;
} else {
return false;
}
}

function get_uploaded_file_by_file_name(mysqli $db, string $file) {
$stmt = $db->prepare("SELECT file_name, file_title, file_description FROM files WHERE file_name = ?");
$stmt->bind_param('s', $file);
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

function update_file_data(mysqli $db, string $file_title_update_form, string $file_description_update_form, int $file_id_get, int $user_id_upload_files) {
if (user_is_administrator() === true) {
$stmt = $db->prepare("UPDATE files SET file_title = ?, file_description = ?  WHERE file_id = ? LIMIT 1");
$stmt->bind_param('ssi', $file_title_update_form, $file_description_update_form, $file_id_get);
if ($stmt->execute()) {
$stmt->close();
return true;
} else {
$stmt->close();
return false;
}
} elseif (user_is_moderator() === true) {
$stmt = $db->prepare("UPDATE files SET file_title = ?, file_description = ?  WHERE file_id = ? AND file_user_id = ? LIMIT 1");
$stmt->bind_param('ssii', $file_title_update_form, $file_description_update_form, $file_id_get, $user_id_upload_files);
if ($stmt->execute()) {
$stmt->close();
return true;
} else {
$stmt->close();
return false;
}
}
}

function remove_file(mysqli $db, int $file_id_form, int $user_id_upload_files) {
$result = get_uploaded_files_by_id_and_by_user($db, $file_id_form, $user_id_upload_files);
if (user_is_administrator() === true) {
$file_name = $result['file_name'];
$stmt = $db->prepare("DELETE FROM files WHERE file_id = ? LIMIT 1");
$stmt->bind_param('i', $file_id_form);
if ($stmt->execute()) {
$stmt->close();
$file_path = files_path. '/' . basename($file_name);
if (file_exists($file_path)) {
unlink($file_path);
}
return true;
} else {
$stmt->close();
return false;
}
} elseif (user_is_moderator() === true) {
$file_name = $result['file_name'];
$stmt = $db->prepare("DELETE FROM files WHERE file_id = ? AND file_user_id = ? LIMIT 1");
$stmt->bind_param('ii', $file_id_form, $user_id_upload_files);
if ($stmt->execute()) {
$stmt->close();
$file_path = files_path. '/' . basename($file_name);
if (file_exists($file_path)) {
unlink($file_path);
}
return true;
} else {
$stmt->close();
return false;
}
}
}

function create_new_file_name(string $file_name) {
$new_file_name = uniqid();
$file_extension = pathinfo($file_name, PATHINFO_EXTENSION);
return $result = $new_file_name.  "." . $file_extension;
}

function upload_file_data(mysqli $db, string $new_file_name, string $file_title_form, string $file_description_form, int $user_id_upload_files) {
$stmt = $db->prepare("INSERT INTO files(file_name, file_title, file_description, file_user_id) VALUES(?, ?, ?, ?)");
$stmt->bind_param('sssi', $new_file_name, $file_title_form, $file_description_form, $user_id_upload_files);
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

function validate_file(array $uploaded_file, array $text_functions, array $allowed_extensions, string $file_title_form, string $file_description_form, array $allowed_mime_types, int $maximum_file_size, string $file_name, int $file_error, string $file_size, string $file_tmp_name) {

$errors = array();

if (isset($uploaded_file) && is_array($uploaded_file)) {
if ($uploaded_file['error'] !== UPLOAD_ERR_OK) {
if ($uploaded_file['error'] === UPLOAD_ERR_NO_FILE) {
$errors [] = $text_functions['message_upload_files_no_file'];
}
if ($uploaded_file['error'] === UPLOAD_ERR_INI_SIZE) {
$errors [] = $text_functions['message_upload_files_invalid_size'];
}

return $errors;
}

if (empty($file_title_form)) {
$errors [] = $text_functions['message_upload_files_no_file_title'];
}

if (empty($file_description_form)) {
$errors [] = $text_functions['message_upload_files_no_file_description'];
}

$file_extension = pathinfo($file_name, PATHINFO_EXTENSION);
if (! in_array(strtolower($file_extension), $allowed_extensions)) {
$errors [] = $text_functions['message_upload_files_invalid_extension'];
}

if ($file_size > $maximum_file_size) {
$errors [] = $text_functions['message_upload_files_invalid_size'];
}

$finfo = finfo_open(FILEINFO_MIME_TYPE);
$real_mime = finfo_file($finfo, $file_tmp_name);
finfo_close($finfo);

if (! in_array($real_mime, $allowed_mime_types)) {
$errors[] = $text_functions['message_upload_files_invalid_type'];
}
return $errors;
}
}

function upload_file(mysqli $db, array $text_functions, string $file_title_form, string $file_description_form, array $uploaded_file, int $user_id_upload_files) {

$allowed_extensions = [
'zip',
'rar',
'jpg',
'jpeg',
'png',
'mp4',
];

$allowed_mime_types = [
'application/zip',
'application/x-zip-compressed',
'multipart/x-zip',
'application/x-rar',
'application/x-rar-compressed',
'application/vnd.rar',
'image/jpeg',
'image/png',
'video/mp4',
'video/mpeg',
];

$maximum_file_size = 100 * 1024 * 1024;

$file_name = $uploaded_file['name'];
$file_error = $uploaded_file['error'];
$file_size = $uploaded_file['size'];
$file_type = $uploaded_file['type'];
$file_tmp_name = $uploaded_file['tmp_name'];

$errors = validate_file($uploaded_file, $text_functions, $allowed_extensions, $file_title_form, $file_description_form, $allowed_mime_types, $maximum_file_size, $file_name, $file_error, $file_size, $file_tmp_name);

if (empty($errors)) {
$new_file_name = create_new_file_name($file_name);
$upload_path = files_path. '/' . $new_file_name;
if (move_uploaded_file($file_tmp_name , $upload_path)) {
if (upload_file_data($db, $new_file_name, $file_title_form, $file_description_form, $user_id_upload_files)) {
return true;
} else {
unlink($upload_path);
return false;
}
} else {
return false;
}
} else {
return $errors;
}
}
