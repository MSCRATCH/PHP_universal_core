<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//install_footer_template.php
//MMXXVI MSCRATCH
?>

<footer class="footer">
<ul>
<li><?php echo htmlentities(SCRIPTNAME);?> <?php echo htmlentities(VERSION);?> <?php echo htmlentities($text_install['install_page_installation_routine']);?></li>
<li><?php echo htmlentities(INSTALLER_NAME);?> <?php echo htmlentities($text_install['install_page_installer_version']);?> <?php echo htmlentities(INSTALLER_VERSION);?></li>
<li><?php echo htmlentities($text_install['install_page_programmed_by']);?> <?php echo htmlspecialchars(AUTHOR);?></li>
</ul>
</footer>
</div>
</body>
</html>
