## Creating custom themes for PHP_universal_core_3.0.0

# Theme System

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
* JavaScript files
* Fonts
* Images and other static resources

For security reasons, only files located within this directory can be accessed directly by the browser. Any assets required by your theme must therefore be stored and loaded from this location.

### Templates and Layouts

The `/themes/your_theme` directory contains the theme templates and layout files. Layouts use placeholders in a template-engine-like manner, allowing content to be dynamically injected into predefined sections.

Inline JavaScript is not executed. All JavaScript code must be placed in the theme's dedicated JavaScript directory.

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
    "theme_author": "your_name,
    "theme_version": "1.0.0",
    "theme_stylesheet": "your_theme.css"
}
```

## Handler-Specific Themes

Each handler can define its own:

* Theme directory
* Template
* Layout

This allows completely different layouts to be used for individual pages or sections of your application. If desired, every page can have its own dedicated theme and layout configuration.

## Required Layout Files

A standard theme should provide the following layout files:

```text
layout.php
layout_secondary.php
layout_tertiary.php
layout_profile.php
```

Although these files may contain identical content, they are intended to support different layout variations and are not required to be the same.

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

If the `theme.json` file is missing or invalid, PHPUC will ignore the theme and it will not be available for use.


## Available Layout Tags

PHPUC layouts use placeholders that are automatically replaced during rendering.

### General Tags

| Tag                  | Description                                                                   |
| -------------------- | ----------------------------------------------------------------------------- |
| `{page_title}`       | Dynamic page title provided by the backend.                                   |
| `{content}`          | Contains the rendered template content.                                       |
| `{footer_text}`      | Dynamic footer text configured in the backend.                                |
| `{page_description}` | Meta description tag content.                                                 |
| `{page_keywords}`    | Meta keywords tag content.                                                    |
| `{base_url}`         | Base URL of the installation. Always use this for links and asset references. |

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

Authentication-dependent navigation items such as:

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

| Tag               | Description                                                   |
| ----------------- | ------------------------------------------------------------- |
| `{primary_nav}`   | Outputs the primary navigation as unstyled `<li>` elements.   |
| `{secondary_nav}` | Outputs the secondary navigation as unstyled `<li>` elements. |

These tags intentionally return raw list items so they can be wrapped in custom `<ul>` containers and styled according to the theme's requirements.

Example:

```html
<ul class="main-nav">
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

| Tag                | Description                  |
| ------------------ | ---------------------------- |
| `{profile_widget}` | Displays the profile widget. |

The `{profile_widget}` tag is only rendered within `layout_profile.php`.

If the tag is used in any other layout file, no output will be generated. Alternatively, a custom layout containing `{profile_widget}` can be assigned to the profile page through `handlers_frontend/profile_handler.php`.

