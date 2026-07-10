<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//install_step_5_template.php
//MMXXVI MSCRATCH
?>

<div class="wrapper">
<div class="wrapper_title"><h1><?php echo htmlentities($text_install['install_page_5_title']);?></h1></div>
<div class="wrapper_content">
<?php $not_writable_folders = check_if_folders_are_writable($writable_folders); ?>
<?php if (empty($not_writable_folders)) { ?>
<?php $_SESSION['install_step_5'] = true; ?>
<p class="paragraph_mtb"><?php echo htmlentities($text_install['install_page_5_writable']);?></p>
<?php } else { ?>
<p class="paragraph_mtb"><?php echo htmlentities($text_install['install_page_5_non_writable_folder_text']);?></p>
<ul>
<?php foreach ($not_writable_folders as $not_writable_folder) {  ?>
<li><span class="span_r"><?php echo htmlentities($text_install['install_page_5_non_writable_folder']);?></span> <?php echo htmlentities($not_writable_folder);?></li>
<?php } ?>
</ul>
<?php } ?>
</div>
<?php if (! empty($_SESSION['install_step_5'])) { ?>
<div class="wrapper_footer">
<div class="btn_row">
<a class="btn" href="<?php echo '?install_step=4'?>"><?php echo htmlentities($text_install['install_page_btn_previous_step']);?></a>
<a class="btn_rd" href="<?php echo '?install_step=6'?>"><?php echo htmlentities($text_install['install_page_btn_next_step']);?></a>
</div>
</div>
<?php } ?>
</div>
