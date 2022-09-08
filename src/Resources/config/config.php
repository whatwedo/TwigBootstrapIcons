<?php

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

return static function (ContainerConfigurator $container) {
    $container->services()
        ->set('twig.extension.whatwedo_bootstrap_icons', \whatwedo\TwigBootstrapIcons\Twig\BootstrapIconsExtensions::class)
        ->tag('twig.extension');
};
