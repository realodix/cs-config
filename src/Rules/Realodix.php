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
            'method_argument_space'   => ['after_heredoc' => true],

            /*
             * Addition
             */
            'class_reference_name_casing'                   => true,
            'combine_consecutive_unsets'                    => true,
            'fully_qualified_strict_types'                  => true,
            'new_with_braces'                               => ['named_class' => false],
            'no_empty_comment'                              => true,
            'no_trailing_comma_in_singleline_function_call' => true,
            'no_unneeded_import_alias'                      => true,
            'no_useless_else'                               => true,
            'php_unit_method_casing'                        => true,
            'phpdoc_annotation_without_dot'                 => true,
            'phpdoc_to_comment'                             => true,
            'phpdoc_trim_consecutive_blank_line_separation' => true,
            'phpdoc_var_annotation_correct_order'           => true,
            'single_line_comment_spacing'                   => true,

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
            Fixer\NoDuplicatedArrayKeyFixer::name()                => true,
            Fixer\NoDuplicatedImportsFixer::name()                 => true,
            Fixer\NoUselessParenthesisFixer::name()                => true,
            Fixer\PhpdocNoIncorrectVarAnnotationFixer::name()      => true,
            Fixer\PhpdocParamOrderFixer::name()                    => true,
            Fixer\PhpdocParamTypeFixer::name()                     => true,
            Fixer\PhpdocSelfAccessorFixer::name()                  => true,
            Fixer\PhpdocTypesCommaSpacesFixer::name()              => true,
            Fixer\PhpdocTypesTrimFixer::name()                     => true,
        ];

        return array_merge($baseRules, $rules);
    }
}
