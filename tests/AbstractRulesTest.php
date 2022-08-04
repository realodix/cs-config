<?php

namespace Realodix\CsConfig\Tests;

use PHPUnit\Framework\TestCase;
use Realodix\CsConfig\Helper\Helper;
use Realodix\CsConfig\Rules\AbstractRules;

class AbstractRulesTest extends TestCase
{
    private function nameCleanup($value)
    {
        return preg_replace('/\s[a-zA-Z0-9]+$/', '', $value);
    }

    public function testGetDefaultNameRules(): void
    {
        $actual = $this->nameCleanup((new DefaultName)->getName());
        $expected = Helper::classBasename(new DefaultName);

        $this->assertSame($expected, $actual);
    }

    public function testGetCustomNameRules(): void
    {
        $actual = (new CustomName)->getName();
        $expected = (new CustomName)->name;

        $this->assertSame($expected, $actual);
    }
}

final class DefaultName extends AbstractRules
{
    protected function rules(): array
    {
        return [];
    }
}

final class CustomName extends AbstractRules
{
    public $name = 'Personal CS';

    protected function rules(): array
    {
        return [];
    }
}
