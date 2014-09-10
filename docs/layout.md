# Layout

Focus on identifying where variations occur in layouts and how to harness global styles without having to override pre-defined styles.

Some examples of this would be image or title handling. A list view would more than likely use smaller images, titles and trimmed text in comparison to a detailed view.

###Solution 1

use unique classes for each view

`.item_title` `.author_title` `.cat_title`

or

`.item_image` `.author_image` `.cat_image`

###Solution 2

use specificity by referencing a unique parent class or element.

`.item > img` `.author > img` `.cat > img`

This would be a better option as layouts can vary significantly
