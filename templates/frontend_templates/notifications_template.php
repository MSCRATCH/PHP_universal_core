<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//notifications_template.php
//MMXXVI MSCRATCH
?>

<?php $token_mark_notification_as_viewed = generate_token('mark_notification_as_viewed');?>
<?php $token_mark_each_notification_as_viewed = generate_token('mark_each_notification_as_viewed');?>


<?php if ($result !== false) { ?>

<div class="template_wrapper">
<div class="wrapper_title"><h3><i class="fa-solid fa-envelope"></i> <?php echo sanitize_1($text_templates['notifications_template_all_viewed_title']);?></h3></div>
<div class="wrapper_content">
<p class="paragraph_nm"><?php echo sanitize_1($text_templates['notifications_template_btn_all_viewed_text']);?></p>
</div>
<div class="template_wrapper_footer">
<form method="post">
<input type="hidden" name="csrf_token" value="<?php echo $token_mark_each_notification_as_viewed;?>">
<button class="btn btn--btn_primary" type="submit" name="mark_each_notification_as_viewed"><?php echo sanitize_1($text_templates['notifications_template_btn_all_viewed']);?></button>
</form>
</div>
</div>

<div class="superior_wrapper">
<?php foreach ($result as $row) { ?>
<?php $comment_text = $row['comment_text_snapshot']?>
<?php $comment_created_at = $row['comment_created_at_snapshot']?>
<?php $article_title = $row['blog_article_title_snapshot']?>
<?php $article_url = $row['blog_article_url_snapshot']?>
<?php if (user_is_administrator() === true && $row['notification_type'] === "comment_created") {  ?>
<?php require notifications_templates. '/comment_created_template.php'; ?>
<?php } elseif ($row['notification_type'] === "comment_created") { ?>
<?php require notifications_templates. '/comment_created_template.php'; ?>
<?php } elseif ($row['notification_type'] === "comment_hidden") { ?>
<?php require notifications_templates. '/comment_hidden_template.php'; ?>
<?php } elseif ($row['notification_type'] === "comment_restored") { ?>
<?php require notifications_templates. '/comment_restored_template.php'; ?>
<?php } elseif ($row['notification_type'] === "comment_removed") { ?>
<?php require notifications_templates. '/comment_removed_template.php'; ?>
<?php } elseif ($row['notification_type'] === "user_level_changed") { ?>
<?php require notifications_templates. '/user_level_changed_template.php'; ?>
<?php } ?>
<?php } ?>
</div>
<div class="pagination">
<?php echo pagination('notifications', $number_of_pages, $current_page, $text_functions); ?>
</div>
<?php } else { ?>
<div class="template_wrapper">
<div class="wrapper_title"><h3><i class="fa-solid fa-envelope"></i> <?php echo sanitize_1($text_templates['notifications_template_empty_log_title']);?></h3></div>
<div class="wrapper_content">
<p class="paragraph_nm"><?php echo sanitize_1($text_templates['notifications_template_empty_log_text']);?></p>
</div>
</div>
<?php } ?>
