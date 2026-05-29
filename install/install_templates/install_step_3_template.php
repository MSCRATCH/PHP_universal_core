<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//install_step_3_template.php
//MMXXVI MSCRATCH
?>

<div class="wrapper">
<div class="wrapper_title"><h1><?php echo htmlentities($text_install['install_page_3_title']);?></h1></div>
<div class="wrapper_content">
<?php $missing_system_folders = check_system_folders($system_folders); ?>
<?php if (empty($missing_system_folders)) { ?>
<?php $_SESSION['install_step_3'] = true; ?>
<p class="paragraph_mtb"><?php echo htmlentities($text_install['install_page_3_no_missing_folder']);?></p>
<?php } else { ?>
<ul>
<?php foreach ($missing_system_folders as $missing_system_folder) {  ?>
<li><span class="span_r"><?php echo htmlentities($text_install['install_page_3_missing_folder']);?></span> <?php echo htmlentities($missing_system_folder);?></li>
<?php } ?>
</ul>
<?php } ?>
</div>
<?php if (! empty($_SESSION['install_step_3'])) { ?>
<div class="wrapper_footer">
<div class="btn_row">
<a class="btn" href="<?php echo '?install_step=2'?>"><?php echo htmlentities($text_install['install_page_btn_previous_step']);?></a>
<a class="btn_rd" href="<?php echo '?install_step=4'?>"><?php echo htmlentities($text_install['install_page_btn_next_step']);?></a>
</div>
</div>
<?php } ?>
</div>
