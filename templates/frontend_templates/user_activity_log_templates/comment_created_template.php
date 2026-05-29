<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//comment_created_template.php
//MMXXVI MSCRATCH
?>

<div class="template_wrapper">
<?php if ($row['user_activity_log_viewed'] === 0) { ?>
<div class="template_wrapper_title"><h2><i class="fa-solid fa-envelope"></i> <?php echo sanitize_1($text_templates['user_activity_log_template_notice_comment_new_comment']);?> <?php echo sanitize_1($article_title);?></h2>
<p class="paragraph_nm"><a class="b_link" target="_blank" href="<?= BASE_URL ?>profile/<?php echo sanitize_1($row['actor_username']);?>"><?php echo sanitize_3($row['actor_username']);?></a> <?php echo sanitize_1($text_templates['user_activity_log_template_new_comment']);?> <?php echo sanitize_1($text_templates['user_activity_log_template_at']);?> <?php echo sanitize_1($row['user_activity_timestamp']);?></p>
<?php } else { ?>
<div class="template_wrapper_title"><h2><i class="fa-solid fa-envelope-open"></i> <?php echo sanitize_1($text_templates['user_activity_log_template_notice_comment_new_comment']);?> <?php echo sanitize_1($article_title);?></h2>
<p class="paragraph_nm"><a class="b_link" target="_blank" href="<?= BASE_URL ?>profile/<?php echo sanitize_1($row['actor_username']);?>"><?php echo sanitize_3($row['actor_username']);?></a> <?php echo sanitize_1($text_templates['user_activity_log_template_new_comment']);?> <?php echo sanitize_1($text_templates['user_activity_log_template_at']);?> <?php echo sanitize_1($row['user_activity_timestamp']);?></p>
<?php } ?>
</div>
<div class="template_wrapper_content">
<?php echo sanitize_1($comment_text);?>
</div>
<div class="template_wrapper_footer">
<div class="btn_row">
<a class="btn btn--btn_dng" href="<?php echo BASE_URL;?>article/<?php echo sanitize_1($row['blog_article_url']);?>"><?php echo sanitize_1($text_templates['user_activity_log_template_btn_show_article']);?></a>
<?php if ($row['user_activity_log_viewed'] === 0) { ?>
<form method="post">
<input type="hidden" name="user_activity_log_id_form" value="<?php echo sanitize_1($row['user_activity_log_id']);?>">
<input type="hidden" name="csrf_token" value="<?php echo $token_mark_user_log_entry_as_viewed;?>">
<button class="btn btn--btn_primary" type="submit" name="mark_user_log_entry_as_viewed"><?php echo sanitize_1($text_templates['user_activity_log_template_btn_viewed']);?></button>
</form>
<?php } else { ?>
<p class="paragraph_und"><?php echo sanitize_1($text_templates['user_activity_log_template_notice_comment_viewed']);?></p>
<?php } ?>
</div>
</div>
</div>
