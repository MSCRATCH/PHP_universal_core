<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//frontend_system_message_template.php
//MMXXVI MSCRATCH
?>

<!DOCTYPE html>
<html lang="de">
<head>
<title><?php echo sanitize_1($settings['page_title']);?></title>
<meta charset="utf-8">
<meta name="robots" content="INDEX,FOLLOW">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="MSCRATCH">
<meta name="revisit-after" content="2 days">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="<?= BASE_URL ?>themes/<?php echo sanitize_1($activated_theme['theme_key']);?>/<?php echo sanitize_1($activated_theme['theme_stylesheet']);?>" media="all" type="text/css">
<link rel="stylesheet" href="<?= BASE_URL ?>fontawesome/css/all.min.css" />
</head>
<body>
<div class="main_wrapper">
<div class="<?php echo sanitize_1($frontend_system_message['message_wrapper']);?>">
<div class="wrapper_title"><h3><i class="fa-solid fa-gear"></i> <?php echo sanitize_1($settings['system_message_title']);?></h3></div>
<div class="wrapper_content">
<p class="paragraph_nm"><?php echo sanitize_1($frontend_system_message['message_text']);?></p>
<a class="btn btn--btn_primary btn_mt" href="<?php echo sanitize_1($frontend_system_message['message_url']);?>"><?php echo sanitize_1($frontend_system_message['message_button_text']);?></a>
</div>
</div>
<footer class="footer_secondary">
<div class="footer_title"><?php echo sanitize_1($settings['footer_text']);?></div>
</footer>
</div>
</body>
</html>
