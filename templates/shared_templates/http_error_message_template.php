<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//http_error_message_template.php
//MMXXVI MSCRATCH
?>

<!DOCTYPE html>
<html lang="de">
<head>
<title><?php echo sanitize_1(SCRIPTNAME);?></title>
<meta charset="utf-8">
<meta name="author" content="MSCRATCH">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="<?= BASE_URL ?>themes/<?php echo sanitize_1($activated_theme['theme_key']);?>/<?php echo sanitize_1($activated_theme['theme_stylesheet']);?>" media="all" type="text/css">
<link rel="stylesheet" href="<?= BASE_URL ?>fontawesome/css/all.min.css" />
</head>
<body>
<div class="main_wrapper">
<div class="<?php echo sanitize_1($http_error_message['message_wrapper']);?>">
<div class="wrapper_title"><h3><i class="fa-solid fa-signs-post"></i> <?php echo sanitize_1($http_error_message['message_title']);?></h3></div>
<div class="wrapper_content">
<p class="paragraph_mb"><?php echo sanitize_1($http_error_message['message_text']);?></p>
<a class="btn btn--btn_primary" href="<?= BASE_URL ?>blog"><?php echo sanitize_1($http_error_message['message_button_text']);?></a>
</div>
</div>
<footer class="footer_secondary">
<div class="footer_title">This page is based on <?php echo sanitize_1(SCRIPTNAME);?> <?php echo sanitize_1(VERSION);?> programmed by <?php echo sanitize_1(AUTHOR);?></div>
</footer>
</div>
</body>
</html>
