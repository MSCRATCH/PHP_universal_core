<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//show_user_activity_log_template.php
//MMXXVI MSCRATCH
?>

<?php if ($result !== false) { ?>

<div class="card_group_row_3">
<?php foreach ($result as $row) {  ?>

<?php if ($row['user_activity'] === "comment_created") {  ?>
<?php $user_activity_title =  '<i class="fa-solid fa-comment"></i>'. '&nbsp;'. sanitize_1($text_templates['show_user_activity_log_template_comment_created']); ?>
<?php } elseif ($row['user_activity'] === "comment_removed") { ?>
<?php $user_activity_title =  '<i class="fa-solid fa-trash"></i>'. '&nbsp;'. sanitize_1($text_templates['show_user_activity_log_template_comment_removed']); ?>
<?php } elseif ($row['user_activity'] === "comment_hidden") { ?>
<?php $user_activity_title =  '<i class="fa-solid fa-eye-slash"></i>'. '&nbsp;'. sanitize_1($text_templates['show_user_activity_log_template_comment_hidden']); ?>
<?php } elseif ($row['user_activity'] === "comment_restored") { ?>
<?php $user_activity_title =  '<i class="fa-solid fa-eye"></i>'. '&nbsp;'. sanitize_1($text_templates['show_user_activity_log_template_comment_restored']); ?>
<?php } elseif ($row['user_activity'] === "user_level_changed") { ?>
<?php $user_activity_title =  '<i class="fa-solid fa-user"></i>'. '&nbsp;'. sanitize_1($text_templates['show_user_activity_log_template_user_level_changed']); ?>
<?php } ?>

<?php $article_url = $row['blog_article_url_snapshot'] ?? $row['blog_article_url']; ?>

<div class="template_wrapper_flex">
<div class="wrapper_title">
<h3><?php echo $user_activity_title;?></h3>
</div>
<div class="wrapper_content_flex">
<ul>
<li class="list_style_none"><span class="span_muted"><?php echo sanitize_1($text_templates['show_user_activity_log_template_activity_performed_by']);?></span> <a class="b_link" target="_blank" href="<?= BASE_URL ?>profile/<?php echo sanitize_1($row['actor_username']);?>"><?php echo sanitize_3($row['actor_username']);?></a></li>
<li class="list_style_none"><span class="span_muted"><?php echo sanitize_1($text_templates['show_user_activity_log_template_activity_affects']);?></span> <a class="b_link" target="_blank" href="<?= BASE_URL ?>profile/<?php echo sanitize_1($row['target_username']);?>"><?php echo sanitize_3($row['target_username']);?></a></li>
<li class="list_style_none"><span class="span_muted"><?php echo sanitize_1($text_templates['show_user_activity_log_template_activity_performed']);?></span> <?php echo sanitize_1($row['user_activity_timestamp']);?></li>
<?php if ($row['user_activity'] === "user_level_changed") { ?>
<li class="list_style_none"><span class="span_muted"><?php echo sanitize_1($text_templates['show_user_activity_log_template_user_level_changed_to']);?></span> <?php echo sanitize_3($row['user_level_snapshot']);?></li>
<?php } ?>
<?php if ($row['user_activity_log_viewed'] === 1) { ?>
<li class="list_style_none"><?php echo sanitize_1($text_templates['show_user_activity_log_template_viewed_by_affected_user']);?></li>
<?php } ?>
</ul>
</div>
<div class="template_wrapper_footer">
<?php if ($row['blog_article_url'] !== NULL) { ?>
<a class="btn btn--btn_dng" target="_blank" href="<?php echo BASE_URL;?>article/<?php echo sanitize_1($article_url);?>"><?php echo sanitize_1($text_templates['show_user_activity_log_template_btn_show_article']);?></a>
<?php } ?>
<?php if ($row['user_activity'] === "user_level_changed") { ?>
<a class="btn btn--btn_primary" target="_blank" href="<?php echo BASE_URL;?>profile/<?php echo sanitize_1($row['target_username']);?>"><?php echo sanitize_1($text_templates['show_user_activity_log_template_btn_show_user']);?></a>
<?php } ?>
</div>
</div>
<?php } ?>
</div>
<div class="pagination_secondary">
<?php echo pagination('show_user_activity_log/'. sanitize_1($user_id_show_user_activity_log_handler), $number_of_pages, $current_page, $text_functions); ?>
</div>
<?php } else { ?>
<div class="template_wrapper">
<div class="wrapper_title"><h3><?php echo sanitize_1($text_templates['show_user_activity_log_template_no_entries_title']);?></h3></div>
<div class="wrapper_content">
<p class="paragraph_mtb"><?php echo sanitize_1($text_templates['show_user_activity_log_template_no_entries_text']);?></p>
</div>
</div>
<?php } ?>
