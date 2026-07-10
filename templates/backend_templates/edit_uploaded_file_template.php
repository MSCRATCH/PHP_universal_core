<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//edit_uploaded_file_template.php
//MMXXVI MSCRATCH
?>

<?php $token_update_file = generate_token('update_file');?>

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
<div class="wrapper_title"><h3><i class="fa-solid fa-message"></i> <?php echo sanitize_1($text_templates['edit_uploaded_file_template_title']);?></h3></div>
<div class="wrapper_content">
<form method="post">
<label class="label_default" for="file_title_update_form"><?php echo sanitize_1($text_templates['edit_uploaded_file_template_label_title']);?></label>
<input class="form_text_default" type="text" name="file_title_update_form" id="file_title_update_form" value="<?php echo sanitize_1($file_data['file_title']);?>">
<label class="label_default" for="file_description_update_form"><?php echo sanitize_1($text_templates['edit_uploaded_file_template_label_description']);?></label>
<textarea class="textarea_default" name="file_description_update_form" id="file_description_update_form"><?php echo sanitize_1($file_data['file_description']);?></textarea>
<input type="hidden" name="csrf_token" value="<?php echo $token_update_file;?>">
</div>
<div class="template_wrapper_footer">
<div class="btn_row">
<button class="btn btn--btn_primary" type="submit" name="update_file"><?php echo sanitize_1($text_templates['edit_uploaded_file_template_btn_update_file']);?></button>
<a class="btn btn--btn_dng" href="<?php echo BASE_URL;?>show_uploaded_files"><?php echo sanitize_1($text_templates['edit_uploaded_file_template_btn_return']);?></a>
</div>
</form>
</div>
</div>
