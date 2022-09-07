<?php
declare(strict_types=1);

namespace whatwedo\TwigBootstrapIcons\Twig;

use Composer\Autoload\ClassLoader;
use RuntimeException;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class BootstrapIconsExtensions extends AbstractExtension
{
    static ?string $iconsPath = null;

    /**
     * @return TwigFunction[]
     */
    public function getFunctions()
    {
        return [
            new TwigFunction('bootstrap_icon', [$this, 'getIcon'], ['is_safe' => ['html']]),
        ];
    }

    public function getIcon(string $icon, array $attributes = [])
    {
        $iconPath = sprintf('%s/icons/%s.svg', $this->getIconsPath(), $icon);

        if (!is_file($iconPath)) {
            throw new RuntimeException(sprintf('Icon "%s" not found.', $icon));
        }

        array_walk($attributes, static function(&$val, $key) { $val = $key . '="' . $val . '" '; });

        return str_replace(
            '<svg ',
            '<svg '.implode(' ', $attributes),
            preg_replace('/class=".*?"/', '', file_get_contents($iconPath))
        );
    }

    protected function getIconsPath(): string
    {
        if (static::$iconsPath) {
            return static::$iconsPath;
        }

        foreach (ClassLoader::getRegisteredLoaders() as $vendorDir => $loader) {
            $installed = require $vendorDir . '/composer/installed.php';
            if (isset($installed['versions']['twbs/bootstrap-icons'])) {
                return static::$iconsPath = $vendorDir . '/twbs/bootstrap-icons';
            }
        }

        throw new RuntimeException('twbs/bootstrap-icons is not installed');
    }
}