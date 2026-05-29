<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//email_config_template.php
//MMXXVI MSCRATCH
?>

<?php $token_update_mail_config = generate_token('update_mail_config'); ?>

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
<div class="wrapper_title"><h3><i class="fa-solid fa-gear"></i> <?php echo sanitize_1($text_templates['email_config_template_title']);?></h3></div>
<div class="wrapper_content">
<div class="column">
<form method="post">
<label class="label_default" for="smtp_host_form"><?php echo sanitize_1($text_templates['email_config_template_smtp_host']);?></label>
<input class="form_text_default" type="text" name="smtp_host_form" id="smtp_host_form" value="<?php echo sanitize_1($result_email_config['smtp_host']);?>">
<label class="label_default" for="smtp_port_form"><?php echo sanitize_1($text_templates['email_config_template_smtp_port']);?></label>
<input class="form_text_default" type="text" name="smtp_port_form" id="smtp_port_form" value="<?php echo sanitize_1($result_email_config['smtp_port']);?>">
<label class="label_default" for="smtp_user_form"><?php echo sanitize_1($text_templates['email_config_template_smtp_user']);?></label>
<input class="form_text_default" type="text" name="smtp_user_form" id="smtp_user_form" value="<?php echo sanitize_1($result_email_config['smtp_user']);?>">
<label class="label_default" for="smtp_password_form"><?php echo sanitize_1($text_templates['email_config_template_smtp_password']);?></label>
<input class="form_text_default" type="text" name="smtp_password_form" id="smtp_password_form" value="<?php echo sanitize_1($result_email_config['smtp_password']);?>">
<label class="label_default" for="smtp_encryption_form"><?php echo sanitize_1($text_templates['email_config_template_smtp_encryption']);?></label>
<input class="form_text_default" type="text" name="smtp_encryption_form" id="smtp_encryption_form" value="<?php echo sanitize_1($result_email_config['smtp_encryption']);?>">
<label class="label_default" for="from_email_form"><?php echo sanitize_1($text_templates['email_config_template_from_email']);?></label>
<input class="form_text_default" type="text" name="from_email_form" id="from_email_form" value="<?php echo sanitize_1($result_email_config['from_email']);?>">
<label class="label_default" for="from_name_form"><?php echo sanitize_1($text_templates['email_config_template_from_name']);?></label>
<input class="form_text_default" type="text" name="from_name_form" id="from_name_form" value="<?php echo sanitize_1($result_email_config['from_name']);?>">
<input type="hidden" name="csrf_token" value="<?php echo $token_update_mail_config;?>">
<button class="btn btn--btn_primary" type="submit" name="update_mail_config"><?php echo sanitize_1($text_templates['email_config_template_btn']);?></button>
</form>
</div>
</div>
</div>
