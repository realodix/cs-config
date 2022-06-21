<?php

namespace Realodix\CsConfig\Rules;

/** @codeCoverageIgnore */
final class Blank extends AbstractRules
{
    /** @var string */
    public $name = 'Personal CS';

    protected function rules(): array
    {
        return [];
    }
}
