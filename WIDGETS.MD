# Creating custom widgets for PHP universal core 1.2.1

PHPUC allows you to easily create configurable content boxes, called custom widgets, in the backend. 
These can then be embedded anywhere in your layouts using their corresponding placeholders, making it easy to create fully manageable pages.
To use custom widgets, simply create a placeholder in the backend and insert that placeholder at the desired location within your layout.

```html
<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//widget_layout_example.php
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>{page_title}</title>
<meta charset="utf-8">
<meta name="robots" content="INDEX,FOLLOW">
<meta name="description" content="{page_description}">
<meta name="keywords" content="{page_keywords}">
<meta name="author" content="MSCRATCH">
<meta name="revisit-after" content="2 days">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="{base_url}themes/default_theme/css/default.css" media="all" type="text/css">
<link rel="stylesheet" href="{base_url}themes/default_theme/css/components.css" media="all" type="text/css">
<link rel="stylesheet" href="{base_url}fontawesome/css/all.min.css" />
<script src="{base_url}themes/default_theme/js/menu.js" defer></script>
<script src="{base_url}themes/default_theme/js/upd_btn.js" defer></script>
</head>
<body>
<div class="content">
{widget_feature_1}
</div>
<footer class="footer">
{widget_feature_2}
</footer>
</body>
</html>
```
