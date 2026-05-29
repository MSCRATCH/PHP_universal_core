<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//show_primary_navigation_template.php
//MMXXVI MSCRATCH
?>

<?php $token_remove_secondary_nav_element = generate_token('remove_secondary_nav_element');?>

<div class="template_wrapper_mb">
<div class="wrapper_title"><h3><i class="fa-solid fa-signs-post"></i> <?php echo sanitize_1($text_templates['show_secondary_navigation_template_title']);?></h3></div>
<div class="wrapper_content">
<p class="paragraph_nm"><?php echo sanitize_1($text_templates['show_secondary_navigation_template_text']);?></p>
</div>
<div class="template_wrapper_footer">
<a class="btn btn--btn_primary" href="<?php echo BASE_URL;?>create_secondary_navigation_element"><?php echo sanitize_1($text_templates['show_secondary_navigation_template_btn_create_nav_element']);?></a>
</div>
</div>

<?php if ($secondary_nav_elements !== false) { ?>

<div class="card_group_row_3">
<?php foreach ($secondary_nav_elements as $secondary_nav_element) {  ?>
<div class="template_wrapper_flex">
<div class="wrapper_title">
<h3><i class="fa-solid fa-signs-post"></i> <?php echo sanitize_1($secondary_nav_element['secondary_nav_name']);?></h3>
</div>
<div class="wrapper_content_flex">
<ul>
<li class="list_style_none"><span class="span_muted"><?php echo sanitize_1($text_templates['show_secondary_navigation_template_order']);?></span> <span class="span_b"><?php echo sanitize_3($secondary_nav_element['secondary_nav_order']);?></span></li>
<li class="list_style_none"><span class="span_muted"><?php echo sanitize_1($text_templates['show_secondary_navigation_template_url']);?></span> <a class="b_link" target="_blank" href="<?= BASE_URL ?><?php echo sanitize_1($secondary_nav_element['secondary_nav_url']);?>"><?php echo sanitize_3($secondary_nav_element['secondary_nav_url']);?></a></li>
</ul>
</div>
<div class="template_wrapper_footer">
<div class="btn_row">
<form method="post">
<input type="hidden" name="secondary_navigation_element_id_form" value="<?php echo sanitize_1($secondary_nav_element['secondary_nav_id']);?>">
<input type="hidden" name="csrf_token" value="<?php echo $token_remove_secondary_nav_element;?>">
<button class="btn btn--btn_dng" type="submit" name="remove_secondary_nav_element"><?php echo sanitize_1($text_templates['show_secondary_navigation_template_btn_remove_nav_element']);?></button>
</form>
<a class="btn btn--btn_primary" href="<?php echo BASE_URL;?>edit_secondary_navigation_element/<?php echo sanitize_1($secondary_nav_element['secondary_nav_id']);?>"><?php echo sanitize_1($text_templates['show_secondary_navigation_template_btn_edit_nav_element']);?></a>
</div>
</div>
</div>
<?php } ?>
</div>
<?php } else { ?>
<div class="template_wrapper">
<div class="wrapper_title"><h3><i class="fa-solid fa-signs-post"></i> <?php echo sanitize_1($text_templates['show_secondary_navigation_template_no_elements_title']);?></h3></div>
<div class="wrapper_content">
<p class="paragraph_mtb"><?php echo sanitize_1($text_templates['show_secondary_navigation_template_no_elements_text']);?></p>
</div>
</div>
<?php } ?>
