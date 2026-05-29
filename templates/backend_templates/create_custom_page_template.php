<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//create_custom_page_template.php
//MMXXVI MSCRATCH
?>

<?php $token_create_custom_page = generate_token('create_custom_page');?>

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
<div class="wrapper_title"><h3><i class="fa-solid fa-folder"></i> <?php echo sanitize_1($text_templates['create_custom_page_template_title']);?></h3></div>
<div class="wrapper_content">
<form method="post">
<label class="label_default" for="custom_page_url_form"><?php echo sanitize_1($text_templates['create_custom_page_template_label_custom_page_url']);?></label>
<input class="form_text_default" type="text" name="custom_page_url_form" id="custom_page_url_form">
<label class="label_default" for="custom_page_title_form"><?php echo sanitize_1($text_templates['create_custom_page_template_label_custom_custom_page_title']);?></label>
<input class="form_text_default" type="text" name="custom_page_title_form" id="custom_page_title_form">
<label class="label_default" for="custom_page_content_form"><?php echo sanitize_1($text_templates['create_custom_page_template_label_custom_page_content']);?></label>
<textarea class="textarea_default" name="custom_page_content_form" id="custom_page_content_form"></textarea>
<input type="hidden" name="csrf_token" value="<?php echo $token_create_custom_page;?>">
<button class="btn btn--btn_primary" type="submit" name="create_custom_page"><?php echo sanitize_1($text_templates['create_custom_page_template_template_btn_create_custom_page']);?></button>
</form>
<a class="btn btn--btn_dng btn_mt" href="<?php echo BASE_URL;?>show_custom_pages"><?php echo sanitize_1($text_templates['create_custom_page_template_btn_return']);?></a>
</div>
</div>
