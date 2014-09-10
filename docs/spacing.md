# Spacing

In most instances spacing between elements will be unform or symetrical. By defining global defaults some level of consistency can be achieved without cluttering up the DOM and your style sheets.

| padding | margin | increments | orientation | disable |
| -- | -- | -- | -- | -- |
| `.in_*` | `.out_*` | `tight` |`land` | `not_top` |
| -- | -- | `tighter` | `port` | `not_right` |
| -- | -- | `tightest` | `tl` | `not_bottom` |
| -- | -- | `loose` | `tr` | `not_left` |
| -- | -- | `looser` | `br` | -- |
| -- | -- | `loosest` | `bl` | -- |

### Inline / single use

Useful for elements that don't necessarily require unique classes of thier own.

Classes are constructed as follows:

`.in_tight` <small>(all round)</small>

or

`.in_tight_land` <small>(only left and right)</small>

or

`.in_tight_port` <small>(only top and bottom)</small>

### Repetative / multiple use

Adding too many global classes to an element can sometimes be more complicated than using specificity or creating and adding a new unique class to style elements. Examples of such cases would be modules / widgets, list items, panels and sections.


`.widget`

`.module`

`.section`

`.panel`
