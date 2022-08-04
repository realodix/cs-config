<?php

use Realodix\CsConfig\Config;
use Realodix\CsConfig\Finder;
use Realodix\CsConfig\Rules\Realodix;

$overrides = [
    // ...
];

$finder = Finder::base(__DIR__)
    ->append(['.php-cs-fixer.dist.php']);

return Config::create(new Realodix($overrides))
    ->setFinder($finder);
