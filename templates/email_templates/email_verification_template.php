<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//email_verification_template.php
//MMXXVI MSCRATCH
?>

<!DOCTYPE html>
<html lang="de">
<head>
<meta charset="utf-8">
<title><?php echo htmlentities($settings['page_title']);?></title>
</head>
<body>
<h1><?php echo htmlentities($settings['page_title']);?></h1>
<p><?php echo htmlentities($text_templates['email_verification_template_text']);?></p>
<p><a href="<?php echo htmlspecialchars($verify_email_link);?>"><?php echo htmlentities($verify_email_link);?></a></p>
</body>
</html>
