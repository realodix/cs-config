<?php

namespace Realodix\CsConfig;

use PhpCsFixer\Finder as PhpCsFixerFinder;

class Finder
{
    public static function onlyExistingPaths(array $paths): array
    {
        return array_filter($paths, function (string $path) {
            return file_exists($path) && is_dir($path);
        });
    }

    public static function base(string $baseDir): PhpCsFixerFinder
    {
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

    public static function laravel(string $baseDir): PhpCsFixerFinder
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
