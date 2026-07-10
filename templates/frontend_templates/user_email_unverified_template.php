<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//user_email_unverified_template.php
//MMXXVI MSCRATCH
?>

<?php $token_resend_verification_email = generate_token('resend_verification_email');?>

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
<div class="wrapper_title"><h1><i class="fa-solid fa-lock"></i> <?php echo sanitize_1($text_templates['user_not_verified_email_template_title']);?></h1></div>
<div class="wrapper_content">
<p class="paragraph_nm"><?php echo sanitize_1($text_templates['user_not_verified_email_template_text']);?></p>
</div>
<div class="wrapper_footer">
<div class="btn_row">
<form method="post">
<input type="hidden" name="csrf_token" value="<?php echo $token_resend_verification_email;?>">
<button class="btn btn--btn_dng" type="submit" name="resend_verification_email"><?php echo sanitize_1($text_templates['user_not_verified_email_template_btn_resend_verification_email']);?></button>
</form>
<a class="btn btn--btn_primary" href="<?= BASE_URL ?>logout"><?php echo sanitize_1($text_templates['user_not_verified_email_template_btn_logout']);?></a>
</div>
</div>
</div>
<footer class="footer">
<div class="footer_title"><?php echo sanitize_1($settings['footer_text']);?></div>
</footer>
</div>
</body>
</html>
