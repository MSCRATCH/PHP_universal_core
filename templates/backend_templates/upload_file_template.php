<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//upload_file_template.php
//MMXXVI MSCRATCH
?>

<?php $token_upload_file = generate_token('upload_file');?>

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
<div class="wrapper_title"><h3><i class="fa-solid fa-cloud"></i> <?php echo sanitize_1($text_templates['upload_file_template_title']);?></h3></div>
<div class="wrapper_content">
<?php if (user_is_administrator() === true) {  ?>
<ul>
<li class="list_style_none"><span class="span_muted"><?php echo sanitize_1($text_templates['upload_file_template_upload_max_filesize']);?></span> <span class="span_b"><?php echo sanitize_1($upload_max_filesize);?>B</span></li>
<li class="list_style_none"><span class="span_muted"><?php echo sanitize_1($text_templates['upload_file_template_post_max_size']);?></span> <span class="span_b"><?php echo sanitize_1($post_max_size);?>B</span></li>
</ul>
<p class="paragraph_mtb"><?php echo sanitize_1($text_templates['upload_file_template_max_filesize_text']);?></p>
<?php } ?>
<form enctype="multipart/form-data" method="post">
<label class="label_default" for="file_title_form"><?php echo sanitize_1($text_templates['upload_file_template_label_title']);?></label>
<input class="form_text_default" type="text" name="file_title_form" id="file_title_form">
<label class="label_default" for="file_description_form"><?php echo sanitize_1($text_templates['upload_file_template_label_description']);?></label>
<textarea class="textarea_default" name="file_description_form" id="file_description_form"></textarea>
<div class="btn_column">
<button class="btn_upload" type="button" id="btn_upload"><?php echo sanitize_1($text_templates['upload_file_template_label_file']);?></button>
<input type="file" name="uploaded_file" id="file_input">
<input type="hidden" name="csrf_token" value="<?php echo $token_upload_file;?>">
<button class="btn_submit" type="submit" name="upload_file" id="btn_submit"><?php echo sanitize_1($text_templates['upload_files_template_btn_upload']);?></button>
</div>
</form>
<a class="btn btn--btn_dng btn_mt" href="<?php echo BASE_URL;?>show_uploaded_files"><?php echo sanitize_1($text_templates['upload_files_template_btn_return']);?></a>
</div>
</div>
