# Admin / Site

If you need to restrict a function to either the admin or site use the following:

```php
$app = JFactory::getApplication();
echo $app->isSite();
echo $app->isAdmin();
```
