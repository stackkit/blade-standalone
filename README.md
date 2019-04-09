# Introduction
> This package is a standalone version of Laravel Blade.

## Usage standalone blade

```php
<?php

use Stackkit\BladeStandalone\Blade;

require 'vendor/autoload.php';

$blade = new Blade(
    __DIR__ . DIRECTORY_SEPARATOR . 'views',
    __DIR__ . DIRECTORY_SEPARATOR . 'cache'
);

$contents = $blade->render('welcome', ['name' => 'John Doe']);

echo $contents;
```

## Docs
Blade is the simple, yet powerful templating engine provided with Laravel. Unlike other popular PHP templating engines, Blade does not restrict you from using plain PHP code in your views. In fact, all Blade views are compiled into plain PHP code and cached until they are modified, meaning Blade adds essentially zero overhead to your application. Blade view files use the  `.blade.php` file extension and are typically stored in the `resources/views` directory.

[Docs](https://laravel.com/docs/5.8/blade)
