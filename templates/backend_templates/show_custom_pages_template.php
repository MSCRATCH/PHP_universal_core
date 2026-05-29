<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//show_custom_pages_template.php
//MMXXVI MSCRATCH
?>

<?php $token_remove_custom_page = generate_token('remove_custom_page');?>

<div class="template_wrapper_mb">
<div class="wrapper_title"><h3><i class="fa-solid fa-folder"></i> <?php echo sanitize_1($text_templates['show_custom_pages_template_title']);?></h3></div>
<div class="wrapper_content">
<p class="paragraph_mtb"><?php echo sanitize_1($text_templates['show_custom_pages_template_text']);?></p>
</div>
<div class="template_wrapper_footer">
<a class="btn btn--btn_primary" href="<?php echo BASE_URL;?>create_custom_page"><?php echo sanitize_1($text_templates['show_custom_pages_template_btn_create']);?></a>
</div>
</div>

<?php if ($custom_pages !== false) { ?>

<div class="card_group_row_3">
<?php foreach ($custom_pages as $custom_page) {  ?>
<div class="template_wrapper_flex">
<div class="wrapper_title">
<h3><i class="fa-solid fa-folder"></i> <?php echo sanitize_1($custom_page['custom_page_title']);?></h3>
</div>
<div class="wrapper_content_flex">
<ul>
<li class="list_style_none"><span class="span_muted"><?php echo sanitize_1($text_templates['show_custom_pages_template_url']);?></span> <a class="b_link" target="_blank" href="<?= BASE_URL ?><?php echo sanitize_1($custom_page['custom_page_url']);?>"><?php echo sanitize_3($custom_page['custom_page_url']);?></a></li>
</ul>
</div>
<div class="template_wrapper_footer">
<div class="btn_row">
<form method="post">
<input type="hidden" name="custom_page_id_form" value="<?php echo sanitize_1($custom_page['custom_page_id']);?>">
<input type="hidden" name="csrf_token" value="<?php echo $token_remove_custom_page;?>">
<button class="btn btn--btn_dng" type="submit" name="remove_custom_page"><?php echo sanitize_1($text_templates['show_custom_pages_template_btn_remove']);?></button>
</form>
<a class="btn btn--btn_primary" href="<?php echo BASE_URL;?>edit_custom_page/<?php echo sanitize_1($custom_page['custom_page_id']);?>"><?php echo sanitize_1($text_templates['show_custom_pages_template_btn_edit']);?></a>
</div>
</div>
</div>
<?php } ?>
</div>
<?php } else { ?>
<div class="template_wrapper">
<div class="wrapper_title"><h3><?php echo sanitize_1($text_templates['show_custom_pages_template_no_entries_title']);?></h3></div>
<div class="wrapper_content">
<p class="paragraph_mtb"><?php echo sanitize_1($text_templates['show_custom_pages_template_no_entries_text']);?></p>
</div>
</div>
<?php } ?>
