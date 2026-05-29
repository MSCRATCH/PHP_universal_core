<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//pagination.php
//MMXXVI MSCRATCH

function calculate_offset(int $current_page, int $entries_per_page) {
return ($current_page - 1) * $entries_per_page;
}

function calculate_number_of_pages($total_records, $entries_per_page) {
if ($total_records === 0) {
return 1;
}
return ceil($total_records / $entries_per_page);
}

function validate_page_number(int $total_records, int $current_page, int $entries_per_page) {
if ($total_records === 0) {
$current_page = 1;
}
$number_of_pages = calculate_number_of_pages($total_records, $entries_per_page);
if ($current_page < 1 || $current_page > $number_of_pages) {
return 1;
} else {
return $current_page;
}
}

function pagination(string $url, int $number_of_pages, int $current_page, array $text_functions) {
$output = '';
$first_page = 1;
$prev_page = ($current_page > 1) ? $current_page - 1 : $current_page;
$output .= '<ul>';
$output .= '<li>'. '<a class="pagination_link" href="'. BASE_URL .sanitize_1($url). '/page/'. sanitize_1($prev_page). '">'. sanitize_1($text_functions['pagination_previous_page']). '</a>'. '</li>';
$output .= '<li>'. '<a class="pagination_link" href="'. BASE_URL .sanitize_1($url). '/page/'. sanitize_1($first_page). '">'. sanitize_1($text_functions['pagination_page']). "&nbsp;". sanitize_1($current_page). "&nbsp;". sanitize_1($text_functions['pagination_of']). "&nbsp;". sanitize_1($number_of_pages). '</a>'. '</li>';
$next_page = ($current_page < $number_of_pages) ? $current_page + 1 : $current_page;
$output .= '<li>'. '<a class="pagination_link" href="'. BASE_URL .sanitize_1($url). '/page/'. sanitize_1($next_page). '">'. sanitize_1($text_functions['pagination_next_page']). '</a>'. '</li>';
$output .= '</ul>';
return $output;
}
