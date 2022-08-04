<?php

namespace Realodix\CsConfig\Tests\Rules;

use PhpCsFixer\ConfigInterface;
use Realodix\CsConfig\Config;
use Realodix\CsConfig\Rules\Spatie;
use Realodix\CsConfig\Tests\RulesTestCase;

class SpatieTest extends RulesTestCase
{
    protected function rulesClass(): string
    {
        return Spatie::class;
    }

    public function getRulesFromConfig(): ConfigInterface
    {
        return Config::create(new Spatie);
    }
}
