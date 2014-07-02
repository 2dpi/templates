# Redirect #

When working with forms or user specific actions a redirect is often very useful.

After redirecting a user a [http://docs.joomla.org/Display_error_messages_and_notices](message) can be used to confirm any action taken. 

`Note:` error need to be placed in front of redirect 

``` php
JFactory::getApplication()->enqueueMessage($msg, $msgType);
JFactory::getApplication()->redirect($url);
```
