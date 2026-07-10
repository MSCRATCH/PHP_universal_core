<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//install_step_9_template.php
//MMXXVI MSCRATCH
?>

<?php if (email_config_exists($db) === false) { ?>
<?php if (! isset($create_email_config_errors)) {$create_email_config_errors = '';}?>
<?php if (! empty($create_email_config_errors)) { ?>
<div class="wrapper wrapper_mb">
<div class="wrapper_title"><h1><?php echo htmlentities($text_install['install_page_error_message']);?></h1></div>
<div class="wrapper_content">
<ul>
<?php foreach ($create_email_config_errors as $create_email_config_error) {  ?>
<li><?php echo htmlentities($create_email_config_error);?></li>
<?php } ?>
</ul>
</div>
</div>
<?php } ?>
<?php } ?>

<div class="wrapper">
<div class="wrapper_title"><h1><?php echo htmlentities($text_install['install_page_9_title']);?></h1></div>
<div class="wrapper_content">
<?php if (email_config_exists($db) === false) { ?>
<form method="post">
<label class="label_default" for="smtp_host_form"><?php echo htmlentities($text_install['install_page_9_label_smtp_host']);?></label>
<input class="form_text_default" type="text" name="smtp_host_form" id="smtp_host_form">
<label class="label_default" for="smtp_port_form"><?php echo htmlentities($text_install['install_page_9_label_smtp_port']);?></label>
<input class="form_text_default" type="text" name="smtp_port_form" id="smtp_port_form">
<label class="label_default" for="smtp_user_form"><?php echo htmlentities($text_install['install_page_9_label_smtp_user']);?></label>
<input class="form_text_default" type="text" name="smtp_user_form" id="smtp_user_form">
<label class="label_default" for="smtp_password_form"><?php echo htmlentities($text_install['install_page_9_label_smtp_password']);?></label>
<input class="form_text_default" type="text" name="smtp_password_form" id="smtp_password_form">
<label class="label_default" for="smtp_encryption_form"><?php echo htmlentities($text_install['install_page_9_label_smtp_encryption']);?></label>
<input class="form_text_default" type="text" name="smtp_encryption_form" id="smtp_encryption_form">
<label class="label_default" for="from_email_form"><?php echo htmlentities($text_install['install_page_9_label_from_email']);?></label>
<input class="form_text_default" type="text" name="from_email_form" id="from_email_form">
<label class="label_default" for="from_name_form"><?php echo htmlentities($text_install['install_page_9_label_from_name']);?></label>
<input class="form_text_default" type="text" name="from_name_form" id="from_name_form">
<button class="btn" type="submit" name="create_email_config"><?php echo htmlentities($text_install['install_page_9_btn']);?></button>
</form>
<?php } else { ?>
<?php $_SESSION['install_step_9'] = true; ?>
<p class="paragraph_mtb"><?php echo htmlentities($text_install['install_page_9_email_config_successfully_created']);?></p>
<?php } ?>
</div>
<?php if (! empty($_SESSION['install_step_9'])) { ?>
<div class="wrapper_footer">
<div class="btn_row">
<a class="btn" href="<?php echo '?install_step=8'?>"><?php echo htmlentities($text_install['install_page_btn_previous_step']);?></a>
<a class="btn_rd" href="<?php echo '?install_step=10'?>"><?php echo htmlentities($text_install['install_page_btn_next_step']);?></a>
</div>
</div>
<?php } ?>
</div>
