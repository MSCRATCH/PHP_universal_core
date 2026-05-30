# Creating custom themes for PHP_universal_core_3.0.0

PHP_universal_core_3.0.0 includes a flexible theme system that allows developers to create fully customized themes.

## Directory Structure

A theme consists of two directories that must share the same name:

```text
/public/your_theme
/themes/your_theme
```

### Public Assets

The `/public/your_theme` directory contains all publicly accessible assets, including:

* CSS files
* JS files
* Fonts
* Images and other static resources

For security reasons, only files located within this directory can be accessed directly by the browser. Any assets required by your theme must therefore be stored and loaded from this location.

### Templates and Layouts

The `/themes/your_theme` directory contains the theme layout files. Layouts use placeholders, allowing content to be dynamically injected into predefined sections.

Inline JS is not executed. All JS code must be placed in the theme's dedicated JS directory.

## Theme Configuration

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

### Custom Layouts Per Page

Every page can use its own layout file.

The layout is determined by the parameter passed to `render_page()`. By default, many pages use the standard `layout` file, but this value can be changed to load any layout available in the currently active theme.

Example:

```php
render_page(
$db,
$settings,
$text_functions,
$text_handlers,
$text_templates,
$text_fatal_error_message,
'frontend_templates',
$activated_theme['theme_key'],
'layout',
[
'template_name'   => 'blog_template',
'current_page'    => $current_page,
'number_of_pages' => $number_of_pages,
'result'          => $result,
]
);
```

The eighth parameter specifies the layout file to load from the active theme. For example:

```php
'layout'
```

loads:

```text
/themes/your_theme/layout.php
```

while:

```php
'layout_profile'
```

loads:

```text
/themes/your_theme/layout_profile.php
```

This makes it possible to assign completely different layouts to individual pages.


## Required Layout Files

A standard theme should provide the following layout files:

```text
layout.php
layout_secondary.php
layout_tertiary.php
layout_profile.php
```

All four layout files are mandatory and must exist within every theme, as they are referenced by different parts of the system.

## Example Theme Structure

```text
project/
├── public/
│   └── your_theme/
│       ├── css/
│       │   └── your_theme.css
│       ├── js/
│       ├── fonts/
│       └── images/
│
└── themes/
    └── your_theme/
        ├── theme.json
        ├── layout.php
        ├── layout_secondary.php
        ├── layout_tertiary.php
        └── layout_profile.php
```


## Available Layout Tags

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

### Dynamic Navigation

```text
{primary_nav}
{secondary_nav}
```

These tags intentionally return raw list items so they can be wrapped in custom `<ul>` containers and styled according to the theme's requirements.

Example:

```html
<ul class="main_nav">
{primary_nav}
</ul>
```

### Administrator Statistics

The following tags provide runtime statistics:

```text
{page_rendering_time}
{memory_usage}
{included_files}
```

These values are only displayed when the current request is performed by an administrator.

### Asset References

Always prepend asset URLs with `{base_url}`.

Example:

```html
<link rel="stylesheet" href="{base_url}themes/your_theme/your_theme.css">
```

### Profile Widget

```text
{profile_widget}
```

The `{profile_widget}` tag is only rendered within `layout_profile.php`.

If the tag is used in any other layout file, no output will be generated. Alternatively, a custom layout containing `{profile_widget}` can be assigned to the profile page through `handlers_frontend/profile_handler.php`.


## Security

Each layout file must start with:

```php id="k2p9aa"
<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
```

This prevents direct access to layout files via the browser and ensures they can only be loaded through the system.

