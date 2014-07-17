# Working with menus in Joomla#

## Responsive Menu##

Adding a responsive menu requires a few template changes.

For simplicty's sake it's probably best to duplicate the menu required to act responsive as it will allow more flexibilty with custom layout and have it's own styles/style sheet.

To achieve this we need to do the following:

- cretae new menu layout override
- templates/www/html/mod_menu/layout.php

```php
// Note. It is important to remove spaces between elements.
$layout = isset($attribs['layout'])?$attribs['layout']:'default';
require(JModuleHelper::getLayoutPath('mod_menu',$layout));
```

- call in the module by title
- define layout

``` php
$module = JModuleHelper::getModule( 'menu', $menuTitle );
$attribs = array('layout' => 'www:responsive');
echo JModuleHelper::renderModule( $module, $attribs );
```

