# Bootstrap Icons Twig Integration

Twig Integration for [Bootstrap Icons](https://icons.getbootstrap.com/). This bundle is inspred by [marcw/twig-heroicons](https://github.com/marcw/twig-heroicons).

## Installation

```bash
composer require whatwedo/twig-bootstrap-icons
```

### Twig Integration

Just register the extension

```php
$twig->addExtension(new BootstrapIconsExtensions());
```

### Symfony Integration

```php
// bundles.php
return [
    whatwedo\TwigBootstrapIcons\whatwedoTwigBootstrapIconsBundle::class => ['all' => true],
];
```

## Usage

Outputs the SVG
```twig
{{ bootstrap_icon('alarm') }}
```

you can pass an array as second argument to add attributes to the `<svg>`-tag:
```twig
{{ bootstrap_icon('alarm', {
    class: 'text-gray-500 mr-3 h-6 w-6'
    alt: 'alarm clock'
}) }}
```
