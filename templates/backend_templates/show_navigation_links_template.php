<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//show_navigation_links_template.php
//MMXXVI MSCRATCH
?>

<?php $token_remove_custom_nav_link = generate_token('remove_custom_nav_link');?>

<div class="template_wrapper_mb">
<div class="wrapper_title"><h3><i class="fa-solid fa-signs-post"></i> <?php echo sanitize_1($text_templates['show_navigation_links_template_title']);?></h3></div>
<div class="wrapper_content">
<p class="paragraph_nm"><?php echo sanitize_1($text_templates['show_navigation_links_template_text']);?></p>
</div>
<div class="template_wrapper_footer">
<div class="btn_row">
<a class="btn btn--btn_primary" href="<?php echo BASE_URL;?>create_navigation_link/<?php echo sanitize_1($custom_nav_id_get);?>"><?php echo sanitize_1($text_templates['show_navigation_links_template_btn_create']);?></a>
<a class="btn btn--btn_dng" href="<?php echo BASE_URL;?>show_navigations"><?php echo sanitize_1($text_templates['show_navigation_links_template_btn_return']);?></a>
</div>
</div>
</div>

<?php if ($custom_nav_links !== false) { ?>

<div class="card_group_row_3">
<?php foreach ($custom_nav_links as $custom_nav_link) {  ?>
<div class="template_wrapper_flex">
<div class="wrapper_title wrapper_title_border_btm_none">
<h3><i class="fa-solid fa-signs-post"></i> <?php echo sanitize_1($custom_nav_link['custom_nav_link_name']);?> {nav_<?php echo sanitize_1($custom_nav_link['custom_nav_placeholder']);?>}</h3></div>
<div class="template_wrapper_footer template_wrapper_footer_bg_alt">
<div class="btn_row">
<form method="post">
<input type="hidden" name="custom_nav_link_id_form" value="<?php echo sanitize_1($custom_nav_link['custom_nav_link_id']);?>">
<input type="hidden" name="csrf_token" value="<?php echo $token_remove_custom_nav_link;?>">
<button class="btn btn--btn_dng" type="submit" name="remove_custom_nav_link"><?php echo sanitize_1($text_templates['show_navigation_links_template_btn_remove']);?></button>
</form>
<a class="btn btn--btn_primary" target="_blank" href="<?php echo BASE_URL;?><?php echo sanitize_1($custom_nav_link['custom_nav_link_url']);?>"><?php echo sanitize_1($text_templates['show_navigation_links_template_btn_show']);?></a>
</div>
</div>
</div>
<?php } ?>
</div>
<?php } else { ?>
<div class="template_wrapper">
<div class="wrapper_title"><h3><i class="fa-solid fa-signs-post"></i> <?php echo sanitize_1($text_templates['show_navigation_links_template_no_links_title']);?></h3></div>
<div class="wrapper_content">
<p class="paragraph_nm"><?php echo sanitize_1($text_templates['show_navigation_links_template_no_links_text']);?></p>
</div>
</div>
<?php } ?>
