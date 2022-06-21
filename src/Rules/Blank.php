<?php

namespace Realodix\CsConfig\Rules;

/** @codeCoverageIgnore */
final class Blank extends AbstractRules
{
    public string $name = 'Personal CS';

    protected function rules(): array
    {
        return [];
    }
}
