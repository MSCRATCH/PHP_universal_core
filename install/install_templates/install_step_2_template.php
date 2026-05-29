<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//install_step_2_template.php
//MMXXVI MSCRATCH
?>

<div class="wrapper">
<div class="wrapper_title"><h1><?php echo htmlentities($text_install['install_page_2_title']);?></h1></div>
<div class="wrapper_content">
<ul>
<?php if (php_version_compatible() === true) { ?>
<li><span class="span_b"><?php echo htmlentities($text_install['install_page_2_compatible']);?></span> <?php echo htmlentities($text_install['install_page_2_php_version_compatible']);?></li>
<?php } else { ?>
<li><span class="span_r"><?php echo htmlentities($text_install['install_page_2_incompatible']);?></span> <?php echo htmlentities($text_install['install_page_2_php_version_incompatible']);?></li>
<?php } ?>
<?php if (mysqli_enabled() === true) { ?>
<li><span class="span_b"><?php echo htmlentities($text_install['install_page_2_compatible']);?></span> <?php echo htmlentities($text_install['install_page_2_mysqli_installed']);?></li>
<?php } else { ?>
<li><span class="span_r"><?php echo htmlentities($text_install['install_page_2_incompatible']);?></span> <?php echo htmlentities($text_install['install_page_2_mysqli_not_installed']);?></li>
<?php } ?>
<?php if (fileinfo_enabled() === true) { ?>
<li><span class="span_b"><?php echo htmlentities($text_install['install_page_2_compatible']);?></span> <?php echo htmlentities($text_install['install_page_2_fileinfo_enabled']);?></li>
<?php } else { ?>
<li><span class="span_r"><?php echo htmlentities($text_install['install_page_2_incompatible']);?></span> <?php echo htmlentities($text_install['install_page_2_fileinfo_not_enabled']);?></li>
<?php } ?>
</ul>
</div>
<?php if (php_version_compatible() === true && mysqli_enabled() === true && fileinfo_enabled()) { ?>
<?php $_SESSION['install_step_2'] = true; ?>
<div class="wrapper_footer">
<div class="btn_row">
<a class="btn" href="<?php echo '?install_step=1'?>"><?php echo htmlentities($text_install['install_page_btn_previous_step']);?></a>
<a class="btn_rd" href="<?php echo '?install_step=3'?>"><?php echo htmlentities($text_install['install_page_btn_next_step']);?></a>
</div>
</div>
<?php } ?>
</div>
