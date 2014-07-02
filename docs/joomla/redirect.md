# Redirect #

When working with forms or user specific actions a [redirect](http://api.joomla.org/cms-3/classes/JApplicationWeb.html#method_redirect) is often very useful.

After redirecting a user a [message](http://docs.joomla.org/Display_error_messages_and_notices) can be used to confirm any action taken. 
[^note-id]

``` php
JFactory::getApplication()->enqueueMessage($msg, $msgType);
JFactory::getApplication()->redirect($url);
```

[^note-id]: This is the text of the note. 
