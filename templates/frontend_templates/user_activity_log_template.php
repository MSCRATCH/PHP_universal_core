<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//user_activity_log_template.php
//MMXXVI MSCRATCH
?>

<?php $token_mark_user_log_entry_as_viewed = generate_token('mark_user_log_entry_as_viewed');?>
<?php $token_mark_each_user_log_entry_as_viewed = generate_token('mark_each_user_log_entry_as_viewed');?>


<?php if ($result !== false) { ?>

<div class="template_wrapper">
<div class="wrapper_title"><h3><?php echo sanitize_1($text_templates['user_activity_log_template_all_viewed_title']);?></h3></div>
<div class="wrapper_content">
<p class="paragraph_mb"><?php echo sanitize_1($text_templates['user_activity_log_template_btn_all_viewed_text']);?></p>
<form method="post">
<input type="hidden" name="csrf_token" value="<?php echo $token_mark_each_user_log_entry_as_viewed;?>">
<button class="btn btn--btn_primary" type="submit" name="mark_each_user_log_entry_as_viewed"><?php echo sanitize_1($text_templates['user_activity_log_template_btn_all_viewed']);?></button>
</form>
</div>
</div>

<div class="superior_wrapper">
<?php foreach ($result as $row) { ?>
<?php $comment_text = $row['comment_text_snapshot'] ?? $row['blog_comment']; ?>
<?php $comment_created_at = $row['comment_date_snapshot'] ?? $row['blog_comment_date']; ?>
<?php $article_title = $row['blog_article_title_snapshot'] ?? $row['blog_article_title']; ?>
<?php $article_url = $row['blog_article_url_snapshot'] ?? $row['blog_article_url']; ?>
<?php if (user_is_administrator() === true && $row['user_activity'] === "comment_created") {  ?>
<?php require user_activity_log_templates . '/comment_created_template.php'; ?>
<?php } elseif ($row['user_activity'] === "comment_created") { ?>
<?php require user_activity_log_templates . '/comment_created_template.php'; ?>
<?php } elseif ($row['user_activity'] === "comment_hidden") { ?>
<?php require user_activity_log_templates . '/comment_hidden_template.php'; ?>
<?php } elseif ($row['user_activity'] === "comment_restored") { ?>
<?php require user_activity_log_templates . '/comment_restored_template.php'; ?>
<?php } elseif ($row['user_activity'] === "comment_removed") { ?>
<?php require user_activity_log_templates . '/comment_removed_template.php'; ?>
<?php } elseif ($row['user_activity'] === "user_level_changed") { ?>
<?php require user_activity_log_templates . '/user_level_changed_template.php'; ?>
<?php } ?>
<?php } ?>
</div>
<div class="pagination">
<?php echo pagination('user_activity_log', $number_of_pages, $current_page, $text_functions); ?>
</div>
<?php } else { ?>
<div class="template_wrapper">
<div class="wrapper_title"><h3><?php echo sanitize_1($text_templates['user_activity_log_template_empty_log_title']);?></h3></div>
<div class="wrapper_content">
<p class="paragraph_mtb"><?php echo sanitize_1($text_templates['user_activity_log_template_empty_log_text']);?></p>
</div>
</div>
<?php } ?>
