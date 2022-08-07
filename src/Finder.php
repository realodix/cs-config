<?php

namespace Realodix\CsConfig;

use PhpCsFixer\Finder as PhpCsFixerFinder;

class Finder
{
    /**
     * @param string|array $dir
     */
    public static function base($dir = null): PhpCsFixerFinder
    {
        if (is_null($dir)) {
            $dir = getcwd();
        }

        return PhpCsFixerFinder::create()
            ->in($dir)
            ->ignoreVCS(true)
            ->ignoreDotFiles(true)
            ->notName([
                '_ide_helper_actions.php',
                '_ide_helper_models.php',
                '_ide_helper.php',
                '.phpstorm.meta.php',
            ]);
    }

    /**
     * @param string|array $dir
     */
    public static function laravel($dir = null): PhpCsFixerFinder
    {
        return self::base($dir)
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
