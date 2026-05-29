<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//install_step_4_template.php
//MMXXVI MSCRATCH
?>

<div class="wrapper">
<div class="wrapper_title"><h1><?php echo htmlentities($text_install['install_page_4_title']);?></h1></div>
<div class="wrapper_content">
<?php $missing_system_files = check_system_files($system_files); ?>
<?php if (empty($missing_system_files)) { ?>
<?php $_SESSION['install_step_4'] = true; ?>
<p class="paragraph_mtb"><?php echo htmlentities($text_install['install_page_4_no_missing_file']);?></p>
<?php } else { ?>
<ul>
<?php foreach ($missing_system_files as $missing_system_file) {  ?>
<li><span class="span_r"><?php echo htmlentities($text_install['install_page_4_missing_file']);?></span> <?php echo htmlentities($missing_system_file);?></li>
<?php } ?>
</ul>
<?php } ?>
</div>
<?php if (! empty($_SESSION['install_step_4'])) { ?>
<div class="wrapper_footer">
<div class="btn_row">
<a class="btn" href="<?php echo '?install_step=3'?>"><?php echo htmlentities($text_install['install_page_btn_previous_step']);?></a>
<a class="btn_rd" href="<?php echo '?install_step=5'?>"><?php echo htmlentities($text_install['install_page_btn_next_step']);?></a>
</div>
</div>
<?php } ?>
</div>
