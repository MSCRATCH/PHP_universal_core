<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//show_custom_widgets_template.php
//MMXXVI MSCRATCH
?>

<?php $token_remove_custom_widget = generate_token('remove_custom_widget');?>

<div class="template_wrapper_mb">
<div class="wrapper_title"><h3><i class="fa-solid fa-boxes-packing"></i> <?php echo sanitize_1($text_templates['show_custom_widgets_template_title']);?></h3></div>
<div class="wrapper_content">
<p class="paragraph_nm"><?php echo sanitize_1($text_templates['show_custom_widgets_template_text']);?></p>
</div>
<div class="template_wrapper_footer">
<a class="btn btn--btn_primary" href="<?php echo BASE_URL;?>create_custom_widget"><?php echo sanitize_1($text_templates['show_custom_widgets_template_btn_create']);?></a>
</div>
</div>

<?php if ($custom_widgets !== false) { ?>

<div class="card_group_row_3">
<?php foreach ($custom_widgets as $custom_widget) {  ?>
<div class="template_wrapper_flex">
<div class="wrapper_title wrapper_title_border_btm_none">
<h3><i class="fa-solid fa-boxes-packing"></i> {widget_<?php echo sanitize_1($custom_widget['custom_widget_placeholder']);?>}</h3>
</div>
<div class="template_wrapper_footer template_wrapper_footer_bg_alt">
<div class="btn_row">
<form method="post">
<input type="hidden" name="custom_widget_id_form" value="<?php echo sanitize_1($custom_widget['custom_widget_id']);?>">
<input type="hidden" name="csrf_token" value="<?php echo $token_remove_custom_widget;?>">
<button class="btn btn--btn_dng" type="submit" name="remove_custom_widget"><?php echo sanitize_1($text_templates['show_custom_widgets_template_btn_remove']);?></button>
</form>
<a class="btn btn--btn_primary" href="<?php echo BASE_URL;?>edit_custom_widget/<?php echo sanitize_1($custom_widget['custom_widget_id']);?>"><?php echo sanitize_1($text_templates['show_custom_widgets_template_btn_edit']);?></a>
</div>
</div>
</div>
<?php } ?>
</div>
<?php } else { ?>
<div class="template_wrapper">
<div class="wrapper_title"><h3><?php echo sanitize_1($text_templates['show_custom_widgets_template_no_entries_title']);?></h3></div>
<div class="wrapper_content">
<p class="paragraph_nm"><?php echo sanitize_1($text_templates['show_custom_widgets_template_no_entries_text']);?></p>
</div>
</div>
<?php } ?>
