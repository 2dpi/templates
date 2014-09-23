# Plugins

Depending on the namespace a plugin might not fire off correctly. In such an case try using following code.

```php
$text = '{emailoptions}Send Client Email:0{/emailoptions}';
$text = JHtml::_('content.prepare', $text);
```

OR
see following [link](http://docs.joomla.org/Supporting_plugins_in_your_component)
```php
// plugin group
JPluginHelper::importPlugin( 'ajax' );
$dispatcher = JDispatcher::getInstance();
// plugin event
$results = $dispatcher->trigger( 'onAjaxLatestarticles','' );
echo "<pre>";
print_r($results);
echo "</pre>";
```
