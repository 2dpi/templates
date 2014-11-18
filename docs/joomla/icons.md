# Icons

Joomla! core UI.


```CSS
/* ORDERING CAN INFLUENCE OUTPUT SO ADD WOFF AND SVG LAST */
@font-face {
	font-family: 'IcoMoon';
	src: url('/media/jui/fonts/IcoMoon.eot');
	src: url('/media/jui/fonts/IcoMoon.eot?#iefix') format('embedded-opentype'),
		url('/media/jui/fonts/IcoMoon.ttf') format('truetype'),
		url('/media/jui/fonts/IcoMoon.woff') format('woff'),
		url('/media/jui/fonts/IcoMoon.svg#IcoMoon') format('svg');
	font-weight: normal;
	font-style: normal;
}

/*CALL IN SVG FOR BETTER CHROME RENDERING*/
@media screen and (-webkit-min-device-pixel-ratio: 0) {
	@font-face {
		font-family: icomoon;
		src: url('/media/jui/fonts/IcoMoon.svg#IcoMoon') format('svg');
	}
}
```
