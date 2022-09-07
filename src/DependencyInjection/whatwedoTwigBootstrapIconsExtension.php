<?php

declare(strict_types=1);

namespace whatwedo\TwigBootstrapIcons\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\PhpFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class whatwedoTwigBootstrapIconsExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new PhpFileLoader($container, new FileLocator(\dirname(__DIR__) . '/Resources/config'));
        $loader->load('config.php');
    }
}
