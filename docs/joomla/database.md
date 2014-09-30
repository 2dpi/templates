# Database

Read the official [docs](http://docs.joomla.org/Selecting_data_using_JDatabase)

```php
// accessing the database object
$db = JFactory::getDbo();
$query = $db->getQuery(true);
```
Building the query

```php
$query
    ->select($db->quoteName(array('user_id', 'profile_key', 'profile_value', 'ordering')))
    ->from($db->quoteName('#__user_profiles'))
    ->where($db->quoteName('profile_key') . ' LIKE '. $db->quote('\'custom.%\''))
    ->order('ordering ASC');
```

Getting the output

```php
$db->setQuery($query);
$row = $db->loadObjectList();
print_r($row);
```


NOTE: The difference between single table and multiple tables
