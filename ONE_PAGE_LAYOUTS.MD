# Creating one page layouts for PHP universal core 1.2.1

PHPUC allows the creation of one page layouts. These can then be set as the homepage in the backend or added as a navigation element.

## 1. Register a frontend section

For security reasons, all manually created frontend pages must be explicitly registered in an allowlist. Simply add your page name, for example your_page, to the array in config/allowed_frontend_sections.php. 
The name you register defines the URL path that will be used to access the page. Make sure to use the same name when creating the frontend handler in the next step.

```php
$allowed_frontend_sections = array(
'login',
'register',
'logout',
'profile',
'manage_profile',
'blog',
'article',
'notifications',
'verify_email_address',
'contact',
'your_page',
);
```

## 2. Create a new handler

Create a new handler in the handlers_frontend directory. The filename must end with the _handler suffix, for example your_page_handler.php. The handler loads the layout from the active theme directory. In the example below, the layout is called one_page_layout.

Once the handler has been created and the corresponding layout is available, the page can be accessed directly via its URL without the _handler suffix. For example, a handler named your_page_handler.php is accessible as your_page. 
Finally, the one page layout can either be configured as the homepage in the backend or linked through the navigation system.

The one page layout is designed to work together with the custom widget system. By placing widgets in predefined placeholders, you can build fully customizable one page websites. This makes it easy to create flexible landing pages, portfolios, or other single page websites that can be managed entirely through the CMS.

```php
<?php
defined('CORE_LOADED') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//your_page_handler.php

$layout = 'one_page_layout';

render_page($db, $settings, $feature_flags, $text_functions, $text_handlers, $text_templates, $text_fatal_error_message, $activated_theme['theme_key'], $layout, [
'page_type' => 'widget_page',
]);
```
