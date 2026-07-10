<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//create_custom_widget_template.php
//MMXXVI MSCRATCH
?>

<?php $token_create_custom_widget = generate_token('create_custom_widget');?>

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
<div class="wrapper_title"><h3><i class="fa-solid fa-boxes-packing"></i> <?php echo sanitize_1($text_templates['create_custom_widget_template_title']);?></h3></div>
<div class="wrapper_content">
<form method="post">
<label class="label_default" for="custom_widget_placeholder_form"><?php echo sanitize_1($text_templates['create_custom_widget_template_label_placeholder']);?></label>
<input class="form_text_default" type="text" name="custom_widget_placeholder_form" id="custom_widget_placeholder_form">
<label class="label_default" for="custom_widget_content_form"><?php echo sanitize_1($text_templates['create_custom_widget_template_label_content']);?></label>
<textarea class="textarea_default" name="custom_widget_content_form" id="custom_widget_content_form"></textarea>
<input type="hidden" name="csrf_token" value="<?php echo $token_create_custom_widget;?>">
</div>
<div class="template_wrapper_footer">
<div class="btn_row">
<button class="btn btn--btn_primary" type="submit" name="create_custom_widget"><?php echo sanitize_1($text_templates['create_custom_widget_template_template_btn_create']);?></button>
<a class="btn btn--btn_dng" href="<?php echo BASE_URL;?>show_custom_widgets"><?php echo sanitize_1($text_templates['create_custom_widget_template_btn_return']);?></a>
</div>
</form>
</div>
</div>
