<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//show_uploaded_files_template.php
//MMXXVI MSCRATCH
?>

<?php $token_remove_file = generate_token('remove_file');?>

<?php if ($result !== false) { ?>

<div class="template_wrapper_mb">
<div class="wrapper_title"><h3><i class="fa-solid fa-cloud"></i> <?php echo sanitize_1($text_templates['show_uploaded_files_template_title']);?></h3></div>
<div class="wrapper_content">
<p class="paragraph_nm"><?php echo sanitize_1($text_templates['show_uploaded_files_template_text']);?></p>
</div>
<div class="template_wrapper_footer">
<a class="btn btn--btn_primary" href="<?php echo BASE_URL;?>upload_file"><?php echo sanitize_1($text_templates['show_uploaded_files_template_btn_upload']);?></a>
</div>
</div>
<div class="card_group_row_3">
<?php foreach ($result as $row) {  ?>
<?php $file_path = files_path. '/'. $row['file_name']; ?>
<?php $file_size = get_file_size($file_path); ?>
<div class="template_wrapper_flex">
<div class="wrapper_title">
<h3><i class="fa-solid fa-cloud"></i> <?php echo sanitize_1($row['file_title']);?></h3>
</div>
<div class="wrapper_content_flex">
<ul>
<li class="list_style_none"><span class="span_muted"><?php echo sanitize_1($text_templates['show_uploaded_files_template_file_name']);?></span> <a class="b_link" target="_blank" href="<?php echo BASE_URL;?>file/<?php echo sanitize_1($row['file_name']);?>"><?php echo sanitize_1($row['file_name']);?></a></li>
<?php  if (user_is_administrator() === true) { ?>
<li class="list_style_none"><span class="span_muted"><?php echo sanitize_1($text_templates['show_uploaded_files_template_file_uploader']);?></span> <a class="b_link" target="_blank" href="<?= BASE_URL ?>profile/<?php echo sanitize_1($row['username']);?>"><?php echo sanitize_3($row['username']);?></a></li>
<?php } ?>
<li class="list_style_none"><span class="span_muted"><?php echo sanitize_1($text_templates['show_uploaded_files_template_file_size']);?></span> <span class="span_b"><?php echo sanitize_1($file_size);?></span></li>
</ul>
<p class="paragraph_mtb"><?php echo sanitize_1($row['file_description']);?></p>
</div>
<div class="template_wrapper_footer">
<div class="btn_row">
<form method="post">
<input type="hidden" name="file_id_form" value="<?php echo sanitize_1($row['file_id']);?>">
<input type="hidden" name="csrf_token" value="<?php echo $token_remove_file;?>">
<button class="btn btn--btn_dng" type="submit" name="remove_file"><?php echo sanitize_1($text_templates['show_uploaded_files_template_btn_remove']);?></button>
</form>
<a class="btn btn--btn_primary" href="<?php echo BASE_URL;?>edit_uploaded_file/<?php echo sanitize_1($row['file_id']);?>"><?php echo sanitize_1($text_templates['show_uploaded_files_template_btn_edit']);?></a>
</div>
</div>
</div>
<?php } ?>
</div>
<div class="pagination">
<?php echo pagination('show_uploaded_files', $number_of_pages, $current_page, $text_functions); ?>
</div>
<?php } else { ?>
<div class="template_wrapper">
<div class="wrapper_title"><h3><?php echo sanitize_1($text_templates['show_uploaded_files_template_no_files_title']);?></h3></div>
<div class="wrapper_content">
<p class="paragraph_mtb"><?php echo sanitize_1($text_templates['show_uploaded_files_template_no_files_text']);?></p>
</div>
</div>
<?php } ?>
