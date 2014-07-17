# Working with menus in Joomla#

## Responsive Menu##

Adding a responsive menu requires a few template changes.

For simplicty's sake it's probably best to duplicate the menu required to act responsive as it will allow more flexibilty with custom layout and have it's own styles/style sheet.

To achieve this we need to do the following:

- call in the module by title
- change the layout template for the responsive view

``` php
$module = JModuleHelper::getModule( 'menu', $menuTitle );
$attribs = array('layout' => 'www:responsive');
echo JModuleHelper::renderModule( $module, $attribs );
```

