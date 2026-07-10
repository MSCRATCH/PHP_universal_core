<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//contact_email_template.php
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
<p><?php echo htmlentities($email_text_form);?></p>
</body>
</html>
