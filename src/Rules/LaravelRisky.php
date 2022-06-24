<?php

namespace Realodix\CsConfig\Rules;

final class LaravelRisky extends AbstractRules
{
    protected function rules(): array
    {
        // Latest commit f2720dc on Jun 23, 2022
        // https://github.com/laravel/pint/blob/main/resources/presets/laravel.php
        return array_merge(
            (new Laravel)->rules(),
            [
                'no_alias_functions'                    => true,
                'no_unreachable_default_argument_value' => true,
                'psr_autoloading'                       => true,
                'self_accessor'                         => true,
            ]
        );
    }
}
