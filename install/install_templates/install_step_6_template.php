<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//install_step_6_template.php
//MMXXVI MSCRATCH
?>

<?php if (config_exists() === false) { ?>
<?php if (! isset($create_config_errors)) {$create_config_errors = '';}?>
<?php if (! empty($create_config_errors)) { ?>
<div class="wrapper wrapper_mb">
<div class="wrapper_title"><h1><?php echo htmlentities($text_install['install_page_error_message']);?></h1></div>
<div class="wrapper_content">
<ul>
<?php foreach ($create_config_errors as $create_config_error) {  ?>
<li><?php echo htmlentities($create_config_error);?></li>
<?php } ?>
</ul>
</div>
</div>
<?php } ?>
<?php } ?>

<div class="wrapper">
<div class="wrapper_title"><h1><?php echo htmlentities($text_install['install_page_6_title']);?></h1></div>
<div class="wrapper_content">
<?php if (config_exists() === true) { ?>
<p class="paragraph_mtb"><?php echo htmlentities($text_install['install_page_6_config_created']);?></p>
<?php $_SESSION['install_step_6'] = true; ?>
<?php } else { ?>
<form method="post">
<label class="label_default" for="servername_form"><?php echo htmlentities($text_install['install_page_6_label_servername']);?></label>
<input class="form_text_default" type="text" name="servername_form" id="servername_form" placeholder="Servername">
<label class="label_default" for="username_form"><?php echo htmlentities($text_install['install_page_6_label_username']);?></label>
<input class="form_text_default" type="text" name="username_form" id="username_form" placeholder="Username">
<label class="label_default" for="db_password_form"><?php echo htmlentities($text_install['install_page_6_label_password']);?></label>
<input class="form_password_default" type="password" name="db_password_form" id="db_password_form" placeholder="**********">
<label class="label_default" for="database_name_form"><?php echo htmlentities($text_install['install_page_6_label_database_name']);?></label>
<input class="form_text_default" type="text" name="database_name_form" id="database_name_form" placeholder="Database name">
<button class="btn" type="submit" name="create_config"><?php echo htmlentities($text_install['install_page_6_btn']);?></button>
</form>
<?php } ?>
</div>
<?php if (! empty($_SESSION['install_step_6'])) { ?>
<div class="wrapper_footer">
<div class="btn_row">
<a class="btn" href="<?php echo '?install_step=5'?>"><?php echo htmlentities($text_install['install_page_btn_previous_step']);?></a>
<a class="btn_rd" href="<?php echo '?install_step=7'?>"><?php echo htmlentities($text_install['install_page_btn_next_step']);?></a>
</div>
</div>
<?php } ?>
</div>
