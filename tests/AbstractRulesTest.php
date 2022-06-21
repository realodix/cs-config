<?php

namespace Realodix\CsConfig\Tests;

use PHPUnit\Framework\TestCase;
use Realodix\CsConfig\Helper\ClassHelper;
use Realodix\CsConfig\Rules\AbstractRules;

class AbstractRulesTest extends TestCase
{
    public function testGetDefaultNameRules(): void
    {
        $actual = (new DefaultName)->getName();
        $expected = ClassHelper::classBasename(new DefaultName).' CS';

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
