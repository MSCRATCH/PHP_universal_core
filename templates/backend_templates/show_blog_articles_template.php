<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//show_blog_articles_template.php
//MMXXVI MSCRATCH
?>

<?php $token_remove_blog_article = generate_token('remove_blog_article');?>

<div class="template_wrapper_mb">
<div class="wrapper_title"><h3><i class="fa-solid fa-message"></i> <?php echo sanitize_1($text_templates['show_blog_articles_template_title']);?></h3></div>
<div class="wrapper_content">
<p class="paragraph_nm"><?php echo sanitize_1($text_templates['show_blog_articles_template_text']);?></p>
</div>
<div class="template_wrapper_footer">
<a class="default_link" href="<?php echo BASE_URL;?>create_blog_article"><button class="btn btn--btn_primary"><?php echo sanitize_1($text_templates['show_blog_articles_template_btn_create']);?></button></a>
</div>
</div>

<?php if ($paginated_blog_articles !== false) { ?>

<div class="card_group_row_3">
<?php foreach ($paginated_blog_articles as $paginated_blog_article) {  ?>
<div class="template_wrapper_flex">
<div class="wrapper_title">
<h3><i class="fa-solid fa-message"></i> <?php echo sanitize_1($paginated_blog_article['blog_article_title']);?></h3>
</div>
<div class="wrapper_content_flex">
<ul>
<?php if (user_is_administrator() === true) { ?>
<li class="list_style_none"><span class="span_muted"><?php echo sanitize_1($text_templates['show_blog_articles_template_author']);?></span> <a class="b_link" target="_blank" href="<?= BASE_URL ?>profile/<?php echo sanitize_1($paginated_blog_article['username']);?>"><?php echo sanitize_3($paginated_blog_article['username']);?></a></li>
<?php } ?>
<li class="list_style_none"><span class="span_muted"><?php echo sanitize_1($text_templates['show_blog_articles_template_creation_date']);?></span> <span class="span_b"><?php echo sanitize_3($paginated_blog_article['blog_article_date']);?></span></li>
</ul>
</div>
<div class="template_wrapper_footer">
<div class="btn_row">
<form method="post">
<input type="hidden" name="blog_article_id_form" value="<?php echo sanitize_1($paginated_blog_article['blog_article_id']);?>">
<input type="hidden" name="csrf_token" value="<?php echo $token_remove_blog_article;?>">
<button class="btn btn--btn_dng" type="submit" name="remove_blog_article"><?php echo sanitize_1($text_templates['show_blog_articles_template_btn_remove']);?></button>
</form>
<a class="btn btn--btn_primary" href="<?php echo BASE_URL;?>edit_blog_article/<?php echo sanitize_1($paginated_blog_article['blog_article_id']);?>"><?php echo sanitize_1($text_templates['show_blog_articles_template_btn_edit']);?></a>
</div>
</div>
</div>
<?php } ?>
</div>
<div class="pagination">
<?php echo pagination('show_blog_articles', $number_of_pages, $current_page, $text_functions); ?>
</div>
<?php } else { ?>
<div class="template_wrapper">
<div class="wrapper_title"><h3><i class="fa-solid fa-message"></i> <?php echo sanitize_1($text_templates['show_blog_articles_template_no_entries_title']);?></h3></div>
<div class="wrapper_content">
<p class="paragraph_nm"><?php echo sanitize_1($text_templates['show_blog_articles_template_no_entries_text']);?></p>
</div>
</div>
<?php } ?>
