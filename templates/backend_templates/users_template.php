<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//users_template.php
//MMXXVI MSCRATCH
?>

<?php $token_remove_user = generate_token('remove_user'); ?>
<?php $token_update_user_level = generate_token('update_user_level'); ?>

<?php if ($users !== false) { ?>
<div class="card_group_row_3">
<?php foreach ($users as $user) {  ?>
<div class="template_wrapper_flex">
<div class="wrapper_title">
<ul>
<?php if ($feature_flags['user_profile_system_enabled'] === 1) { ?>
<li class="list_style_none"><i class="fa-solid fa-user"></i> <a class="b_link" target="_blank" href="<?= BASE_URL ?>profile/<?php echo sanitize_1($user['username']);?>"><?php echo sanitize_3($user['username']);?></a></li>
<?php } else { ?>
<li class="list_style_none"><i class="fa-solid fa-user"></i> <span class="span_b"><?php echo sanitize_3($user['username']);?></span></li>
<?php } ?>
</ul>
</div>
<div class="wrapper_content_flex">
<ul>
<li class="list_style_none"><span class="span_muted"><?php echo sanitize_3($user['user_level']);?></span></li>
<?php if ($user['last_activity_minutes'] <= 5) { ?>
<li class="list_style_none"><?php echo sanitize_1($text_templates['users_template_online']);?></li>
<?php } else { ?>
<li class="list_style_none"><span class="span_muted"><?php echo sanitize_1($text_templates['users_template_last_activity']);?></span> <?php echo sanitize_1($user['last_activity']);?></li>
<?php } ?>
<li class="list_style_none"><span class="span_muted"><?php echo sanitize_1($text_templates['users_template_email']);?></span> <?php echo sanitize_1($user['user_email']);?></li>
<li class="list_style_none"><span class="span_muted"><?php echo sanitize_1($text_templates['users_template_registered']);?></span> <?php echo sanitize_1($user['user_date']);?></li>
<?php if ($user['email_is_verified'] === 1 && $feature_flags['email_verification_enabled'] === 1) { ?>
<li class="list_style_none"><?php echo sanitize_1($text_templates['users_template_email_address_verified']);?></li>
<?php } elseif($user['email_is_verified'] !== 1 && $feature_flags['email_verification_enabled'] === 1) { ?>
<li class="list_style_und"><?php echo sanitize_1($text_templates['users_template_email_address_not_verified']);?></li>
<?php } ?>
</ul>
<div class="select_wrapper">
<form method="post">
<select class="select_custom" name="user_level_form">
<option value="<?php echo sanitize_1($user['user_level']);?>"><?php echo sanitize_3($user['user_level']);?></option>
<?php if ($user['user_level'] !== 'user') { ?>
<option value="user">User</option>
<?php } ?>
<?php if ($user['user_level'] !== 'not_activated') { ?>
<option value="not_activated">Not activated</option>
<?php } ?>
<?php if ($user['user_level'] !== 'moderator') { ?>
<option value="moderator">Moderator</option>  <?php } ?>
</select>
<input type="hidden" name="user_id_user_level_form" value="<?php echo sanitize_1($user['user_id']);?>">
<input type="hidden" name="csrf_token" value="<?php echo $token_update_user_level;?>">
</div>
</div>
<div class="template_wrapper_footer">
<div class="btn_row">
<button class="btn btn--btn_primary" type="submit" name="update_user_level"><?php echo sanitize_1($text_templates['users_template_btn_change']);?></button>
</form>
<form method="post">
<input type="hidden" name="user_id_remove_form" value="<?php echo sanitize_1($user['user_id']);?>">
<input type="hidden" name="csrf_token" value="<?php echo $token_remove_user;?>">
<button class="btn btn--btn_dng" type="submit" name="remove_user"><?php echo sanitize_1($text_templates['users_template_btn_remove']);?></button>
</form>
</div>
</div>
</div>
<?php } ?>
</div>
<div class="pagination_secondary">
<?php echo pagination('users', $number_of_pages, $current_page, $text_functions); ?>
</div>
<?php } else { ?>
<div class="template_wrapper">
<div class="wrapper_title"><h3><i class="fa-solid fa-user"></i> <?php echo sanitize_1($text_templates['users_template_no_entries_title']);?></h3></div>
<div class="wrapper_content">
<p class="paragraph_nm"><?php echo sanitize_1($text_templates['users_template_no_entries_text']);?></p>
</div>
</div>
<?php }?>
