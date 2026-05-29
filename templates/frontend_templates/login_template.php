<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//login_template.php
//MMXXVI MSCRATCH
?>

<?php $token_login = generate_token('login');?>

<?php if (! isset($errors)) {$errors = '';}?>
<?php if (! empty($errors)) { ?>
<div class="wrapper_narrow_bg">
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

<div class="wrapper_narrow_bg">
<div class="wrapper_title"><h3><i class="fa-solid fa-key"></i> <?php echo sanitize_1($text_templates['login_template_title_log_in']);?></h3></div>
<div class="wrapper_content">
<div class="column">
<form method="post">
<label class="label_default" for="username_form"><?php echo sanitize_1($text_templates['login_template_label_username']);?></label>
<input class="form_text_default" type="text" name="username_form" id="username_form" placeholder="Username">
<label class="label_default" for="user_password_form"><?php echo sanitize_1($text_templates['login_template_label_password']);?></label>
<input class="form_password_default" type="password" name="user_password_form" id="user_password_form" placeholder="**********">
<input type="hidden" name="csrf_token" value="<?php echo $token_login;?>">
<button class="btn btn--btn_primary btn_mt" type="submit" name="login"><?php echo sanitize_1($text_templates['login_template_btn_login']);?></button>
</form>
<a class="btn btn--btn_dng btn_mt" href="<?php echo BASE_URL;?>blog"><?php echo sanitize_1($text_templates['login_template_btn_return_to_home_page']);?></a>
</div>
</div>
</div>
