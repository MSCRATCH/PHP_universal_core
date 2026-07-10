<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//install_step_10_template.php
//MMXXVI MSCRATCH
?>

<?php if (settings_exist($db) === false) { ?>
<?php if (! isset($save_settings_errors)) {$save_settings_errors = '';}?>
<?php if (! empty($save_settings_errors)) { ?>
<div class="wrapper wrapper_mb">
<div class="wrapper_title"><h1><?php echo htmlentities($text_install['install_page_error_message']);?></h1></div>
<div class="wrapper_content">
<ul>
<?php foreach ($save_settings_errors as $save_settings_error) {  ?>
<li><?php echo htmlentities($save_settings_error);?></li>
<?php } ?>
</ul>
</div>
</div>
<?php } ?>
<?php } ?>

<div class="wrapper">
<div class="wrapper_title"><h1><?php echo htmlentities($text_install['install_page_10_title']);?></h1></div>
<div class="wrapper_content">
<?php if (settings_exist($db) === false) { ?>
<?php
$setting_keys_form = array(
'page_title',
'system_message_title',
'footer_text',
'page_description',
'page_keywords',
'website_domain',
);
$settings_title_form = [
'page_title' => 'Page title',
'system_message_title' => 'System message title',
'footer_text' => 'Footer text',
'page_description' => 'Page description',
'page_keywords' => 'Page keywords',
'website_domain' => 'Website domain',
];
?>
<form method="post">
<?php foreach ($setting_keys_form as $setting_key_form) {  ?>
<label class="label_default" for="<?php echo htmlentities($setting_key_form);?>"><?php echo htmlentities($settings_title_form[$setting_key_form]);?></label>
<input class="form_text_default" type="text" name="settings_form[<?php echo htmlentities($setting_key_form);?>]" id="<?php echo htmlentities($setting_key_form);?>">
<?php } ?>
<button class="btn" type="submit" name="save_settings"><?php echo htmlentities($text_install['install_page_10_btn']);?></button>
</form>
<?php } else { ?>
<?php $_SESSION['install_step_10'] = true; ?>
<p class="paragraph_mtb"><?php echo htmlentities($text_install['install_page_10_settings_successfully_saved']);?></p>
<?php } ?>
</div>
<?php if (! empty($_SESSION['install_step_10'])) { ?>
<div class="wrapper_footer">
<div class="btn_row">
<a class="btn" href="<?php echo '?install_step=9'?>"><?php echo htmlentities($text_install['install_page_btn_previous_step']);?></a>
<a class="btn_rd" href="<?php echo '?install_step=11'?>"><?php echo htmlentities($text_install['install_page_btn_next_step']);?></a>
</div>
</div>
<?php } ?>
</div>
