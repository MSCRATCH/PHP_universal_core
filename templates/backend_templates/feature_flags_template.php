<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//feature_flags_template.php
//MMXXVI MSCRATCH
?>

<?php $token_submit_feature_flag = generate_token('submit_feature_flag'); ?>

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

<div class="template_wrapper_mb">
<div class="wrapper_title"><h3><i class="fa-solid fa-flag"></i> <?php echo sanitize_1($text_templates['feature_flags_template_title']);?></h3></div>
<div class="wrapper_content">
<p class="paragraph_nm"><?php echo sanitize_1($text_templates['feature_flags_template_text']);?></p>
</div>
</div>

<?php foreach ($feature_flags_from_db as $feature_flag_from_db) { ?>
<?php $value = (INT) $feature_flag_from_db['feature_flag_value']; ?>

<div class="template_wrapper_mb">
<div class="wrapper_title"><h3><i class="fa-solid fa-flag"></i> <?php echo sanitize_3($feature_flag_from_db['feature_flag_title']); ?></h3></div>
<div class="wrapper_content">
<?php if ($feature_flag_from_db['feature_flag_key'] === "registration_enabled") { ?>
<?php echo sanitize_1($text_templates['feature_flags_template_registration']);?>
<?php } elseif ($feature_flag_from_db['feature_flag_key'] === "maintenance_mode_enabled") { ?>
<?php echo sanitize_1($text_templates['feature_flags_template_maintenance_mode']);?>
<?php } elseif ($feature_flag_from_db['feature_flag_key'] === "contact_form_enabled") { ?>
<?php echo sanitize_1($text_templates['feature_flags_template_contact_form']);?>
<?php } elseif ($feature_flag_from_db['feature_flag_key'] === "user_profile_system_enabled") { ?>
<?php echo sanitize_1($text_templates['feature_flags_template_user_profile_system']);?>
<?php } elseif ($feature_flag_from_db['feature_flag_key'] === "rate_limiter_enabled") { ?>
<?php echo sanitize_1($text_templates['feature_flags_template_rate_limiter']);?>
<?php } elseif ($feature_flag_from_db['feature_flag_key'] === "cct_enabled") { ?>
<?php echo sanitize_1($text_templates['feature_flags_template_cookie_consent_tool']);?>
<?php } elseif ($feature_flag_from_db['feature_flag_key'] === "log_requests_enabled") { ?>
<?php echo sanitize_1($text_templates['feature_flags_template_log_requests']);?>
<?php } elseif ($feature_flag_from_db['feature_flag_key'] === "notifications_enabled") { ?>
<?php echo sanitize_1($text_templates['feature_flags_template_notifications']);?>
<?php } elseif ($feature_flag_from_db['feature_flag_key'] === "user_comments_enabled") { ?>
<?php echo sanitize_1($text_templates['feature_flags_template_comments']);?>
<?php } elseif ($feature_flag_from_db['feature_flag_key'] === "email_verification_enabled") { ?>
<?php echo sanitize_1($text_templates['feature_flags_template_email_verification']);?>
<?php } elseif ($feature_flag_from_db['feature_flag_key'] === "new_users_locked_enabled") { ?>
<?php echo sanitize_1($text_templates['feature_flags_template_users_locked_by_default']);?>
<?php } ?>
<form method="post">
<span class="span_muted"><?php echo sanitize_1($text_templates['feature_flags_template_status']);?></span> <span class="span_b"><?php echo $value === 1 ? sanitize_1($text_templates['feature_flags_template_activated']) : sanitize_1($text_templates['feature_flags_template_deactivated']);?></span>
<input type="hidden" name="feature_flag_value_form" value="<?php echo $value === 1 ? 0 : 1; ?>">
<input type="hidden" name="feature_flag_key_form" value="<?php echo $feature_flag_from_db['feature_flag_key']; ?>">
<input type="hidden" name="csrf_token" value="<?php echo $token_submit_feature_flag; ?>">
</div>
<div class="template_wrapper_footer">
<div class="btn_row">
<?php if ($value === 1) { ?>
<button class="btn btn--btn_dng" type="submit" name="submit_feature_flag" value="0"><?php echo sanitize_1($text_templates['feature_flags_template_deactivate']);?></button>
<?php } else { ?>
<button class="btn btn--btn_primary" type="submit" name="submit_feature_flag" value="1"><?php echo sanitize_1($text_templates['feature_flags_template_activate']);?></button>
<?php } ?>
</form>
</div>
</div>
</div>
<?php } ?>
