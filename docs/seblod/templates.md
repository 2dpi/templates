# Templates

### Templates
| Form & Content Type | List & Search |
| --                  | --            |
| item                | list          |

- intro(joomla core category blog)
- item (cck list and search result)

Both intro and item should have same output and can essentially use 1 template. Use an include in the item folder to reduce unnecessay templating.

- leading
- primary
- links

### Layouts

| Form & Content Type | List & Search |
| --                  | --            |
| content             | item          |
| form                | search        |
| intro               | -             |

Lists are regulated by the list template, meaning filters applied like limit, state, category, type etc.

All layouts are handled by the item template. Differences occur in the positions folder by content type and list name.

For example if you have a content type "contact" you would find the layout files here:

app_item > positions > app_contact > content
app_item > positions > app_contact > form
app_item > positions > app_contact > intro

For example if you have a list named "list contacts" you would find the layout files here:

app_item > positions > app_list_contacts > search
app_item > positions > app_list_contacts > item

#### Includes
.



