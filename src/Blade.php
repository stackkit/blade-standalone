<?php

namespace Stackkit\BladeStandalone;

use Illuminate\Container\Container;
use Illuminate\Events\Dispatcher;
use Illuminate\Filesystem\Filesystem;
use Illuminate\View\Compilers\BladeCompiler;
use Illuminate\View\Engines\CompilerEngine;
use Illuminate\View\Engines\EngineResolver;
use Illuminate\View\Engines\PhpEngine;
use Illuminate\View\Factory;
use Illuminate\View\FileViewFinder;

class Blade
{
    private $factory;

    function __construct($pathsToTemplates, $pathToCompiledTemplates)
    {
        $filesystem = new Filesystem;
        $eventDispatcher = new Dispatcher(new Container);

        $viewResolver = new EngineResolver;
        $bladeCompiler = new BladeCompiler($filesystem, $pathToCompiledTemplates);

        $viewResolver->register('blade', function () use ($bladeCompiler) {
            return new CompilerEngine($bladeCompiler);
        });

        $viewResolver->register('php', function () {
            return new PhpEngine;
        });

        $viewFinder = new FileViewFinder($filesystem, $pathsToTemplates);
        $this->factory = new Factory($viewResolver, $viewFinder, $eventDispatcher);
    }

    function render($view, $variables = [])
    {
        return $this->factory->make($view, $variables)->render();
    }
}
