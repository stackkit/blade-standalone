# Introduction

This package is a standalone version of Laravel Blade.

## Usage

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
