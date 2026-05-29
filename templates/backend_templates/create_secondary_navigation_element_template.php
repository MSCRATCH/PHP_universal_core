<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//create_secondary_navigation_element_template.php
//MMXXVI MSCRATCH
?>

<?php $token_save_secondary_nav_element = generate_token('save_secondary_nav_element');?>

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
<div class="wrapper_title"><h3><i class="fa-solid fa-folder"></i> <?php echo sanitize_1($text_templates['create_secondary_navigation_element_template_title']);?></h3></div>
<div class="wrapper_content">
<form method="post">
<label class="label_default" for="secondary_nav_url_form"><?php echo sanitize_1($text_templates['create_secondary_navigation_element_template_label_url']);?></label>
<input class="form_text_default" type="text" name="secondary_nav_url_form" id="secondary_nav_url_form">
<label class="label_default" for="secondary_nav_name_form"><?php echo sanitize_1($text_templates['create_secondary_navigation_element_template_label_name']);?></label>
<input class="form_text_default" type="text" name="secondary_nav_name_form" id="secondary_nav_name_form">
<label class="label_default" for="secondary_nav_order_form"><?php echo sanitize_1($text_templates['create_secondary_navigation_element_template_label_order']);?></label>
<input class="form_text_default" type="text" name="secondary_nav_order_form" id="secondary_nav_order_form">
<input type="hidden" name="csrf_token" value="<?php echo $token_save_secondary_nav_element;?>">
<button class="btn btn--btn_primary" type="submit" name="save_secondary_nav_element"><?php echo sanitize_1($text_templates['create_secondary_navigation_element_template_btn_save']);?></button>
</form>
<a class="btn btn--btn_dng btn_mt" href="<?php echo BASE_URL;?>show_secondary_navigation"><?php echo sanitize_1($text_templates['create_secondary_navigation_element_template_btn_return']);?></a>
</div>
</div>
