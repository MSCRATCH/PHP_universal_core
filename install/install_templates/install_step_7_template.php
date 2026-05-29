<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//install_step_7_template.php
//MMXXVI MSCRATCH
?>

<?php if (tables_exist($db) === false) { ?>
<?php if (! isset($insert_sql_tables_errors)) {$insert_sql_tables_errors = '';}?>
<?php if (! empty($insert_sql_tables_errors)) { ?>
<div class="wrapper wrapper_mb">
<div class="wrapper_title"><h1><?php echo htmlentities($text_install['install_page_error_message']);?></h1></div>
<div class="wrapper_content">
<ul>
<?php foreach ($insert_sql_tables_errors as $insert_sql_tables_error) {  ?>
<li><?php echo htmlentities($insert_sql_tables_error);?></li>
<?php } ?>
</ul>
</div>
</div>
<?php } ?>
<?php } ?>

<div class="wrapper">
<div class="wrapper_title"><h1><?php echo htmlentities($text_install['install_page_7_title']);?></h1></div>
<div class="wrapper_content">
<?php if (tables_exist($db) === false) { ?>
<p class="paragraph_mtb"><?php echo htmlentities($text_install['install_page_7_sql_tables_not_created']);?></p>
<?php } else { ?>
<?php $_SESSION['install_step_7'] = true; ?>
<p class="paragraph_mtb"><?php echo htmlentities($text_install['install_page_7_sql_tables_successfully_created']);?></p>
<?php } ?>
</div>
<?php if (tables_exist($db) === false) { ?>
<div class="wrapper_footer">
<div class="btn_row">
<form method="post">
<button class="btn" type="submit" name="insert_sql_tables"><?php echo htmlentities($text_install['install_page_7_btn']);?></button>
</form></div>
</div>
<?php } ?>
<?php if (! empty($_SESSION['install_step_7'])) { ?>
<div class="wrapper_footer">
<div class="btn_row">
<a class="btn" href="<?php echo '?install_step=6'?>"><?php echo htmlentities($text_install['install_page_btn_previous_step']);?></a>
<a class="btn_rd" href="<?php echo '?install_step=8'?>"><?php echo htmlentities($text_install['install_page_btn_next_step']);?></a>
</div>
</div>
<?php } ?>
</div>
