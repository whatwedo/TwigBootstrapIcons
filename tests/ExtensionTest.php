<?php

declare(strict_types=1);

namespace whatwedo\TwigBootstrapIcons\Tests;


use PHPUnit\Framework\TestCase;
use whatwedo\TwigBootstrapIcons\Twig\BootstrapIconsExtensions;

class ExtensionTest extends TestCase
{

    public function testIcon()
    {
        $extension = new BootstrapIconsExtensions();

        $this->assertStringContainsString('<svg', $extension->getIcon('eye'));
    }

    public function testClass()
    {
        $extension = new BootstrapIconsExtensions();

        $this->assertStringContainsString('class="test"', $extension->getIcon('eye', ['class' => 'test']));
    }

    public function testNotFound()
    {
        $extension = new BootstrapIconsExtensions();
        $this->expectException(\RuntimeException::class);

         $extension->getIcon('not-fournd');
    }
}
