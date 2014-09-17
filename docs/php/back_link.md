# Back link

See if there is a referring URL

```php
if (isset($_SERVER['HTTP_REFERER'])) {
    // get reffering url
    $refurl = htmlspecialchars($_SERVER['HTTP_REFERER']);
}
```

```php
<?php if (isset($refurl)) { ?>
    <?php echo '<a class="btn" href="'.$refurl.'">back</a>';?>
<?php } ?>
```
