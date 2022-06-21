<?php

namespace Realodix\CsConfig\Rules;

use PhpCsFixerCustomFixers\Fixer;

final class Realodix extends AbstractRules
{
    protected function rules(): array
    {
        $baseRules = (new Laravel)->rules();

        $rules = [
            /*
             * Modify
             */
            'phpdoc_summary'          => false,
            'ternary_operator_spaces' => false,
            'unary_operator_spaces'   => false,
            'binary_operator_spaces'  => ['operators' => ['=>' => 'single_space']],
            'class_definition'        => true,

            /*
             * Addition
             */
            'combine_consecutive_unsets'                    => true,
            'fully_qualified_strict_types'                  => true,
            'no_empty_comment'                              => true,
            'no_useless_else'                               => true,
            'php_unit_method_casing'                        => true,
            'phpdoc_annotation_without_dot'                 => true,
            'phpdoc_to_comment'                             => true,
            'phpdoc_trim_consecutive_blank_line_separation' => true,
            'phpdoc_var_annotation_correct_order'           => true,

            'phpdoc_align' => [
                // align_phpdoc
                'tags' => [
                    'param',
                    'throws', 'type', 'var',
                    // 'return',
                ],
            ],

            Fixer\CommentSurroundedBySpacesFixer::name()           => true,
            Fixer\MultilineCommentOpeningClosingAloneFixer::name() => true,
            Fixer\NoDuplicatedImportsFixer::name()                 => true,
            Fixer\PhpdocNoIncorrectVarAnnotationFixer::name()      => true,
            Fixer\PhpdocParamOrderFixer::name()                    => true,
            Fixer\PhpdocParamTypeFixer::name()                     => true,
            Fixer\PhpdocSelfAccessorFixer::name()                  => true,
            Fixer\PhpdocTypesTrimFixer::name()                     => true,
        ];

        return array_merge($baseRules, $rules, $this->compatibilityMode());
    }

    private function compatibilityMode(): array
    {
        $php74 = [];
        $php73 = [];
        $php72 = [];

        if (version_compare(PHP_VERSION, '7.4.0', '>=')) {
            $php74 = [
                // Addition
                'class_reference_name_casing'                   => true,
                'new_with_braces'                               => ['named_class' => false],
                'no_trailing_comma_in_singleline_function_call' => true,
                'no_unneeded_import_alias'                      => true,
                'single_line_comment_spacing'                   => true,
                Fixer\PhpdocTypesCommaSpacesFixer::name()       => true,
            ];
        }

        if (version_compare(PHP_VERSION, '7.3.0', '>=')) {
            $php73 = [
                // Modify
                'method_argument_space' => ['after_heredoc' => true],
            ];
        }

        if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
            $php72 = [
                // Custom
                Fixer\NoDuplicatedArrayKeyFixer::name() => true,
                Fixer\NoUselessParenthesisFixer::name() => true,
            ];
        }

        return array_merge($php74, $php73, $php72);
    }
}
