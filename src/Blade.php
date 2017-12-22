<?php

namespace Stackkit\BladeStandalone;

use Illuminate\Events\Dispatcher;
use Illuminate\Filesystem\Filesystem;
use Illuminate\View\Compilers\BladeCompiler;
use Illuminate\View\Engines\CompilerEngine;
use Illuminate\View\Engines\EngineResolver;
use Illuminate\View\Factory;
use Illuminate\View\FileViewFinder;

class Blade
{
    private $factory;

    function __construct($viewsDir, $cacheDir)
    {
        $resolver = new EngineResolver;

        $resolver->register('blade', function () use ($viewsDir, $cacheDir) {
            return new CompilerEngine(new BladeCompiler(new Filesystem(), $cacheDir));
        });

        $this->factory = new Factory($resolver, new FileViewFinder(new Filesystem(), [$viewsDir]), new Dispatcher());
    }

    function render($view, $variables = [])
    {
        return $this->factory->make($view, $variables)->render();
    }
}
