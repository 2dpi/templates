# Add Script

Adding additional Javascript to the header of your site in the form of an external file or as a declaration.

Official documentaion:
- [addScript](http://docs.joomla.org/JDocument/addScript).
- [Adding JavaScript](http://docs.joomla.org/Adding_JavaScript)
- [addScriptDeclaration](http://docs.joomla.org/JDocument/addScriptDeclaration).

```php
// get a document object
$doc = JFactory::getDocument();
// addScript( $url, $type )
$doc->addScript('path_to_script','text/javascript');
// note if type not specified will default to 'text/javascript'.
$doc->addScript('path_to_script');

$doc->addScriptDeclaration('
    window.event("domready", function() {
        alert("An inline JavaScript Declaration");
    });
');
```

Loading the script asynchronously requires a little fiddling.


```php
// get a document object
$doc = JFactory::getDocument();
// note the single(') and double(") quotes
// resulting from output type-"" and the escaping required for additional params
$doc->addScript('path_to_script','text/javascript" defer="false" async="true');

// OR
$url, $type = "text/javascript", $defer = false, $async = false
$doc->addScript('path_to_script', 'text/javascript', false, true);
```


