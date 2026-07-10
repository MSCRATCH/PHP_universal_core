<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//request_log_template.php
//MMXXVI MSCRATCH
?>

<?php if ($result !== false) { ?>
<div class="table_wrap">
<div class="horizontal_scroll">
<table class="responsive">
<thead>
<tr>
<th><i class="fa-solid fa-network-wired"></i> <?php echo sanitize_1($text_templates['request_log_template_ip_address']);?></th>
<th><i class="fa-solid fa-server"></i> <?php echo sanitize_1($text_templates['request_log_template_browser']);?></th>
<th><i class="fa-solid fa-link"></i> <?php echo sanitize_1($text_templates['request_log_template_requested_url']);?></th>
<th><i class="fa-solid fa-calendar"></i> <?php echo sanitize_1($text_templates['request_log_template_timestamp']);?></th>
<th><i class="fa-solid fa-user"></i> <?php echo sanitize_1($text_templates['request_log_template_registered_user']);?></th>
</tr>
</thead>
<tbody>
<?php foreach ($result as $row) {  ?>
<tr>
<td data-label="IP address"><?php echo sanitize_1($row['request_log_ip_address']);?></td>
<td data-label="Browser"><?php echo sanitize_1($row['request_log_browser']);?></td>
<td data-label="Requested URL"><?php echo sanitize_1($row['request_log_requested_url']);?></td>
<td data-label="Timestamp"><?php echo sanitize_1($row['request_log_timestamp']);?></td>
<?php $username_request_log = sanitize_1($row['username']);?>
<?php if ($row['username'] === NULL) { ?>
<td data-label="Registered user"><?php echo sanitize_1($text_templates['request_log_template_no_user']);?></td>
<?php } else { ?>
<td data-label="Registered user"><?php echo sanitize_3($row['username']);?></td>
<?php } ?>
</tr>
<?php } ?>
</tbody>
</table>
</div>
<div class="pagination_secondary">
<?php echo pagination('request_log', $number_of_pages, $current_page, $text_functions); ?>
</div>
</div>
<?php } else { ?>
<div class="template_wrapper">
<div class="wrapper_title"><h3><i class="fa-solid fa-floppy-disk"></i> <?php echo sanitize_1($text_templates['request_log_template_no_entries_title']);?></h3></div>
<div class="wrapper_content">
<p class="paragraph_nm"><?php echo sanitize_1($text_templates['request_log_template_no_entries_text']);?></p>
</div>
</div>
<?php } ?>
