# Working with menus in Joomla#

## Responsive Menu##

Adding a responsive menu requires a few template changes.

For simplicty's sake it's probably best to duplicate the menu required to act responsive as it will allow more flexibilty with cuatom layout and run off it's own style sheet.

To achieve this we need to do the following:

- call in the module by title
- change the layout template for the responsive view

```
$module = JModuleHelper::getModule( 'menu', $menuTitle );
$attribs = array('layout' => 'www:responsive');
echo JModuleHelper::renderModule( $module, $attribs );
```

