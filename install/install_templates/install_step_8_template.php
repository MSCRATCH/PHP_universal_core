<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//install_step_8_template.php
//MMXXVI MSCRATCH
?>

<?php if (administrator_already_exists($db) === false) { ?>
<?php if (! isset($register_administrator_errors)) {$register_administrator_errors = '';}?>
<?php if (! empty($register_administrator_errors)) { ?>
<div class="wrapper wrapper_mb">
<div class="wrapper_title"><h1><?php echo htmlentities($text_install['install_page_error_message']);?></h1></div>
<div class="wrapper_content">
<ul>
<?php foreach ($register_administrator_errors as $register_administrator_error) {  ?>
<li><?php echo htmlentities($register_administrator_error);?></li>
<?php } ?>
</ul>
</div>
</div>
<?php } ?>
<?php } ?>

<div class="wrapper">
<div class="wrapper_title"><h1><?php echo htmlentities($text_install['install_page_8_title']);?></h1></div>
<div class="wrapper_content">
<?php if (administrator_already_exists($db) === false) { ?>
<form method="post">
<label class="label_default" for="username_form"><?php echo htmlentities($text_install['install_page_8_label_username']);?></label>
<input class="form_text_default" type="text" name="username_form" id="username_form" placeholder="Username">
<label class="label_default" for="user_password_form"><?php echo htmlentities($text_install['install_page_8_label_password']);?></label>
<input class="form_password_default" type="password" name="user_password_form" id="user_password_form" placeholder="**********">
<label class="label_default" for="user_password_confirm_form"><?php echo htmlentities($text_install['install_page_8_label_password_comparison']);?></label>
<input class="form_password_default" type="password" name="user_password_confirm_form" id="user_password_confirm_form" placeholder="**********">
<label class="label_default" for="user_email_form"><?php echo htmlentities($text_install['install_page_8_label_e_mail_address']);?></label>
<input class="form_text_default" type="text" name="user_email_form" id="user_email_form" placeholder="**********">
<button class="btn" type="submit" name="register_administrator"><?php echo htmlentities($text_install['install_page_8_btn']);?></button>
</form>
<?php } else { ?>
<?php $_SESSION['install_step_8'] = true; ?>
<p class="paragraph_mtb"><?php echo htmlentities($text_install['install_page_8_administrator_successfully_registered']);?></p>
<?php } ?>
</div>
<?php if (! empty($_SESSION['install_step_8'])) { ?>
<div class="wrapper_footer">
<div class="btn_row">
<a class="btn" href="<?php echo '?install_step=7'?>"><?php echo htmlentities($text_install['install_page_btn_previous_step']);?></a>
<a class="btn_rd" href="<?php echo '?install_step=9'?>"><?php echo htmlentities($text_install['install_page_btn_next_step']);?></a>
</div>
</div>
<?php } ?>
</div>
