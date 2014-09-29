# Related Article

### SEBLOD - ADDING RELATED ARTICLE FIELDS TO SEARCH

Based on info found in this [blog post](http://www.seblod.com/support/forum/Content-Types--Forms/29682-SOLVED-Relate-product-to-manufacturer-be-able-to-search-products-by-manufacturers-fields.html#29784)

#### CCK (* required core field)
1. Variation = Hidden
2. Live = Default | Live value = yourContentType (for related article)
3. Match = Exact
4. Stage = 1st

#### Related article field (include field to search from related article)
1. Variation = Form
2. Match = Exact
3. Stage = 1st

#### CCK (2) (* required core field)
1. Variation = Hidden
2. Live = Default | Live value = yourContentType (for primary search)
3. Match = Exact
4. Stage = Final

#### Related article field (actual related article field)
1. Variation = Hidden
2. Live = Stage | Live value = 1
3. Match = Any Word Exact (NB! might not work otherwise)
4. Stage = Final
