<?php

namespace Realodix\CsConfig\Tests\Rules;

use PhpCsFixer\ConfigInterface;
use Realodix\CsConfig\Config;
use Realodix\CsConfig\Rules\Laravel;
use Realodix\CsConfig\Tests\RulesTestCase;

class LaravelTest extends RulesTestCase
{
    protected function rulesClass(): string
    {
        return Laravel::class;
    }

    public function getRulesFromConfig(): ConfigInterface
    {
        return (new Config('laravel'))->create();
    }
}
