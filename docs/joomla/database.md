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


```php
<?php
$jinput = JFactory::getApplication()->input;
$view = $jinput->get('view', '', '');
//echo $view;
// echo "<pre>";
// print_r($this->groups);
// echo "</pre>";
$article = $this->groups['Article'];
//echo "<pre>";
//print_r($article);
//echo "</pre>";
$related_content = $this->groups['Article- [app_related_content]'];
// echo "<pre>";
// print_r($related_content);
// echo "</pre>";
$elements= $article->elements;
//echo "<pre>";
// print_r($elements);
// echo "</pre>";
$related_elements= $related_content->subgroups;
// echo "<pre>";
// print_r($related_elements);
// echo "</pre>";
$description= $elements['description']->element;
//echo "<pre>";
//print_r($description);
//echo "</pre>";
$today = date('Y-m-d', strtotime(new JDate()));
// accessing the database object
$db = JFactory::getDbo();
$query = $db->getQuery(true);
$query->select('*');
$query->from($db->quoteName('app_lists'));
$db->setQuery($query);
$list_items = $db->loadObjectList();
// create array for select list options
$select_options = array();
foreach ($list_items as $key => $list_item) {
	// push values to select list array
	$select_options[$list_item->id] = $list_item->label;
}

foreach ($related_elements as $key => $related_element) {
	$rel_prod_code = $related_element['rel_prod_code']->element_ro;
	$rel_ass{$key} = strtolower(str_replace(' ', '_', $related_element['rel_ass']->element_ro));
	$rel_prod_code = explode(' - ', $rel_prod_code);
	$prod_code = $rel_prod_code[0];
	$rel_key{$key} = $key;
	$db = JFactory::getDbo();
	$query = $db->getQuery(true);
	$query->select(array('a.*', 'b.*', 'c.*', 'd.*', 'e.*'));
	$query->join('LEFT', $db->quoteName('app_media', 'b') . ' ON (' . $db->quoteName('a.id') . ' = ' . $db->quoteName('b.prod_id') . ')');
	$query->join('LEFT', $db->quoteName('app_product_attribs', 'c') . ' ON (' . $db->quoteName('a.id') . ' = ' . $db->quoteName('c.prod_id') . ')');
	$query->join('LEFT', $db->quoteName('app_publishing', 'd') . ' ON (' . $db->quoteName('a.id') . ' = ' . $db->quoteName('d.product_id') . ')');
	$query->join('LEFT', $db->quoteName('app_related_content', 'e') . ' ON (' . $db->quoteName('a.code') . ' = ' . $db->quoteName('e.rel_prod_code') . ')');
	$query->from($db->quoteName('app_products', 'a'));
	//$query->where($db->quoteName('a.code').' = '.$db->quote( $prod_code));
	$query->where($db->quoteName('a.code').' = ' . $db->quote($prod_code));
	//$query->where($db->quoteName('a.code').' = \'SCDGBSDC\'');
	$db->setQuery($query);
	$rows = $db->loadObjectList();
	$prod_count = count($rows);
	//echo $prod_count;
	// echo '<pre>';
	// print_r($rows);
	// echo '</pre>';
	foreach ($rows as $key => $row) {
		///////////////////////////////////////////////////////////////////////
		// add filters to eliminate duplicates and define seasonal pricing //
		///////////////////////////////////////////////////////////////////////
		//echo $key;
		$prod_key                                   = $key >=1 ? '_'.$key : '';
		${'prod_ass_'.$prod_key}                    = strtolower(str_replace(' ', '_', $select_options[$row->rel_ass]));
		${'publish_up_'.$prod_key}                  = date('Y-m-d', strtotime($row->publish_up));
		${'publish_down_'.$prod_key}                = $row->publish_down != '0000-00-00 00:00:00' ? date('Y-m-d', strtotime($row->publish_down)) : date('Y-m-d', strtotime(new JDate('now +1 day')));
		${'is_current'.$prod_key}                   = ${'publish_up_'.$prod_key}  <= $today && ${'publish_down_'.$prod_key}  > $today ? 1 :0;
		${${'prod_ass_'.$prod_key}.'_pricing_tier'} = ${'is_current'.$prod_key} == 1 ? ${'prod_ass_'.$prod_key}.$prod_key.'_current' : ${'prod_ass_'.$prod_key}.$prod_key.'_'.strtolower(str_replace(' ', '_', $select_options[$row->pricing_tier]));
		$prod_ident                                 = ${${'prod_ass_'.$prod_key}.'_pricing_tier'};
		echo $key;
		echo '<br>';
		echo $prod_ident;
		echo '<br>';
		${$prod_ident.'_start'}                     = ${'publish_up_'.$prod_key};
		${$prod_ident.'_end'}                       = ${'publish_down_'.$prod_key};
		///////////////////////////////////////////
		// DEFINE VARIABLES FOR USE IN TEMPLATES //
		///////////////////////////////////////////
		${$prod_ident.'_prod_id'}       = $row->status == 15 ? $row->prod_id : '';
		${$prod_ident.'_pricing_tier'}  = $row->status == 15 ? strtolower(str_replace(' ', '_', $select_options[$row->pricing_tier])) : '';
		${$prod_ident.'_code'}          = $row->status == 15 ? $row->code : '';
		${$prod_ident.'_cost_price'}    = $row->status == 15 ? $row->cost_price : '';
		${$prod_ident.'_selling_price'} = $row->status == 15 ? $row->selling_price : '';
		${$prod_ident.'_retail_price'}  = $row->status == 15 ? $row->retail_price : '';
		${$prod_ident.'_status'}        = $row->status == 15 ? $row->status : '';
		${$prod_ident.'_supplier'}      = $row->status == 15 ? $row->supplier : '';
		${$prod_ident.'_attachment'}    = $row->status == 15 ? $row->attachment : '';
		${$prod_ident.'_url'}           = $row->status == 15 ? $row->url : '';
		${$prod_ident.'_video_id'}      = $row->status == 15 ? $row->video_id : '';
		${$prod_ident.'_product_type'}  = $row->status == 15 ? $row->product_type : '';
		${$prod_ident.'_tour_type'}     = $row->status == 15 ? $row->tour_type : '';
		${$prod_ident.'_age_group'}     = $row->status == 15 ? $row->age_group : '';
		${$prod_ident.'_package'}       = $row->status == 15 ? $row->package : '';
		${$prod_ident.'_meals'}         = $row->status == 15 ? $row->meals : '';
		${$prod_ident.'_trf_opt'}       = $row->status == 15 ? $row->trf_opt : '';
		${$prod_ident.'_tour_duration'} = $row->status == 15 ? $row->tour_duration : '';
		${$prod_ident.'_stay_duration'} = $row->status == 15 ? $row->stay_duration : '';
		${$prod_ident.'_price_option'}  = $row->status == 15 ? $row->price_option : '';
		${$prod_ident.'_seasons'}       = $row->status == 15 ? $row->seasons : '';
		${$prod_ident.'_description'}   = $row->status == 15 ? $row->description : '';
		${$prod_ident.'_itinerary'}     = $row->status == 15 ? $row->itinerary : '';
		${$prod_ident.'_included'}      = $row->status == 15 ? $row->included : '';
		${$prod_ident.'_extras'}        = $row->status == 15 ? $row->extras : '';
		${$prod_ident.'_bring'}         = $row->status == 15 ? $row->bring : '';
		${$prod_ident.'_expect'}        = $row->status == 15 ? $row->expect : '';
		${$prod_ident.'_map_url'}       = $row->status == 15 ? $row->map_url : '';
		${$prod_ident.'_longitude'}     = $row->status == 15 ? $row->longitude : '';
		${$prod_ident.'_latitude'}      = $row->status == 15 ? $row->latitude : '';
		${$prod_ident.'_located'}       = $row->status == 15 ? $row->located : '';
		${$prod_ident.'_directions'}    = $row->status == 15 ? $row->directions : '';
		${$prod_ident.'_unit_size'}     = $row->status == 15 ? $row->unit_size : '';
		${$prod_ident.'_min_qty'}       = $row->status == 15 ? $row->min_qty : '';
		${$prod_ident.'_diving_cert'}   = $row->status == 15 ? $row->diving_cert : '';
		${$prod_ident.'_acc_type'}      = $row->status == 15 ? $row->acc_type : '';
		${$prod_ident.'_disc_terms'}    = $row->status == 15 ? $row->disc_terms : '';
		${$prod_ident.'_disc_text'}     = $row->status == 15 ? $row->disc_text : '';
		${$prod_ident.'_highlights'}    = $row->status == 15 ? $row->highlights : '';
		${$prod_ident.'_safety'}        = $row->status == 15 ? $row->safety : '';
		${$prod_ident.'_title'}         = $row->status == 15 ? $row->title : '';
		${$prod_ident.'_state'}         = $row->status == 15 ? $row->state : '';
		${$prod_ident.'_access'}        = $row->status == 15 ? $row->access : '';
		${$prod_ident.'_featured'}      = $row->status == 15 ? $row->featured : '';
		${$prod_ident.'_language'}      = $row->status == 15 ? $row->language : '';
		${$prod_ident.'_art_type'}      = $row->status == 15 ? $row->art_type : '';
	}

}
if (isset($core_product_current_pricing_tier)) {
	echo '<h3>This is the current core product</h3>';
	echo $core_product_current_code;
	echo '<br>';
	echo 'pricing tier: '. $core_product_current_pricing_tier;
	echo '<br>';
	echo 'id: ' .$core_product_current_prod_id;
	echo '<br>';
	echo 'cost: ' .$core_product_current_cost_price;
	echo '<br>';
	echo 'sell: ' .$core_product_current_selling_price;
	echo '<br>';
	echo 'retail: ' .$core_product_current_retail_price;
	echo '<br>';
	echo 'start: ' .$core_product_current_start;
	echo '<br>';
	echo 'end: ' .$core_product_current_end;
}

//if (isset($core_product_pricing_tier_high_season1)) {
	echo '<h3>This is the high season core product</h3>';
	for ($i=0; $i < $prod_count; $i++) {
		echo '<br>';
		echo 'pricing tier: '.${'core_product_'.$i.'_high_season_pricing_tier'};
		echo '<br>';
		echo '<br>';
		echo 'id: ' .${'core_product_'.$i.'_high_season_prod_id'};
		echo '<br>';
		echo 'cost: ' .${'ccore_product_'.$i.'_high_season_cost_price'};
		echo '<br>';
		echo 'sell: ' .${'core_product_'.$i.'_high_season_selling_price'};
		echo '<br>';
		echo 'retail: ' .${'core_product_'.$i.'_high_season_retail_price'};
		echo '<br>';
		echo 'start: ' .${'core_product_'.$i.'_high_season_start'};
		echo '<br>';
		echo 'end: ' .${'core_product_'.$i.'_high_season_end'};
	}
//}

if (isset($core_product_pricing_tier_mid_season)) {
	echo '<h3>This is the mid season core product</h3>';
	echo 'pricing tier: ';
	echo $core_product_pricing_tier_mid_season;
	echo 'cost: ' .$core_product_cost_price_mid_season;
	echo '<br>';
	echo 'sell: ' .$core_product_selling_price_mid_season;
	echo '<br>';
	echo 'retail: ' .$core_product_retail_price_mid_season;
	echo '<br>';
	echo 'start: ' .$core_product_start_mid_season;
	echo '<br>';
	echo 'end: ' .$core_product_end_mid_season;
}
if (isset($core_product_pricing_tier_low_season)) {
	echo '<h3>This is the low season core product</h3>';
}
if (isset($child_pricing_tier_current)) {
	echo '<h3>This is the current child product</h3>';
	echo 'pricing tier: '.$child_pricing_tier_current;
	echo '<br>';
	echo 'code: '.$child_code_current;
	echo '<br>';
	echo 'id: ' .$child_prod_id_current;
	echo '<br>';
	echo 'start: ' .$child_start_current;
	echo '<br>';
	echo 'end: ' .$child_end_current;
}

?>
```
