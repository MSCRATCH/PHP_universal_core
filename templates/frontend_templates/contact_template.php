<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//contact_template.php
//MMXXVI MSCRATCH
?>

<?php $token_contact = generate_token('contact');?>

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
<div class="template_wrapper_title"><h3><i class="fa-solid fa-envelope"></i> <?php echo sanitize_1($text_templates['contact_template_title']);?></h3></div>
<div class="template_wrapper_content">
<form method="post">
<label class="label_default" for="subject_form"><?php echo sanitize_1($text_templates['contact_template_label_subject']);?></label>
<input class="form_text_default" type="text" name="subject_form" id="subject_form">
<label class="label_default" for="from_email_form"><?php echo sanitize_1($text_templates['contact_template_label_email']);?></label>
<input class="form_text_default" type="text" name="from_email_form" id="from_email_form">
<label class="label_default" for="from_name_form"><?php echo sanitize_1($text_templates['contact_template_label_name']);?></label>
<input class="form_text_default" type="text" name="from_name_form" id="from_name_form">
<label class="label_default" for="email_text_form"><?php echo sanitize_1($text_templates['contact_template_label_text']);?></label>
<textarea class="textarea_default" name="email_text_form" id="email_text_form"></textarea>
<p class="paragraph_nm"><?php echo sanitize_1($settings['security_question']);?></p>
<label class="label_default" for="contact_security_question_answer_form"><?php echo sanitize_1($text_templates['contact_template_label_security_question']);?></label>
<input class="form_text_default" type="text" name="contact_security_question_answer_form" id="contact_security_question_answer_form">
<input type="hidden" name="csrf_token" value="<?php echo $token_contact;?>">
<div class="homepage">
<input type="text" name="homepage" tabindex="-1" autocomplete="off">
</div>
</div>
<div class="template_wrapper_footer">
<div class="btn_row">
<button class="btn btn--btn_primary" type="submit" name="contact"><?php echo sanitize_1($text_templates['contact_template_btn']);?></button>
</form>
</div>
</div>
</div>
