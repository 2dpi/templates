# Date


```php
$dateFromDefault = ($jinput->getCmd('dpi_booking_date_search_from') ? $jinput->getCmd('dpi_booking_date_search_from') : $cck->getValue('dpi_booking_date_search_from') );
echo JHtml::calendar($dateFromDefault, 'dpi_booking_date_search_from', 'dpi_booking_date_search_from', '%Y-%m-%d', array('placeholder' => '- Date From -'));
```
