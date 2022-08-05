<?php

use Realodix\CsConfig\Config;
use Realodix\CsConfig\Finder;

$overrides = [
    // ...
];

$finder = Finder::base(__DIR__)
    ->append(['.php-cs-fixer.dist.php']);

return Config::create('realodix', $overrides)
    ->setFinder($finder);
