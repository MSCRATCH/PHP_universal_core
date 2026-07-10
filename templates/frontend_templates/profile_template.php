<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//profile_template.php
//MMXXVI MSCRATCH
?>

<div class="template_wrapper">
<div class="template_wrapper_title"><h3><i class="fa-solid fa-user"></i> <?php echo sanitize_1($text_templates['profile_template_title_profile_description']);?></h3></div>
<div class="template_wrapper_content">
<?php if (empty($profile['user_profile_description'])) { ?>
<p class="paragraph_nm"><?php echo sanitize_1($text_templates['profile_template_no_profile_description']);?></p>
<?php } else { ?>
<p class="paragraph_nm"><?php echo sanitize_1($profile['user_profile_description']);?></p>
<?php } ?>
</div>
</div>
