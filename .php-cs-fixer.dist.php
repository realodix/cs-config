<?php

use Realodix\CsConfig\Config;
use Realodix\CsConfig\Finder;
use Realodix\CsConfig\Rules\Realodix;

$localRules = [
    // ...
];

$finder = Finder::base()
    ->append(['.php-cs-fixer.dist.php']);

return Config::create(new Realodix($localRules))
    ->setFinder($finder);
