<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//maintenance_mode_template.php
//MMXXVI MSCRATCH
?>

<!DOCTYPE html>
<html lang="de">
<head>
<title><?php echo sanitize_1($settings['page_title']);?></title>
<meta charset="utf-8">
<meta name="author" content="MSCRATCH">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="<?= BASE_URL ?>themes/<?php echo sanitize_1($activated_theme['theme_key']);?>/css/system_pages.css" media="all" type="text/css">
<link rel="stylesheet" href="<?= BASE_URL ?>fontawesome/css/all.min.css" />
</head>
<body>
<div class="main_wrapper">
<div class="wrapper">
<div class="wrapper_title"><h1><i class="fa-solid fa-lock"></i> <?php echo sanitize_1($text_templates['maintenance_mode_template_title']);?></h1></div>
<div class="wrapper_content">
<p class="paragraph_nm"><?php echo sanitize_1($text_templates['maintenance_mode_template_text']);?></p>
</div>
<div class="wrapper_footer">
<div class="btn_row">
<?php  if (user_is_logged_in() === true) { ?>
<a class="btn btn--btn_primary btn_mt" href="<?= BASE_URL ?>logout"><?php echo sanitize_1($text_templates['maintenance_mode_template_btn_logout']);?></a>
<?php } else { ?>
<a class="btn btn--btn_primary btn_mt" href="<?= BASE_URL ?>login"><?php echo sanitize_1($text_templates['maintenance_mode_template_btn_login']);?></a>
<?php } ?>
</div>
</div>
</div>
<footer class="footer">
<div class="footer_title"><?php echo sanitize_1($settings['footer_text']);?></div>
</footer>
</div>
</body>
</html>
