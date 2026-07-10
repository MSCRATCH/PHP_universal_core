<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//dashboard_template.php
//MMXXVI MSCRATCH
?>

<div class="card_group_row_3">
<div class="template_wrapper">
<div class="wrapper_title"><h3><i class="fa-solid fa-gear"></i> <?php echo sanitize_1($text_templates['dashboard_template_title_system_information']);?></h3></div>
<div class="wrapper_content">
<ul>
<?php foreach ($system_data as $key => $value) {  ?>
<li class="li_mtb"><span class="span_muted"><?php echo sanitize_3($key);?>:</span> <span class="span_b"><?php echo sanitize_1($value);?></span></li>
<?php } ?>
</ul>
</div>
</div>
<div class="template_wrapper">
<div class="wrapper_title"><h3><i class="fa-solid fa-folder"></i> <?php echo sanitize_1($text_templates['dashboard_template_title_directory_check_system_title']);?></h3></div>
<div class="wrapper_content">
<ul>
<?php if ($check_if_db_error_logs_is_writable === false) { ?>
<li class="li_mtb"><span class="span_muted"><?php echo sanitize_1($text_templates['dashboard_template_directory_check_db_error_logs']);?><span> <span class="span_r"><?php echo sanitize_1($text_templates['dashboard_template_directory_check_not_writable']);?></span></li>
<?php } else { ?>
<li class="li_mtb"><span class="span_muted"><?php echo sanitize_1($text_templates['dashboard_template_directory_check_db_error_logs']);?><span> <span class="span_b"><?php echo sanitize_1($text_templates['dashboard_template_directory_check_writable']);?></span></li>
<?php } ?>
<?php if ($check_if_file_system_logs_is_writable === false) { ?>
<li class="li_mtb"><span class="span_muted"><?php echo sanitize_1($text_templates['dashboard_template_directory_check_file_system_logs']);?><span> <span class="span_r"><?php echo sanitize_1($text_templates['dashboard_template_directory_check_not_writable']);?></span></li>
<?php } else { ?>
<li class="li_mtb"><span class="span_muted"><?php echo sanitize_1($text_templates['dashboard_template_directory_check_file_system_logs']);?><span> <span class="span_b"><?php echo sanitize_1($text_templates['dashboard_template_directory_check_writable']);?></span></li>
<?php } ?>
<?php if ($check_if_request_logs_is_writable === false) { ?>
<li class="li_mtb"><span class="span_muted"><?php echo sanitize_1($text_templates['dashboard_template_directory_check_request_logs']);?><span> <span class="span_r"><?php echo sanitize_1($text_templates['dashboard_template_directory_check_not_writable']);?></span></li>
<?php } else { ?>
<li class="li_mtb"><span class="span_muted"><?php echo sanitize_1($text_templates['dashboard_template_directory_check_request_logs']);?><span> <span class="span_b"><?php echo sanitize_1($text_templates['dashboard_template_directory_check_writable']);?></span></li>
<?php } ?>
<?php if ($check_if_system_error_logs_is_writable === false) { ?>
<li class="li_mtb"><span class="span_muted"><?php echo sanitize_1($text_templates['dashboard_template_directory_check_system_error_logs']);?><span> <span class="span_r"><?php echo sanitize_1($text_templates['dashboard_template_directory_check_not_writable']);?></span></li>
<?php } else { ?>
<li class="li_mtb"><span class="span_muted"><?php echo sanitize_1($text_templates['dashboard_template_directory_check_system_error_logs']);?><span> <span class="span_b"><?php echo sanitize_1($text_templates['dashboard_template_directory_check_writable']);?></span></li>
<?php } ?>
</ul>
</div>
</div>
<div class="template_wrapper">
<div class="wrapper_title"><h3><i class="fa-solid fa-heart"></i> <?php echo sanitize_1($text_templates['dashboard_template_title_system_integrity']);?></h3></div>
<div class="wrapper_content">
<ul>
<?php if ($check_db_error_logs === false) { ?>
<li class="li_mtb"><span class="span_muted"><?php echo sanitize_1($text_templates['dashboard_template_system_integrity_db']);?></span> <span class="span_r"><?php echo sanitize_1($text_templates['dashboard_template_directory_check_unhealthy']);?></span></li>
<?php } else { ?>
<li class="li_mtb"><span class="span_muted"><?php echo sanitize_1($text_templates['dashboard_template_system_integrity_db']);?></span> <span class="span_b"><?php echo sanitize_1($text_templates['dashboard_template_directory_check_healthy']);?></span></li>
<?php } ?>
<?php if ($check_file_system_logs === false) { ?>
<li class="li_mtb"><span class="span_muted"><?php echo sanitize_1($text_templates['dashboard_template_system_integrity_file_system']);?></span> <span class="span_r"><?php echo sanitize_1($text_templates['dashboard_template_directory_check_unhealthy']);?></span></li>
<?php } else { ?>
<li class="li_mtb"><span class="span_muted"><?php echo sanitize_1($text_templates['dashboard_template_system_integrity_file_system']);?></span> <span class="span_b"><?php echo sanitize_1($text_templates['dashboard_template_directory_check_healthy']);?></span></li>
<?php } ?>
<?php if ($check_system_error_logs === false) { ?>
<li class="li_mtb"><span class="span_muted"><?php echo sanitize_1($text_templates['dashboard_template_system_integrity_system']);?></span> <span class="span_r"><?php echo sanitize_1($text_templates['dashboard_template_directory_check_unhealthy']);?></span></li>
<?php } else { ?>
<li class="li_mtb"><span class="span_muted"><?php echo sanitize_1($text_templates['dashboard_template_system_integrity_system']);?></span> <span class="span_b"><?php echo sanitize_1($text_templates['dashboard_template_directory_check_healthy']);?></span></li>
<?php } ?>
</ul>
</div>
</div>
<div class="template_wrapper">
<div class="wrapper_title"><h3><i class="fa-solid fa-cloud"></i> <?php echo sanitize_1($text_templates['dashboard_template_title_filesize']);?></h3></div>
<div class="wrapper_content">
<ul>
<li class="li_mtb"><span class="span_muted"><?php echo sanitize_1($text_templates['dashboard_template_upload_max_filesize']);?></span> <span class="span_b"><?php echo sanitize_1($upload_max_filesize);?></span></li>
<li class="li_mtb"><span class="span_muted"><?php echo sanitize_1($text_templates['dashboard_template_post_max_size']);?></span> <span class="span_b"><?php echo sanitize_1($post_max_size);?></span></li>
</ul>
<p class="paragraph_mtb"><?php echo sanitize_1($text_templates['dashboard_template_max_filesize_text']);?></p>
</div>
</div>
<div class="template_wrapper">
<div class="wrapper_title"><h3><i class="fa-solid fa-plus"></i> <?php echo sanitize_1($text_templates['dashboard_template_title_most_recent_users']);?></h3></div>
<div class="wrapper_content">
<?php if ($most_recent_users !== false) { ?>
<ul>
<?php foreach ($most_recent_users as $most_recent_user) {  ?>
<li><a class="b_link" target="_blank" href="<?= BASE_URL ?>profile/<?php echo sanitize_1($most_recent_user['username']);?>"><?php echo sanitize_3($most_recent_user['username']);?></a></li>
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
<li><a class="b_link" target="_blank" href="<?= BASE_URL ?>profile/<?php echo sanitize_1($online_user['username']);?>"><?php echo sanitize_3($online_user['username']);?></a></li>
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
<li><a class="b_link" target="_blank" href="<?= BASE_URL ?>profile/<?php echo sanitize_1($not_activated_user['username']);?>"><?php echo sanitize_3($not_activated_user['username']);?></a></li>
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
<li><a class="b_link" target="_blank" href="<?= BASE_URL ?>profile/<?php echo sanitize_1($moderator['username']);?>"><?php echo sanitize_3($moderator['username']);?></a></li>
<?php } ?>
</ul>
<?php } else { ?>
<p class="paragraph_mtb"><?php echo sanitize_1($text_templates['dashboard_template_text_moderators']);?></p>
<?php } ?>
</div>
</div>
</div>
