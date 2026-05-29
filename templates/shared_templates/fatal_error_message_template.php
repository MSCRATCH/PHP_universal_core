<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//fatal_error_message_template.php
//MMXXVI MSCRATCH
?>

<!DOCTYPE html>
<html lang="de">
<head>
<title><?php echo htmlentities(SCRIPTNAME);?></title>
<meta charset="utf-8">
<meta name="author" content="MSCRATCH">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="<?= BASE_URL ?>themes/default_theme/default.css" media="all" type="text/css">
<link rel="stylesheet" href="<?= BASE_URL ?>fontawesome/css/all.min.css" />
</head>
<body>
<div class="main_wrapper">
<div class="<?php echo htmlentities($fatal_error_message['message_wrapper']);?>">
<div class="wrapper_title"><h3><i class="fa-solid fa-bug"></i> <?php echo htmlentities($fatal_error_message['message_title']);?></h3></div>
<div class="wrapper_content">
<p class="paragraph_mb"><?php echo htmlentities($fatal_error_message['message_text']);?></p>
<?php if ($fatal_error_message['view_missing_files'] === "yes") { ?>
<ul>
<?php foreach ($fatal_error_message['missing_files'] as $missing_file) {  ?>
<li><?php echo htmlentities($missing_file);?></li>
<?php } ?>
</ul>
<?php } ?>
</div>
</div>
<footer class="footer_secondary">
<div class="footer_title">This page is based on <?php echo htmlentities(SCRIPTNAME);?> <?php echo htmlentities(VERSION);?> programmed by <?php echo htmlentities(AUTHOR);?></div>
</footer>
</div>
</body>
</html>
