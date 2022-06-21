<?php

namespace Realodix\CsConfig\Rules;

final class LaravelRisky extends AbstractRules
{
    protected function rules(): array
    {
        // Latest commit 2530a97 on Jan 27 2022
        // https://github.com/Jubeki/laravel-code-style/blob/main/src/Config.php
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
