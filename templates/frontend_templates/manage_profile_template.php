<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//manage_profile_template.php
//MMXXVI MSCRATCH
?>

<?php $token_upload_user_profile_image = generate_token('upload_user_profile_image');?>
<?php $token_update_profile = generate_token('update_profile');?>

<?php if (! isset($errors)) {$errors = '';}?>
<?php if (! empty($errors)) { ?>
<div class="template_wrapper">
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
<div class="template_wrapper">
<div class="template_wrapper_title"><h3><i class="fa-solid fa-cloud"></i> <?php echo sanitize_1($text_templates['manage_profile_template_title_upload']);?></h3></div>
<div class="template_wrapper_content">
<form enctype="multipart/form-data" method="post">
<div class="btn_column">
<button class="btn_upload" type="button" id="btn_upload"><?php echo sanitize_1($text_templates['manage_profile_template_btn_search_for_image_file']);?></button>
<input type="file" name="user_profile_image" id="file_input">
<input type="hidden" name="csrf_token" value="<?php echo $token_upload_user_profile_image;?>">
<button class="btn_submit" type="submit" name="upload_user_profile_image" id="btn_submit"><?php echo sanitize_1($text_templates['manage_profile_template_btn_upload_profile_image']);?></button>
</div>
</form>
</div>
</div>
<div class="template_wrapper">
<div class="template_wrapper_title"><h3><i class="fa-solid fa-user"></i> <?php echo sanitize_1($text_templates['manage_profile_template_title_update_description']);?></h3></div>
<div class="template_wrapper_content">
<form method="post">
<label class="label_default" for="user_profile_location_form"><?php echo sanitize_1($text_templates['manage_profile_template_label_location']);?></label>
<input class="form_text_default" type="text" name="user_profile_location_form" id="" value="<?php echo sanitize_1($profile['user_profile_location']);?>">
<label class="label_default" for="user_profile_description_form"><?php echo sanitize_1($text_templates['manage_profile_template_label_profile_description']);?></label>
<textarea class="textarea_default" name="user_profile_description_form" id="user_profile_description_form"><?php echo sanitize_1($profile['user_profile_description']);?></textarea>
<input type="hidden" name="csrf_token" value="<?php echo $token_update_profile;?>">
<button class="btn btn--btn_primary" type="submit" name="update_profile"><?php echo sanitize_1($text_templates['manage_profile_template_btn_update_profile']);?></button>
</form>
</div>
</div>
