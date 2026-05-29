<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//serve_uploaded_file_template.php
//MMXXVI MSCRATCH
?>

<?php $token_download_file = generate_token('download_file'); ?>
<?php $previous_link = $_SERVER['HTTP_REFERER']; ?>
<?php $file_path = files_path. '/'. $file_data['file_name']; ?>
<?php $file_size = get_file_size($file_path); ?>

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
<link rel="stylesheet" href="<?= BASE_URL ?>themes/default_theme/default.css" media="all" type="text/css">
<link rel="stylesheet" href="<?= BASE_URL ?>fontawesome/css/all.min.css" />
</head>
<body>
<div class="main_wrapper">
<div class="wrapper_narrow_bg">
<div class="wrapper_title"><h3><i class="fa-solid fa-cloud"></i> <?php echo sanitize_1($file_data['file_title']);?> <?php echo sanitize_1($file_size);?></h3></div>
<div class="wrapper_content">
<p class="paragraph_nm"><?php echo sanitize_1($file_data['file_description']);?></p>
<form method="post">
<input type="hidden" name="csrf_token" value="<?php echo $token_download_file;?>">
<button class="btn btn--btn_primary btn_mt" type="submit" name="download_file"><?php echo sanitize_1($text_templates['serve_uploaded_file_template_btn_download_file']);?></button>
</form>
<?php  if (empty($previous_link)) { ?>
<a class="btn btn--btn_primary btn_mt" href="<?= BASE_URL ?>home"><?php echo sanitize_1($text_templates['serve_uploaded_file_template_btn_return']);?></a>
<?php } else { ?>
<a class="btn btn--btn_dng btn_mt" href="<?php echo sanitize_1($previous_link);?>"><?php echo sanitize_1($text_templates['serve_uploaded_file_template_btn_return']);?></a>
<?php } ?>
</div>
</div>
<footer class="footer_secondary">
<div class="footer_title">This page is based on <?php echo SCRIPTNAME;?> <?php echo VERSION;?> programmed by <?php echo AUTHOR;?></div>
</footer>
</div>
</body>
</html>
