<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//edit_blog_article_template.php
//MMXXVI MSCRATCH
?>

<?php $token_update_blog_article = generate_token('update_blog_article');?>

<?php if (! isset($errors)) {$errors = '';}?>
<?php if (! empty($errors)) { ?>
<div class="template_wrapper_mb">
<div class="wrapper_title"><h3><i class="fa-solid fa-gear"></i> <?php echo sanitize_1($settings['system_message_title']);?></h3></div>
<div class="wrapper_content">
<ul>
<?php foreach ($errors as $error_content) {  ?>
<?php echo '<li class="list_style_none">'. sanitize_1($error_content). '</li>';?>
<?php } ?>
</ul>
</div>
</div>
<?php } ?>

<div class="template_wrapper">
<div class="wrapper_title"><h3><i class="fa-solid fa-message"></i> <?php echo sanitize_1($text_templates['edit_blog_article_template_title']);?></h3></div>
<div class="wrapper_content">
<form method="post">
<label class="label_default" for="blog_article_title_update_form"><?php echo sanitize_1($text_templates['edit_blog_article_template_label_title']);?></label>
<input class="form_text_default" type="text" name="blog_article_title_update_form" id="blog_article_title_update_form" value="<?php echo sanitize_1($blog_article['blog_article_title']);?>">
<label class="label_default" for="blog_article_preview_update_form"><?php echo sanitize_1($text_templates['edit_blog_article_template_label_preview']);?></label>
<textarea class="textarea_default" name="blog_article_preview_update_form" id="blog_article_preview_update_form"><?php echo sanitize_1($blog_article['blog_article_preview']);?></textarea>
<label class="label_default" for="blog_article_content_update_form"><?php echo sanitize_1($text_templates['edit_blog_article_template_label_content']);?></label>
<textarea class="textarea_default" name="blog_article_content_update_form" id="blog_article_content_update_form"><?php echo sanitize_1($blog_article['blog_article_content']);?></textarea>
<input type="hidden" name="csrf_token" value="<?php echo $token_update_blog_article;?>">
<button class="btn btn--btn_primary" type="submit" name="update_blog_article"><?php echo sanitize_1($text_templates['edit_blog_article_template_btn_edit']);?></button>
</form>
<a class="btn btn--btn_dng btn_mt" href="<?php echo BASE_URL;?>show_blog_articles"><?php echo sanitize_1($text_templates['edit_blog_article_template_btn_return']);?></a>
</div>
</div>
