<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//edit_custom_widget_template.php
//MMXXVI MSCRATCH
?>

<?php $token_update_custom_widget = generate_token('update_custom_widget');?>

<?php if (! isset($errors)) {$errors = '';}?>
<?php if (! empty($errors)) { ?>
<div class="template_wrapper_mb">
<div class="wrapper_title"><h3><i class="fa-solid fa-gear"></i> <?php echo sanitize_1($settings['system_message_title']);?></h3></div>
<div class="wrapper_content">
<ul>
<?php foreach ($errors as $error_content) {  ?>
<?php echo '<li class="list_style_none">'. sanitize_1($error_content). '</li>';?>
<?php } ?>
</ul>
</div>
</div>
<?php } ?>

<div class="template_wrapper">
<div class="wrapper_title"><h3><i class="fa-solid fa-boxes-packing"></i> <?php echo sanitize_1($text_templates['edit_custom_widget_template_title']);?></h3></div>
<div class="wrapper_content">
<form method="post">
<label class="label_default" for="custom_widget_placeholder_update_form"><?php echo sanitize_1($text_templates['edit_custom_widget_template_label_placeholder']);?></label>
<input class="form_text_default" type="text" name="custom_widget_placeholder_update_form" id="custom_widget_placeholder_update_form" value="<?php echo sanitize_1($custom_widget['custom_widget_placeholder']);?>">
<label class="label_default" for="custom_widget_content_update_form"><?php echo sanitize_1($text_templates['edit_custom_widget_template_label_content']);?></label>
<textarea class="textarea_default" name="custom_widget_content_update_form" id="custom_widget_content_update_form"><?php echo sanitize_1($custom_widget['custom_widget_content']);?></textarea>
<input type="hidden" name="csrf_token" value="<?php echo $token_update_custom_widget;?>">
</div>
<div class="template_wrapper_footer">
<div class="btn_row">
<button class="btn btn--btn_primary" type="submit" name="update_custom_widget"><?php echo sanitize_1($text_templates['edit_custom_widget_template_btn_edit']);?></button>
<a class="btn btn--btn_dng" href="<?php echo BASE_URL;?>show_custom_widgets"><?php echo sanitize_1($text_templates['edit_custom_widget_template_btn_return']);?></a>
</div>
</form>
</div>
</div>
