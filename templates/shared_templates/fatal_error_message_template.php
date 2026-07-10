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
<link rel="stylesheet" href="<?= BASE_URL ?>assets/fatal_error_message.css" media="all" type="text/css">
<link rel="stylesheet" href="<?= BASE_URL ?>fontawesome/css/all.min.css" />
</head>
<body>
<div class="main_wrapper">
<div class="wrapper">
<div class="wrapper_title"><h1><i class="fa-solid fa-bug"></i> <?php echo htmlentities($fatal_error_message['message_title']);?></h1></div>
<div class="wrapper_content">
<span class="span_red margin_bottom"><?php echo htmlentities($fatal_error_message['message_additional_title']);?></span>
<p class="paragraph_nm"><?php echo htmlentities($fatal_error_message['message_text']);?></p>
<?php if (! empty($fatal_error_message['message_ref_code'])) { ?>
<span class="span_red margin_top"><?php echo htmlentities($text_fatal_error_message['fatal_error_message_incident_reference_title']);?> <?php echo htmlentities($fatal_error_message['message_ref_code']);?></span>
<?php } ?>
</div>
<div class="wrapper_footer"><?php echo htmlentities(FULL_SCRIPTNAME);?> error system</div>
</div>
<footer class="footer">
<div class="footer_title">This page is based on <?php echo htmlentities(SCRIPTNAME);?> <?php echo htmlentities(VERSION);?> programmed by <?php echo htmlentities(AUTHOR);?></div>
</footer>
</div>
</body>
</html>
