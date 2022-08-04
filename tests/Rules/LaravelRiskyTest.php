<?php

namespace Realodix\CsConfig\Tests\Rules;

use PhpCsFixer\ConfigInterface;
use Realodix\CsConfig\Config;
use Realodix\CsConfig\Rules\LaravelRisky;
use Realodix\CsConfig\Tests\RulesTestCase;

class LaravelRiskyTest extends RulesTestCase
{
    protected function rulesClass(): string
    {
        return LaravelRisky::class;
    }

    protected function rulesFromConfig(): ConfigInterface
    {
        return (new Config('laravel_risky'))->create();
    }
}
