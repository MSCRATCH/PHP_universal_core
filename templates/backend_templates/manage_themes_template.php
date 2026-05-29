<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//manage_themes_template.php
//MMXXVI MSCRATCH
?>

<?php $token_activate_theme = generate_token('activate_theme');?>
<?php $token_deactivate_theme = generate_token('deactivate_theme');?>

<div class="template_wrapper_mb">
<div class="wrapper_title"><h3><i class="fa-solid fa-brush"></i> <?php echo sanitize_1($text_templates['manage_themes_template_title']);?></h3></div>
<div class="wrapper_content">
<p class="paragraph_nm"><?php echo sanitize_1($text_templates['manage_themes_template_text']);?></p>
</div>
</div>

<?php if ($result !== false) { ?>

<div class="card_group_row_3">
<?php foreach ($result as $row) {  ?>
<div class="template_wrapper_flex">
<div class="wrapper_title">
<h3><i class="fa-solid fa-brush"></i> <?php echo sanitize_1($row['theme_name']);?></h3>
</div>
<div class="wrapper_content_flex">
<ul>
<li class="list_style_none"><span class="span_muted"><?php echo sanitize_1($text_templates['manage_themes_template_key']);?></span> <span class="span_b"><?php echo sanitize_1($row['theme_key']);?></span></li>
<li class="list_style_none"><span class="span_muted"><?php echo sanitize_1($text_templates['manage_themes_template_author']);?></span> <span class="span_b"><?php echo sanitize_1($row['theme_author']);?></span></li>
<li class="list_style_none"><span class="span_muted"><?php echo sanitize_1($text_templates['manage_themes_template_version']);?></span> <span class="span_b"><?php echo sanitize_1($row['theme_version']);?></span></li>
<?php if ($row['active_theme'] == 1) {  ?>
<li class="list_style_none"><?php echo sanitize_1($text_templates['manage_themes_template_is_active_theme']);?></li>
<?php } else { ?>
<li class="list_style_none"><?php echo sanitize_1($text_templates['manage_themes_template_is_not_active_theme']);?></li>
<?php } ?>
</ul>
</div>
<?php if ($theme_is_already_active === false or $row['active_theme'] == 1) { ?>
<div class="template_wrapper_footer">
<div class="btn_row">
<?php if ($row['active_theme'] == 1) { ?>
<form method="post">
<input type="hidden" name="theme_id_form" value="<?php echo sanitize_1($row['theme_id']);?>">
<input type="hidden" name="csrf_token" value="<?php echo $token_deactivate_theme;?>">
<button class="btn btn--btn_dng" type="submit" name="deactivate_theme"><?php echo sanitize_1($text_templates['manage_themes_template_btn_deactivate_theme']);?></button>
</form>
<?php } elseif($theme_is_already_active === false) { ?>
<form method="post">
<input type="hidden" name="theme_id_form" value="<?php echo sanitize_1($row['theme_id']);?>">
<input type="hidden" name="csrf_token" value="<?php echo $token_activate_theme;?>">
<button class="btn btn--btn_primary" type="submit" name="activate_theme"><?php echo sanitize_1($text_templates['manage_themes_template_btn_activate_theme']);?></button>
</form>
<?php } ?>
</div>
</div>
<?php } else { ?>
<div class="template_wrapper_footer">
<p class="paragraph_und"><?php echo sanitize_1($text_templates['manage_themes_template_theme_already_activated']);?></p>
</div>
<?php } ?>
</div>
<?php } ?>
</div>
<?php } else { ?>
<div class="template_wrapper">
<div class="wrapper_title"><h3><?php echo sanitize_1($text_templates['manage_themes_template_no_themes_title']);?></h3></div>
<div class="wrapper_content">
<p class="paragraph_nm"><?php echo sanitize_1($text_templates['manage_themes_template_no_themes_text']);?></p>
</div>
</div>
<?php } ?>
