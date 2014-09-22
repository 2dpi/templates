# SimpleImage Class

Generate images on the fly in Joomla content.

Files on [Github](https://github.com/claviska/SimpleImage) with some usage code examples.

```php

include_once(JURI::root(true).'templates/www/libraries/plugins/SimpleImage.class.php');


if($imagePrimary != '') {
    $filename = explode('/', $imagePrimary);
    //print_r($filename[0].' '.$filename[1].' '.$filename[2].' '.$filename[3].' '.$filename[4]);
    try {
        $img = new SimpleImage();
        $imageWidth  = 120;
        $imageHeight = 90;
        // Resize
        $img->load($imagePrimary)->fit_to_width($imageWidth)->crop(0, $imageHeight, $imageWidth, 0)->save($filename[0].'/'.$filename[1].'/'.$filename[2].'/'.$filename[3].'/aspect_'.$filename[4]);
        //$img->load($imagePrimary)->fit_to_width($imageWidth)->crop(0, $imageHeight, $imageWidth, 0)->save($filename[0].'/'.$filename[1].'/'.$filename[2].'/'.$filename[3].'/s_'.$filename[4]);
        //$img->load(JURI::root(true).$imagePrimary)->fit_to_width($imageWidth)->crop(0, $imageHeight, $imageWidth, 0)->output();
        //$img->flip('x')->output();
    } catch(Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
```

Build a plugin to handle parsing of params in a short code and keep library out of templates directory.
