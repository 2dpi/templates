# Working with menus in Joomla#

## Responsive Menu - Pure CSS##

Adding a responsive menu requires a few template changes.

For simplicty's sake it's probably best to duplicate the menu required to act responsive as it will allow more flexibilty with custom layout and have it's own styles/style sheet.

Based on a menu found [here](http://www.cssplay.co.uk/menus/) 

To achieve this we need to do the following:
### menu override template ###
- create a reponsive menu template override
- templates/yourtemplate/html/mod_menu/responsive.php
- templates/yourtemplate/html/mod_menu/responsive_component.php
- templates/yourtemplate/html/mod_menu/responsive_heading.php
- templates/yourtemplate/html/mod_menu/responsive_separator.php
- templates/yourtemplate/html/mod_menu/responsive_url.php

### menu override layout ###
- create new menu layout override
- templates/yourtemplate/html/mod_menu/layout.php
- assign layout to menu module in advanced tab

```php
// Note. It is important to remove spaces between elements.
$layout = isset($attribs['layout'])?$attribs['layout']:'default';
require(JModuleHelper::getLayoutPath('mod_menu',$layout));
```

### duplicate menu module ###
- call in the module by title in your template
- define layout
- add some wrappers and css to handle visibility

```php
<nav class="nav_main not_responsive">
    <!-- default layout -->
    <?php $module = JModuleHelper::getModule( 'menu', $menuTitle );
        $attribs = array('layout' => '_:default');
        echo JModuleHelper::renderModule( $module, $attribs );
    ?>
</nav>
```
```php
<nav class="menuHolder is_responsive">
    <!-- responsive layout -->
    <?php $module = JModuleHelper::getModule( 'menu', $menuTitle );
        $attribs = array('layout' => 'www:responsive');
        echo JModuleHelper::renderModule( $module, $attribs );
    ?>
</nav>
```

### add toggle ###
- add the (hamburger) toggle to your template 

```html
<div class="trigger">
    <label for="toggle"><span>Menu Toggle</span></label>
</div>
<input type="checkbox" id="toggle" />
<div class="wrapper" onclick=""></div>
```

