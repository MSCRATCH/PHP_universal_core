<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//blog_template.php
//MMXXVI MSCRATCH
?>

<?php if ($result !== false) { ?>
<div class="superior_wrapper">
<?php foreach ($result as $row) {  ?>
<div class="template_wrapper">
<div class="template_wrapper_title"><h2><i class="fa-solid fa-newspaper"></i> <?php echo sanitize_1($row['blog_article_title']);?></h2>
<ul>
<li class="list_style_none"><a class="b_link" target="_blank" href="<?= BASE_URL ?>profile/<?php echo sanitize_1($row['username']);?>"><?php echo sanitize_3($row['username']);?></a></li>
<li class="list_style_none"><?php echo sanitize_3($row['blog_article_date']);?></li>
</ul>
</div>
<div class="template_wrapper_content">
<?php echo parse_bb_code($db, $row['blog_article_preview'], $text_functions);?>
</div>
<div class="template_wrapper_footer">
<p class="paragraph_mtb"><?php echo sanitize_1($text_templates['blog_template_number_of_comments']);?> <?php echo sanitize_3($row['comment_count']);?></p>
<a class="btn btn--btn_primary" href="<?php echo BASE_URL;?>article/<?php echo sanitize_1($row['blog_article_url']);?>"><?php echo sanitize_1($text_templates['blog_template_read_more']);?></a>
</div>
</div>
<?php } ?>
</div>
<div class="pagination">
<?php echo pagination('blog', $number_of_pages, $current_page, $text_functions); ?>
</div>
<?php } else { ?>
<div class="template_wrapper">
<div class="wrapper_title"><h3><?php echo sanitize_1($text_templates['blog_template_no_entries_title']);?></h3></div>
<div class="wrapper_content">
<p class="paragraph_mtb"><?php echo sanitize_1($text_templates['blog_template_no_entries_text']);?></p>
</div>
</div>
<?php } ?>
