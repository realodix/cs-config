<?php

namespace Realodix\CsConfig\Rules;

final class LaravelRisky extends AbstractRules
{
    /**
     * Inherits Laravel preset
     *
     * @see Realodix\CsConfig\Rules\Laravel
     */
    protected function rules(): array
    {
        $baseRules = (new Laravel)->rules();
        $rules = [
            'self_accessor' => false,

            'no_alias_functions' => true,
            'no_unreachable_default_argument_value' => true,
            'psr_autoloading' => true,
        ];

        return array_merge($baseRules, $rules);
    }
}
