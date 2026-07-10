<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//edit_navigation_template.php
//MMXXVI MSCRATCH
?>

<?php $edit_custom_nav = generate_token('edit_custom_nav');?>

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
<div class="wrapper_title"><h3><i class="fa-solid fa-signs-post"></i> <?php echo sanitize_1($text_templates['edit_navigation_template_title']);?></h3></div>
<div class="wrapper_content">
<form method="post">
<input class="form_text_default form_margin_unset" type="text" name="custom_nav_placeholder_form" value="<?php echo sanitize_1($custom_nav['custom_nav_placeholder']);?>">
<input type="hidden" name="csrf_token" value="<?php echo $edit_custom_nav;?>">
</div>
<div class="template_wrapper_footer">
<div class="btn_row">
<button class="btn btn--btn_primary" type="submit" name="edit_custom_nav"><?php echo sanitize_1($text_templates['edit_navigation_template_btn_edit']);?></button>
<a class="btn btn--btn_dng" href="<?php echo BASE_URL;?>show_navigations"><?php echo sanitize_1($text_templates['edit_navigation_template_btn_return']);?></a>
</div>
</form>
</div>
</div>
