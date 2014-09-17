# Menu

[Link](http://docs.joomla.org/How_to_determine_if_the_user_is_viewing_the_front_page)

[Link](http://api.joomla.org/cms-3/classes/JMenu.html)

```php
$app = JFactory::getApplication();
$menu = $app->getMenu();
```

```php
//print_r(JHTML::_('menu', array('published' => '1')));
///////////////////////////////////////////////////////
// GET MENU ITEMS, DB COLUMN, VALUE, SHOW ONLY FIRST //
///////////////////////////////////////////////////////
$filter    = 'parent_id';
$value     = '185';
$firstOnly = '';
$menuItems = $menu->getItems($filter,$value,$firstOnly);

//print_r(JHTML::_('menu', array('published' => '1')));
$id    = 123;
$menuItem = $menu->getItem($id);

```
needs further investigation

```php
print_r(JHtml::_('menu.menuitemlist', ''));
print_r(JHtml::_('menu.menuitems', array('published' => '1')));
```


http://www.phoca.cz/joomla/api/class-JHtmlMenu.html
