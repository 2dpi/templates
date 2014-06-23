# Google Analytics #
### Events ###

Easily setup and configure Google Universal Analytics Events and Campaign Variable tracking.

<a href="http://gaconfig.com/" target="_blank">Google Analytics Configuration Tool</a>

<a target="_blank" href="http://www.seerinteractive.com/blog/event-tracking-explained">Event tracking Explained</a>

#### Button Click ####
```javascript
onClick="ga('send', 'event', {
    eventCategory: 'Category',
    eventAction:  'Action',
    eventLabel: 'Label'
});"
```

- Category - ie. button
- Action - ie. clicked
- Label - ie. contact form