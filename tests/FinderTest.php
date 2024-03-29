<?php

namespace Realodix\CsConfig\Tests;

use PhpCsFixer\Finder as PhpCsFixerFinder;
use PHPUnit\Framework\TestCase;
use Realodix\CsConfig\Finder;

class FinderTest extends TestCase
{
    /**
     * It returns a PHP CS Fixer finder object
     *
     * @test
     */
    public function baseFinderMustReturnsAPhpCsFinderObject(): void
    {
        $finder = Finder::base(__DIR__);

        $this->assertInstanceOf(PhpCsFixerFinder::class, $finder);
    }

    /**
     * It returns a PHP CS Fixer finder object
     *
     * @test
     */
    public function laravelFinderMustReturnsAPhpCsFinderObject(): void
    {
        $finder = Finder::laravel(__DIR__.'/../..');

        $this->assertInstanceOf(PhpCsFixerFinder::class, $finder);
    }
}
