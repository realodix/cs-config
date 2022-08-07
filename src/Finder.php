<?php

namespace Realodix\CsConfig;

use PhpCsFixer\Finder as PhpCsFixerFinder;

class Finder
{
    public static function base(string $baseDir = null): PhpCsFixerFinder
    {
        if (is_null($baseDir)) {
            $baseDir = getcwd();
        }

        return PhpCsFixerFinder::create()
            ->in($baseDir)
            ->ignoreVCS(true)
            ->ignoreDotFiles(true)
            ->notName([
                '_ide_helper_actions.php',
                '_ide_helper_models.php',
                '_ide_helper.php',
                '.phpstorm.meta.php',
            ]);
    }

    public static function laravel(string $baseDir = null): PhpCsFixerFinder
    {
        return self::base($baseDir)
            ->exclude([
                'bootstrap/cache',
                'public',
                'resources',
                'storage',
                'node_modules',
            ])
            ->notName('*.blade.php');
    }
}
