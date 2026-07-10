<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//backend_system_message_template.php
//MMXXVI MSCRATCH
?>

<!DOCTYPE html>
<html lang="de">
<head>
<title><?php echo sanitize_1(SCRIPTNAME);?></title>
<meta charset="utf-8">
<meta name="author" content="MSCRATCH">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="<?= BASE_URL ?>themes/backend_theme/css/backend_system_message.css" media="all" type="text/css">
<link rel="stylesheet" href="<?= BASE_URL ?>fontawesome/css/all.min.css" />
</head>
<body>
<div class="main_wrapper">
<div class="wrapper">
<div class="wrapper_title"><h1><i class="fa-solid fa-gear"></i> <?php echo sanitize_1(SCRIPTNAME);?></h1></div>
<div class="wrapper_content">
<p class="paragraph_nm"><?php echo sanitize_1($backend_system_message['message_text']);?></p>
</div>
<div class="wrapper_footer">
<div class="btn_row">
<a class="btn btn--btn_primary btn_mt" href="<?php echo sanitize_1($backend_system_message['message_url']);?>"><?php echo sanitize_1($backend_system_message['message_button_text']);?></a>
</div>
</div>
</div>
<footer class="footer">
<div class="footer_title">This page is based on <?php echo sanitize_1(SCRIPTNAME);?> <?php echo sanitize_1(VERSION);?> programmed by <?php echo sanitize_1(AUTHOR);?></div>
</footer>
</div>
</body>
</html>
