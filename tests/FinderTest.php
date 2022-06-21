<?php

namespace Realodix\CsConfig\Tests;

use PhpCsFixer\Finder as PhpCsFixerFinder;
use PHPUnit\Framework\TestCase;
use Realodix\CsConfig\Finder;

class FinderTest extends TestCase
{
    /**
     * It only includes existing paths
     *
     * @test
     */
    public function itOnlyIncludesExistingPaths(): void
    {
        $testDirs = [
            realpath(__DIR__.'/../src'),
            realpath(__DIR__.'/../tests'),
            realpath(__DIR__.'/../missing-dir-1'),
            realpath(__DIR__.'/../missing-dir-2'),
        ];
        $existingPaths = Finder::onlyExistingPaths($testDirs);

        $this->assertCount(2, $existingPaths);
        $this->assertEquals([
            realpath(__DIR__.'/../src'),
            realpath(__DIR__.'/../tests'),
        ], $existingPaths);
    }

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
