# Related Article Field

### Setup

**NB!** Content Type (Parent) = content type calling related article in.

i.e if you want to relate a user to an article then the parent cantent type would be article and not user.

Calling in the related article field:

```php
// get article id of related article
$cck->getValue('related_article_field');

// get article title for related article
$cck->getText('related_article_field');

// get results for multiple results
foreach ($cck->getValue('your_related_article_field_x') as $key => $related) {
	$related_info = JCckContentArticle::getRow($related->value);
	echo $related_info->db_column_name.'<br>';
	echo $related_info->db_column_name_2.'<br>';
}
```
