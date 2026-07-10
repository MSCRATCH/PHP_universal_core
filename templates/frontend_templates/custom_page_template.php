<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//custom_page_template.php
//MMXXVI MSCRATCH
?>

<div class="template_wrapper">
<div class="template_wrapper_title"><h3><i class="fa-solid fa-folder"></i> <?php echo sanitize_1($custom_page['custom_page_title']);?></h3></div>
<div class="template_wrapper_content">
<?php echo parse_bb_code($db, $custom_page['custom_page_content'], $text_functions);?>
</div>
</div>
