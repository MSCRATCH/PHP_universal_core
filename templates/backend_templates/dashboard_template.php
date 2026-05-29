<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//dashboard_template.php
//MMXXVI MSCRATCH
?>

<div class="card_group_row_3">
<div class="template_wrapper">
<div class="wrapper_title"><h3><i class="fa-solid fa-gear"></i> <?php echo sanitize_1($text_templates['dashboard_template_title_error_system']);?></h3></div>
<div class="wrapper_content">
<?php if (! isset($errors)) {$errors = '';}?>
<?php if (! empty($errors)) { ?>
<ul>
<?php foreach ($errors as $error_content) {  ?>
<?php echo '<li class="list_style_none">'. sanitize_1($error_content). '</li>';?>
<?php } ?>
</ul>
<?php } else { ?>
<p class="paragraph_mtb"><?php echo sanitize_1($text_templates['dashboard_template_text_error_system']);?></p>
<?php } ?>
</div>
</div>
<div class="template_wrapper">
<div class="wrapper_title"><h3><i class="fa-solid fa-gear"></i> <?php echo sanitize_1($text_templates['dashboard_template_title_system_information']);?></h3></div>
<div class="wrapper_content">
<ul>
<?php foreach ($system_data as $key => $value) {  ?>
<li class="li_mtb"><?php echo sanitize_1($key);?>: <?php echo sanitize_1($value);?></li>
<?php } ?>
</ul>
</div>
</div>
<div class="template_wrapper">
<div class="wrapper_title"><h3><i class="fa-solid fa-plus"></i> <?php echo sanitize_1($text_templates['dashboard_template_title_most_recent_users']);?></h3></div>
<div class="wrapper_content">
<?php if ($most_recent_users !== false) { ?>
<ul>
<?php foreach ($most_recent_users as $most_recent_user) {  ?>
<li><a class="default_link" target="_blank" href="<?= BASE_URL ?>profile/<?php echo sanitize_1($most_recent_user['username']);?>"><?php echo sanitize_3($most_recent_user['username']);?></a></li>
<?php } ?>
</ul>
<?php } else { ?>
<p class="paragraph_mtb"><?php echo sanitize_1($text_templates['dashboard_template_text_most_recent_users']);?></p>
<?php } ?>
</div>
</div>
<div class="template_wrapper">
<div class="wrapper_title"><h3><i class="fa-solid fa-wifi"></i> <?php echo sanitize_1($text_templates['dashboard_template_title_online_users']);?></h3></div>
<div class="wrapper_content">
<?php if ($online_users !== false) { ?>
<ul>
<?php foreach ($online_users as $online_user) {  ?>
<li><a class="default_link" target="_blank" href="<?= BASE_URL ?>profile/<?php echo sanitize_1($online_user['username']);?>"><?php echo sanitize_3($online_user['username']);?></a></li>
<?php } ?>
</ul>
<?php } else { ?>
<p class="paragraph_mtb"><?php echo sanitize_1($text_templates['dashboard_template_text_online_users']);?></p>
<?php } ?>
</div>
</div>
<div class="template_wrapper">
<div class="wrapper_title"><h3><i class="fa-solid fa-lock"></i> <?php echo sanitize_1($text_templates['dashboard_template_title_users_who_not_activated']);?></h3></div>
<div class="wrapper_content">
<?php if ($not_activated_users !== false) { ?>
<ul>
<?php foreach ($not_activated_users as $not_activated_user) {  ?>
<li><a class="default_link" target="_blank" href="<?= BASE_URL ?>profile/<?php echo sanitize_1($not_activated_user['username']);?>"><?php echo sanitize_3($not_activated_user['username']);?></a></li>
<?php } ?>
</ul>
<?php } else { ?>
<p class="paragraph_mtb"><?php echo sanitize_1($text_templates['dashboard_template_text_users_who_not_activated']);?></p>
<?php } ?>
</div>
</div>
<div class="template_wrapper">
<div class="wrapper_title"><h3><i class="fa-solid fa-user"></i> <?php echo sanitize_1($text_templates['dashboard_template_title_moderators']);?></h3></div>
<div class="wrapper_content">
<?php if ($moderators !== false) { ?>
<ul>
<?php foreach ($moderators as $moderator) {  ?>
<li><a class="default_link" target="_blank" href="<?= BASE_URL ?>profile/<?php echo sanitize_1($moderator['username']);?>"><?php echo sanitize_3($moderator['username']);?></a></li>
<?php } ?>
</ul>
<?php } else { ?>
<p class="paragraph_mtb"><?php echo sanitize_1($text_templates['dashboard_template_text_moderators']);?></p>
<?php } ?>
</div>
</div>
</div>
