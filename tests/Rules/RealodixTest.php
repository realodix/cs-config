<?php

namespace Realodix\CsConfig\Tests\Rules;

use PhpCsFixer\ConfigInterface;
use Realodix\CsConfig\Config;
use Realodix\CsConfig\Rules\Realodix;
use Realodix\CsConfig\Tests\RulesTestCase;

class RealodixTest extends RulesTestCase
{
    protected function rulesClass(): string
    {
        return Realodix::class;
    }

    public function getRulesFromConfig(): ConfigInterface
    {
        return (new Config)->create();
    }
}
