<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//user_level_changed_template.php
//MMXXVI MSCRATCH
?>

<div class="template_wrapper">
<?php if ($row['notification_viewed'] === 0) { ?>
<div class="template_wrapper_title"><h2><i class="fa-solid fa-envelope"></i> <?php echo sanitize_1($text_templates['notifications_template_notice_user_level_changed']);?></h2>
<p class="paragraph_nm"><a class="b_link" target="_blank" href="<?= BASE_URL ?>profile/<?php echo sanitize_1($row['actor_username']);?>"><?php echo sanitize_3($row['actor_username']);?></a> <?php echo sanitize_1($text_templates['notifications_template_user_level_changed']);?> <?php echo sanitize_1($text_templates['notifications_template_at']);?> <?php echo sanitize_1($row['notification_created_at']);?></p>
<?php } else { ?>
<div class="template_wrapper_title"><h2><i class="fa-solid fa-envelope-open"></i> <?php echo sanitize_1($text_templates['notifications_template_notice_user_level_changed']);?></h2>
<p class="paragraph_nm"><a class="b_link" target="_blank" href="<?= BASE_URL ?>profile/<?php echo sanitize_1($row['actor_username']);?>"><?php echo sanitize_3($row['actor_username']);?></a> <?php echo sanitize_1($text_templates['notifications_template_user_level_changed']);?> <?php echo sanitize_1($text_templates['notifications_template_at']);?> <?php echo sanitize_1($row['notification_created_at']);?></p>
<?php } ?>
</div>
<div class="template_wrapper_content">
<?php if ($row['user_level_snapshot'] === "moderator") { ?>
<?php echo sanitize_1($text_templates['notifications_template_user_level_moderator_text']);?>
<?php } elseif ($row['user_level_snapshot'] === "user") { ?>
<?php echo sanitize_1($text_templates['notifications_template_user_level_user_text']);?>
<?php } ?>
</div>
<div class="template_wrapper_footer">
<div class="btn_row">
<?php if ($row['notification_viewed'] === 0) { ?>
<form method="post">
<input type="hidden" name="notification_id_form" value="<?php echo sanitize_1($row['notification_id']);?>">
<input type="hidden" name="csrf_token" value="<?php echo $token_mark_notification_as_viewed;?>">
<button class="btn btn--btn_primary" type="submit" name="mark_notification_as_viewed"><?php echo sanitize_1($text_templates['notifications_template_btn_viewed']);?></button>
</form>
<?php } else { ?>
<p class="paragraph_und"><?php echo sanitize_1($text_templates['notifications_template_notice_comment_viewed']);?></p>
<?php } ?>
</div>
</div>
</div>
