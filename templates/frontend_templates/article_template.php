<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//article_template.php
//MMXXVI MSCRATCH
?>

<?php if ($feature_flags['user_comments_enabled'] === 1) { ?>
<?php $token_save_comment = generate_token('save_comment');?>
<?php $token_hide_comment = generate_token('hide_comment');?>
<?php $token_restore_comment = generate_token('restore_comment');?>
<?php $token_remove_comment = generate_token('remove_comment');?>
<?php } ?>

<div class="template_wrapper">
<div class="template_wrapper_title">
<h2><i class="fa-solid fa-newspaper"></i> <?php echo sanitize_1($result['blog_article_title']);?></h2>
<ul>
<li class="list_style_none"><a class="b_link" target="_blank" href="<?= BASE_URL ?>profile/<?php echo sanitize_1($result['username']);?>"><?php echo sanitize_3($result['username']);?></a></li>
<li class="list_style_none"><?php echo sanitize_3($result['blog_article_date']);?></li>
</ul>
</div>
<div class="template_wrapper_content">
<?php echo parse_bb_code($db, $result['blog_article_content'], $text_functions);?>
</div>
</div>
<?php if (is_array($article_comments) && $feature_flags['user_comments_enabled'] === 1) { ?>
<div class="superior_wrapper">
<?php foreach ($article_comments as $article_comment) {  ?>
<?php if (user_is_administrator_or_moderator() === true && $article_comment['blog_comment_hidden'] === 1) {  ?>
<div class="template_wrapper">
<div class="comment_overlay">
<div class="template_wrapper_title_row">
<img src="<?= BASE_URL ?>profile_image/<?php echo sanitize_1($article_comment['user_profile_image']);?>" alt="profile_image" class="profile_image_sm">
<div class="template_wrapper_title_column">
<ul>
<li class="list_style_none"><a class="b_link" target="_blank" href="<?= BASE_URL ?>profile/<?php echo sanitize_1($article_comment['username']);?>"><?php echo sanitize_3($article_comment['username']);?></a></li>
<li class="list_style_none"><?php echo sanitize_3($article_comment['blog_comment_date']);?></li>
<li class="list_style_none"><?php echo sanitize_3($article_comment['user_level']);?></li>
</ul>
<h2><?php echo sanitize_1($text_templates['article_template_comment_hidden']);?></h2>
</div>
</div>
<div class="template_wrapper_content">
<?php echo sanitize_1($article_comment['blog_comment']);?>
</div>
</div>
<?php } else { ?>
<div class="template_wrapper">
<div class="template_wrapper_title_row">
<img src="<?= BASE_URL ?>profile_image/<?php echo sanitize_1($article_comment['user_profile_image']);?>" alt="profile_image" class="profile_image_sm">
<div class="template_wrapper_title_column">
<ul>
<li class="list_style_none"><a class="b_link" target="_blank" href="<?= BASE_URL ?>profile/<?php echo sanitize_1($article_comment['username']);?>"><?php echo sanitize_3($article_comment['username']);?></a></li>
<li class="list_style_none"><?php echo sanitize_3($article_comment['blog_comment_date']);?></li>
<li class="list_style_none"><?php echo sanitize_3($article_comment['user_level']);?></li>
</ul>
</div>
</div>
<div class="template_wrapper_content">
<?php echo sanitize_1($article_comment['blog_comment']);?>
</div>
<?php } ?>
<?php if (user_is_moderator() === true && backend_access_is_verified() === true && $article_comment['user_level'] !== "administrator" && $article_comment['user_level'] !== "moderator") { ?>
<?php if ($article_comment['blog_comment_hidden'] === 1) {  ?>
<div class="template_wrapper_footer">
<form method="post">
<input type="hidden" name="blog_comment_id_form" value="<?php echo sanitize_1($article_comment['blog_comment_id']);?>">
<input type="hidden" name="csrf_token" value="<?php echo $token_restore_comment;?>">
<button class="btn btn--btn_primary" type="submit" name="restore_comment"><?php echo sanitize_1($text_templates['article_template_btn_restore']);?></button>
</form>
</div>
<?php } else { ?>
<div class="template_wrapper_footer">
<form method="post">
<input type="hidden" name="blog_comment_id_form" value="<?php echo sanitize_1($article_comment['blog_comment_id']);?>">
<input type="hidden" name="csrf_token" value="<?php echo $token_hide_comment;?>">
<button class="btn btn--btn_primary" type="submit" name="hide_comment"><?php echo sanitize_1($text_templates['article_template_btn_hide']);?></button>
</form>
</div>
<?php } ?>
<?php } ?>
<?php if (user_is_administrator() === true && backend_access_is_verified() === true && $article_comment['user_level'] !== "administrator") { ?>
<?php if ($article_comment['blog_comment_hidden'] === 1) {  ?>
<div class="template_wrapper_footer">
<div class="btn_row">
<form method="post">
<input type="hidden" name="blog_comment_id_form" value="<?php echo sanitize_1($article_comment['blog_comment_id']);?>">
<input type="hidden" name="csrf_token" value="<?php echo $token_restore_comment;?>">
<button class="btn btn--btn_primary" type="submit" name="restore_comment"><?php echo sanitize_1($text_templates['article_template_btn_restore']);?></button>
</form>
<form method="post">
<input type="hidden" name="blog_comment_id_form" value="<?php echo sanitize_1($article_comment['blog_comment_id']);?>">
<input type="hidden" name="csrf_token" value="<?php echo $token_remove_comment;?>">
<button class="btn btn--btn_dng" type="submit" name="remove_comment"><?php echo sanitize_1($text_templates['article_template_btn_remove']);?></button>
</form>
</div>
</div>
<?php } else { ?>
<div class="template_wrapper_footer">
<div class="btn_row">
<form method="post">
<input type="hidden" name="blog_comment_id_form" value="<?php echo sanitize_1($article_comment['blog_comment_id']);?>">
<input type="hidden" name="csrf_token" value="<?php echo $token_hide_comment;?>">
<button class="btn btn--btn_primary" type="submit" name="hide_comment"><?php echo sanitize_1($text_templates['article_template_btn_hide']);?></button>
</form>
<form method="post">
<input type="hidden" name="blog_comment_id_form" value="<?php echo sanitize_1($article_comment['blog_comment_id']);?>">
<input type="hidden" name="csrf_token" value="<?php echo $token_remove_comment;?>">
<button class="btn btn--btn_dng" type="submit" name="remove_comment"><?php echo sanitize_1($text_templates['article_template_btn_remove']);?></button>
</form>
</div>
</div>
<?php } ?>
<?php } ?>
<?php if (user_is_administrator_or_moderator() === true && backend_access_is_verified() === false) { ?>
<div class="template_wrapper_footer">
<p class="paragraph_und">
<?php echo sanitize_1($text_templates['article_template_backend_access_not_verified']);?>
</p>
</div>
<?php } ?>
</div>
<?php } ?>
</div>
<div class="pagination">
<?php echo pagination('article/'. $blog_article_url_get, $number_of_pages, $current_page, $text_functions); ?>
</div>
<?php } ?>

