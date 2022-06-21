<?php

namespace Realodix\CsConfig\Tests\Rules;

use PhpCsFixer\ConfigInterface;
use Realodix\CsConfig\Config;
use Realodix\CsConfig\Rules\RealodixPlus;
use Realodix\CsConfig\Tests\RulesTestCase;

class RealodixPlusTest extends RulesTestCase
{
    protected function rulesClass(): string
    {
        return RealodixPlus::class;
    }

    public function getRulesFromConfig(): ConfigInterface
    {
        return Config::create(new RealodixPlus);
    }
}
