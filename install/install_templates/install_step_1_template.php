<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//install_step_1_template.php
//MMXXVI MSCRATCH
?>

<?php $_SESSION['install_step_1'] = true; ?>

<div class="wrapper">
<div class="wrapper_title"><h1><?php echo htmlentities($text_install['install_page_1_title']);?></h1></div>
<div class="wrapper_content">
<p class="paragraph_mtb"><?php echo htmlentities($text_install['install_page_1_text_1']);?></p>
<p class="paragraph_mtb"><span class="span_b"><?php echo htmlentities($text_install['install_page_1_text_2']);?></span></p>
<p class="paragraph_mtb"><span class="span_b"><?php echo htmlentities($text_install['install_page_1_text_3']);?></span></p>
<p class="paragraph_mtb"><span class="span_b"><?php echo htmlentities($text_install['install_page_1_text_4']);?></span></p>
<p class="paragraph_mtb"><span class="span_b"><?php echo htmlentities($text_install['install_page_1_text_5']);?></span></p>
<p class="paragraph_mtb"><span class="span_r"><?php echo htmlentities($text_install['install_page_1_text_6']);?></span></p>
<p class="paragraph_mtb"><span class="span_r"><?php echo htmlentities($text_install['install_page_1_text_7']);?></span></p>
<p class="paragraph_mtb"><?php echo htmlentities($text_install['install_page_1_text_8']);?></p>
</div>
<div class="wrapper_footer">
<div class="btn_row">
<a class="btn" href="<?php echo '?install_step=2'?>"><?php echo htmlentities($text_install['install_page_1_btn_start_installation']);?></a>
</div>
</div>
</div>
