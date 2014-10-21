# RSS

When adding RSS Feeds it's important to use absolute url's for all links (anchors and images).

```php
$app 	= JFactory::getApplication();
$jinput = $app->input;
$type   = $jinput->getCmd('type', '');
// only add if the page is a feed
$absUrl = ($type == 'rss' ?  'http://'.$_SERVER['SERVER_NAME']  : '' );

// OR

$absUrl = ($type == 'rss' ?  JURI::base()  : '' );

// Note: trailing / vs no trailing /.

```

You can now prefix a link with the path to the server name.

View the RSS Feed with one of the following:

- [Feedroll](http://www.feedroll.com/rssviewer/)
- [codebeautify](http://codebeautify.org/rssviewer/)

Validate your feed here:

- [w3.org](http://validator.w3.org/feed/)
- [sourceforge](http://feedvalidator.sourceforge.net/)
