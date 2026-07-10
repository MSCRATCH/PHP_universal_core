<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//install_header_template.php
//MMXXVI MSCRATCH
?>

<!DOCTYPE html>
<html lang="de">
<head>
<title><?php echo htmlentities(INSTALLER_SCRIPTNAME);?> <?php echo htmlentities(INSTALLER_SCRIPTVERSION);?></title>
<meta charset="utf-8">
<meta name="author" content="MSCRATCH">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="themes/install_theme/install.css" media="all" type="text/css">
</head>
<body>
<nav class="navbar">
<div class="navbar_title"><?php echo htmlentities(INSTALLER_SCRIPTNAME);?> <?php echo htmlentities(INSTALLER_SCRIPTVERSION);?></div>
<div class="navbar_title"><?php echo htmlentities(INSTALLER_FULL_NAME);?> <?php echo htmlentities(INSTALLER_VERSION);?></div>
</nav>
<div class="main_wrapper">
