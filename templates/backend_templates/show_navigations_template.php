<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//show_navigations_template.php
//MMXXVI MSCRATCH
?>

<?php $remove_custom_nav = generate_token('remove_custom_nav');?>

<div class="template_wrapper_mb">
<div class="wrapper_title"><h3><i class="fa-solid fa-signs-post"></i> <?php echo sanitize_1($text_templates['show_navigations_template_title']);?></h3></div>
<div class="wrapper_content">
<p class="paragraph_nm"><?php echo sanitize_1($text_templates['show_navigations_template_text']);?></p>
</div>
<div class="template_wrapper_footer">
<a class="btn btn--btn_primary" href="<?php echo BASE_URL;?>create_navigation"><?php echo sanitize_1($text_templates['show_navigations_template_btn_create']);?></a>
</div>
</div>

<?php if ($custom_navs !== false) { ?>

<div class="card_group_row_3">
<?php foreach ($custom_navs as $custom_nav) {  ?>
<div class="template_wrapper_flex">
<div class="wrapper_title wrapper_title_border_btm_none">
<i class="fa-solid fa-signs-post"></i> <a class="b_link" href="<?= BASE_URL ?>show_navigation_links/<?php echo sanitize_1($custom_nav['custom_nav_id']);?>">{nav_<?php echo sanitize_1($custom_nav['custom_nav_placeholder']);?>}</a>
</div>
<div class="template_wrapper_footer template_wrapper_footer_bg_alt">
<div class="btn_row">
<form method="post">
<input type="hidden" name="navigation_id_form" value="<?php echo sanitize_1($custom_nav['custom_nav_id']);?>">
<input type="hidden" name="csrf_token" value="<?php echo $remove_custom_nav;?>">
<button class="btn btn--btn_dng" type="submit" name="remove_custom_nav"><?php echo sanitize_1($text_templates['show_navigations_template_btn_remove']);?></button>
</form>
<a class="btn btn--btn_primary" href="<?php echo BASE_URL;?>edit_navigation/<?php echo sanitize_1($custom_nav['custom_nav_id']);?>"><?php echo sanitize_1($text_templates['show_navigations_template_btn_edit']);?></a>
</div>
</div>
</div>
<?php } ?>
</div>
<?php } else { ?>
<div class="template_wrapper">
<div class="wrapper_title"><h3><i class="fa-solid fa-signs-post"></i> <?php echo sanitize_1($text_templates['show_navigations_template_no_navs_title']);?></h3></div>
<div class="wrapper_content">
<p class="paragraph_nm"><?php echo sanitize_1($text_templates['show_navigations_template_no_navs_text']);?></p>
</div>
</div>
<?php } ?>
