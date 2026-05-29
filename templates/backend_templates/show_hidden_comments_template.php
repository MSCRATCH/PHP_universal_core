<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//show_hidden_comments_template.php
//MMXXVI MSCRATCH
?>

<?php $token_mark_comments_as_viewed = generate_token('mark_comments_as_viewed');?>

<?php if ($result !== false) { ?>

<div class="template_wrapper_mb">
<div class="wrapper_title"><h3><i class="fa-solid fa-comment"></i> <?php echo sanitize_1($text_templates['show_hidden_comments_template_title']);?></h3></div>
<div class="wrapper_content">
<p class="paragraph_mtb"><?php echo sanitize_1($text_templates['show_hidden_comments_template_text']);?></p>
<form method="post">
<input type="hidden" name="csrf_token" value="<?php echo $token_mark_comments_as_viewed;?>">
<button class="btn btn--btn_primary" type="submit" name="mark_comments_as_viewed"><?php echo sanitize_1($text_templates['show_hidden_comments_template_btn_mark_comments_as_viewed']);?></button>
</form>
</div>
</div>

<div class="card_group_row_3">
<?php foreach ($result as $row) {  ?>

<div class="template_wrapper_flex">
<div class="wrapper_title">
<h3><i class="fa-solid fa-comment"></i> <?php echo sanitize_1($text_templates['show_hidden_comments_template_title_hidden_comment']);?></h3>
</div>
<div class="wrapper_content_flex">
<ul>
<li class="list_style_none"><span class="span_muted"><?php echo sanitize_1($text_templates['show_hidden_comments_template_activity_performed_by']);?></span> <a class="b_link" target="_blank" href="<?= BASE_URL ?>profile/<?php echo sanitize_1($row['actor_username']);?>"><?php echo sanitize_3($row['actor_username']);?></a></li>
<li class="list_style_none"><span class="span_muted"><?php echo sanitize_1($text_templates['show_hidden_comments_template_comment_written_by']);?></span> <a class="b_link" target="_blank" href="<?= BASE_URL ?>profile/<?php echo sanitize_1($row['target_username']);?>"><?php echo sanitize_3($row['target_username']);?></a></li>
<li class="list_style_none"><span class="span_muted"><?php echo sanitize_1($text_templates['show_hidden_comments_template_activity_performed']);?></span> <?php echo sanitize_1($row['blog_comment_hidden_timestamp']);?></li>
<li class="list_style_none"><span class="span_muted"><?php echo sanitize_1($text_templates['show_hidden_comments_template_comment_affected_article']);?> </span><a class="b_link" target="_blank" href="<?= BASE_URL ?>article/<?php echo sanitize_1($row['blog_article_url']);?>"><?php echo sanitize_3($row['blog_article_title']);?></a></li>
<?php if ($row['blog_comment_hidden_viewed'] === 1) { ?>
<li class="list_style_none"><?php echo sanitize_1($text_templates['show_hidden_comments_template_viewed']);?></li>
<?php } else { ?>
<li class="list_style_none"><?php echo sanitize_1($text_templates['show_hidden_comments_template_not_viewed']);?></li>
<?php } ?>
</ul>
<p class="paragraph_mtb"><?php echo sanitize_1($row['blog_comment']);?></p>
</div>
</div>
<?php } ?>
</div>
<div class="pagination_secondary">
<?php echo pagination('show_hidden_comments', $number_of_pages, $current_page, $text_functions); ?>
</div>
<?php } else { ?>
<div class="template_wrapper">
<div class="wrapper_title"><h3><?php echo sanitize_1($text_templates['show_hidden_comments_template_no_entries_title']);?></h3></div>
<div class="wrapper_content">
<p class="paragraph_mtb"><?php echo sanitize_1($text_templates['show_hidden_comments_template_no_entries_text']);?></p>
</div>
</div>
<?php } ?>