<?php if (! isset($errors)) {$errors = '';}?>
<?php if (! empty($errors)) { ?>
<div class="template_wrapper_nm">
<div class="template_wrapper_title"><h3><i class="fa-solid fa-gear"></i> <?php echo sanitize_1($settings['system_message_title']);?></h3></div>
<div class="template_wrapper_content">
<ul>
<?php foreach ($errors as $error_content) {  ?>
<?php echo '<li class="list_style_none">'. sanitize_1($error_content). '</li>';?>
<?php } ?>
</ul>
</div>
</div>
<?php } ?>

<?php if ($feature_flags['user_comments_enabled'] === 1) { ?>
<?php if (user_is_logged_in() === true) { ?>
<div class="template_wrapper_mt">
<div class="template_wrapper_title"><h3><i class="fa-solid fa-comment"></i> <?php echo sanitize_1($text_templates['article_template_form_title_leave_comment']);?></h3></div>
<div class="template_wrapper_content">
<form method="post">
<label class="label_default" for="blog_comment_form"><?php echo sanitize_1($text_templates['article_template_label_comment']);?></label>
<textarea class="textarea_default" name="blog_comment_form" id="blog_comment_form"></textarea>
<input type="hidden" name="csrf_token" value="<?php echo $token_save_comment;?>">
</div>
<div class="template_wrapper_footer">
<button class="btn btn--btn_primary" type="submit" name="save_comment"><?php echo sanitize_1($text_templates['article_template_btn_save']);?></button>
</form>
</div>
</div>
<?php } else { ?>
<div class="template_wrapper_mt">
<div class="template_wrapper_title"><h3><i class="fa-solid fa-comment"></i> <?php echo sanitize_1($text_templates['article_template_form_title_leave_comment']);?></h3></div>
<div class="template_wrapper_content">
<div class="btn_row">
<a class="btn btn--btn_primary" href="<?= BASE_URL ?>login"><?php echo sanitize_1($text_templates['article_template_btn_login']);?></a>
<a class="btn btn--btn_dng" href="<?= BASE_URL ?>register"><?php echo sanitize_1($text_templates['article_template_btn_register']);?></a>
</div>
</div>
</div>
<?php } ?>
<?php } ?>
