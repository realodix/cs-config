<?php

namespace Realodix\CsConfig\Rules;

final class Spatie extends AbstractRules
{
    protected function rules(): array
    {
        // Latest commit 27a7ad7 on Sep 7, 2021
        // https://github.com/spatie/laravel-permission/blob/main/.php_cs.dist.php
        return [
            '@PSR12' => true,
            'array_syntax' => ['syntax' => 'short'],
            'binary_operator_spaces' => true,
            'blank_line_before_statement' => ['statements' => ['break', 'continue', 'declare', 'return', 'throw', 'try']],
            'class_attributes_separation' => ['elements' => ['method' => 'one']],
            'method_argument_space' => ['on_multiline' => 'ensure_fully_multiline', 'keep_multiple_spaces_after_comma' => true],
            'no_unused_imports' => true,
            'not_operator_with_successor_space' => true,
            'ordered_imports' => ['sort_algorithm' => 'alpha'],
            'phpdoc_scalar' => true,
            'phpdoc_single_line_var_spacing' => true,
            'phpdoc_var_without_name' => true,
            'single_trait_insert_per_statement' => true,
            'trailing_comma_in_multiline' => true,
            'unary_operator_spaces' => true,
        ];
    }
}
