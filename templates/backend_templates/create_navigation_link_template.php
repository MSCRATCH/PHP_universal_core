<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//create_navigation_link_template.php
//MMXXVI MSCRATCH
?>

<?php $token_create_nav_link = generate_token('create_nav_link');?>

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
<div class="wrapper_title"><h3><i class="fa-solid fa-boxes-packing"></i> <?php echo sanitize_1($text_templates['create_navigation_link_template_title']);?></h3></div>
<div class="wrapper_content">
<form method="post">
<label class="label_default" for="custom_nav_link_name_form"><?php echo sanitize_1($text_templates['create_navigation_link_template_label_name']);?></label>
<input class="form_text_default" type="text" name="custom_nav_link_name_form" id="custom_nav_link_name_form">
<label class="label_default" for="custom_nav_link_url_form"><?php echo sanitize_1($text_templates['create_navigation_link_template_label_url']);?></label>
<input class="form_text_default" type="text" name="custom_nav_link_url_form" id="custom_nav_link_url_form">
<label class="label_default" for="custom_nav_link_order_form"><?php echo sanitize_1($text_templates['create_navigation_link_template_label_order']);?></label>
<input class="form_text_default" type="text" name="custom_nav_link_order_form" id="custom_nav_link_order_form">
<input type="hidden" name="csrf_token" value="<?php echo $token_create_nav_link;?>">
</div>
<div class="template_wrapper_footer">
<div class="btn_row">
<button class="btn btn--btn_primary" type="submit" name="create_nav_link"><?php echo sanitize_1($text_templates['create_navigation_link_template_btn_create']);?></button>
<a class="btn btn--btn_dng" href="<?php echo BASE_URL;?>show_navigation_links/<?php echo sanitize_1($custom_nav_id_get);?>"><?php echo sanitize_1($text_templates['create_navigation_link_template_btn_return']);?></a>
</div>
</form>
</div>
</div>
