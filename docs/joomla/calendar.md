# Calendar

[JHtml::calendar](http://api.joomla.org/cms-3/classes/JHtml.html)


```php
<!-- calendar(string $value, string $name, string $id, string $format = '%Y-%m-%d', array $attribs = null) : string -->
echo JHtml::calendar($value, $name, $id, '%Y-%m-%d', array('placeholder' => '- Date from -'))
```

Making the input field clickable

```php
$doc->addScriptDeclaration('jQuery(document).ready(function($) {Calendar.setup({inputField: "field_name",trigger: "field_id",align: "B1"});});');
```
