<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//install_step_11_template.php
//MMXXVI MSCRATCH
?>

<div class="wrapper">
<div class="wrapper_title"><h1><?php echo htmlentities($text_install['install_page_11_title']);?></h1></div>
<div class="wrapper_content">
<p class="paragraph_mtb"><?php echo htmlentities($text_install['install_page_11_text_1']);?></p>
<p class="paragraph_mtb"><span class="span_r"><?php echo htmlentities($text_install['install_page_11_text_2']);?><span></p>
</div>
<div class="wrapper_footer">
<div class="btn_row">
<a class="btn" href="<?php echo '?install_step=10'?>"><?php echo htmlentities($text_install['install_page_btn_previous_step']);?></a>
<form method="post">
<button class="btn_rd" type="submit" name="complete_installation_routine"><?php echo htmlentities($text_install['install_page_11_btn']);?></button>
</form>
</div>
</div>
</div>
