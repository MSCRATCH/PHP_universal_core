# Creating custom themes for PHP universal core 1.2.1

PHP universal core includes a flexible theme system that allows developers to create fully customized themes. It is built with a strict focus on simplicity and performance, using native HTML and CSS only, without relying on frameworks such as SASS or Bootstrap. 
This ensures full control over styling and markup while keeping the system lightweight and easy to extend or maintain.

## 1. Directory structure

A theme consists of two directories that must share the same name:

```text
/public/your_theme
/themes/your_theme
```

```text
PHP_universal_core/
├── public/
│   └── your_theme/
│       ├── css/
│       │   └── your_theme.css
│           └── components.css
│           └── system_pages.css
│       ├── js/
│       ├── fonts/
│       └── images/
│
└── themes/
    └── your_theme/
        ├── theme.json
        ├── layout_config.json
        ├── layout.php
```
### Public assets

The `/public/your_theme` directory contains all publicly accessible assets, including:

* CSS files
* JS files
* Fonts
* Images and other static resources

For security reasons, only files located within this directory can be accessed directly by the browser. Any assets required by your theme must therefore be stored and loaded from this location.

## 2. Theme configuration

Every theme directory must contain a configuration file named `theme.json`.

Example:

```text
/themes/your_theme/theme.json
```

The file name **must be exactly** `theme.json`. PHPUC uses this file to identify and load a theme. If the file is missing or contains invalid data, the theme will not be recognized.

### Required Format

```json
{
"theme_name": "your_theme",
"theme_author": "your_name",
"theme_version": "1.0.0",
"theme_stylesheet": "your_theme.css"
}
```

## 3. Custom layouts Per Page

Each page can use its own layout file. By default, all pages use the layout.php file from the active theme directory. If you want to assign different layouts to individual pages, you can add a layout_config.json file to themes/your_theme. 
This file allows you to explicitly define which layout is used for each page. If you only need a single layout, you can safely ignore this feature.

Example:

```json
{
"layouts": {
"article_handler": "layout",
"blog_handler": "layout",
"contact_handler": "layout",
"login_handler": "layout_tertiary",
"maintenance_mode": "layout_secondary",
"manage_profile_handler": "layout",
"profile_handler": "layout_profile",
"register_handler": "layout_secondary",
"user_activity_log_handler": "layout",
"verify_email_address_handler": "layout_tertiary"
}
}
```

## 4. Custom templates

Each theme can have its own template directory, and each page can be assigned an individual template from that directory.
To enable this feature, simply add a template_config.json file to themes/your_theme/. All custom templates must be stored in a subdirectory inside /templates.
This feature is completely optional and only required if you want to provide custom page templates for your theme.

Example:

```json
{
"templates": {
"template_directory": "frontend_templates",
"widget_template_directory": "widget_templates",
"article_handler": "article_template",
"custom_page_handler": "custom_page_template",
"blog_handler": "blog_template",
"contact_handler": "contact_template",
"login_handler": "login_template",
"manage_profile_handler": "manage_profile_template",
"profile_handler": "profile_template",
"register_handler": "register_template",
"user_activity_log_handler": "user_activity_log_template",
"verify_email_address_handler": "verify_email_address_template",
"profile_widget": "profile_widget_template"
}
}
```


## 5. Required css files

There are several CSS files that your theme must include, in addition to your own custom CSS file. 
These files define, for example, how the site looks in maintenance mode. You can simply take the files from the default theme and adjust them to your needs. PHPUC uses native CSS variables in its stylesheets.

```text
public/themes/your_theme/css/your_theme.css
public/themes/your_theme/css/components.css
public/themes/your_theme/css/system_pages.css

```

## 6. Available Layout Tags

PHPUC layouts use placeholders that are automatically replaced during rendering.

### General Tags

```text
{page_title}
{content}
{footer_text}
{page_description}
{page_keywords}
{base_url}
```

### Navigation Tags

The following tags output  `<li>` navigation elements for system pages and may be placed anywhere within a layout:

```text
{home_nav_item}
{login_nav_item}
{register_nav_item}
{profile_nav_item}
{user_activity_log_nav_item}
{profile_settings_nav_item}
{dashboard_nav_item}
{dashboard_moderator_nav_item}
{contact_nav_item}
{logout_nav_item}
```

Authentication dependent navigation items such as:

```text
{login_nav_item}
{register_nav_item}
{profile_nav_item}
{user_activity_log_nav_item}
{profile_settings_nav_item}
{dashboard_nav_item}
{dashboard_moderator_nav_item}
{logout_nav_item}
```

are automatically shown or hidden depending on the user's authentication status. Theme developers only need to place the tags within the layout, no additional checks are required.

## Administrator Statistics

The following tags provide runtime statistics:

```text
{page_rendering_time}
{memory_usage}
{included_files}
```

These values are only displayed when the current request is performed by an administrator.

### Profile Widget

```text
{profile_widget}
```

The `{profile_widget}` tag is only rendered within `layout_profile.php`.

If the tag is used in any other layout file, no output will be generated.

## 7. Asset references

Always prepend asset URLs with `{base_url}`.

Example:

```html
<link rel="stylesheet" href="{base_url}themes/your_theme/your_theme.css">
```

## 8. Security

Each layout file must start with:

```php
<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
```

This prevents direct access to layout files via the browser and ensures they can only be loaded through the system.

## 9. Layout example

```html
<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//layout.php
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
<nav class="navbar">
<div class="navbar_title">{page_title}</div>
<a href="#" class="toggle_button">Menu</a>
<div class="navbar_links">
<ul>
{home_nav_item}
{login_nav_item}
{register_nav_item}
{profile_nav_item}
{user_activity_log_nav_item}
{profile_settings_nav_item}
{dashboard_nav_item}
{dashboard_moderator_nav_item}
{contact_nav_item}
{logout_nav_item}
</ul>
</div>
</nav>
<div class="main_wrapper">
<div class="template_row">
<div class="template_column_1">
<div class="sidebar_nav">
<div class="sidebar_nav_title">
<h3><i class="fa-solid fa-house"></i> {page_title}</h3>
</div>
<ul>{nav_custom}</ul>
</div>
</div>
<div class="template_column_2">
{content}
<footer class="footer_primary">
<div class="footer_title">{footer_text}</div>
<ul>
<li class="list_style_none">{page_rendering_time}</li>
<li class="list_style_none">{memory_usage}</li>
<li class="list_style_none">{included_files}</li>
</ul>
</footer>
</div>
</div>
</div>
</body>
</html>
```
