# Dynamic

A "select dynamic" field (or dynamic drop-down list) creates a menu (or drop list) with a single or multiple choice.

Can use live field values i.e. cascading

```php
SELECT DISTINCT a.user_id AS VALUE, b.name AS text
FROM #__user_usergroup_map a, #__users b
WHERE a.user_id=b.id AND a.group_id >= 9 AND b.block=0
ORDER BY b.name
```
