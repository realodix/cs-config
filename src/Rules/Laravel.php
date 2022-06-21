<?php

namespace Realodix\CsConfig\Rules;

final class Laravel extends AbstractRules
{
    protected function rules(): array
    {
        // Latest commit 2530a97 on Jan 27 2022
        // https://github.com/Jubeki/laravel-code-style/blob/main/src/Config.php
        $baseRule = [
            '@PSR2'                                       => true,
            'align_multiline_comment'                     => ['comment_type' => 'phpdocs_like'],
            'array_indentation'                           => true,
            'array_syntax'                                => true,
            'binary_operator_spaces'                      => ['operators' => ['=>' => null, '=' => 'single_space']],
            'blank_line_after_opening_tag'                => true,
            'blank_line_before_statement'                 => ['statements' => ['return']],
            'cast_spaces'                                 => true,
            'class_attributes_separation'                 => ['elements' => ['method' => 'one']],
            'clean_namespace'                             => true,
            'compact_nullable_typehint'                   => true,
            'concat_space'                                => true,
            'constant_case'                               => true,
            'declare_equal_normalize'                     => true,
            'encoding'                                    => true,
            'full_opening_tag'                            => true,
            'function_typehint_space'                     => true,
            'heredoc_to_nowdoc'                           => true,
            'include'                                     => true,
            'increment_style'                             => ['style' => 'post'],
            'lambda_not_used_import'                      => true,
            'list_syntax'                                 => true,
            'lowercase_cast'                              => true,
            'lowercase_static_reference'                  => true,
            'magic_constant_casing'                       => true,
            'magic_method_casing'                         => true,
            'method_argument_space'                       => ['on_multiline' => 'ignore'],
            'multiline_whitespace_before_semicolons'      => true,
            'native_function_casing'                      => true,
            'native_function_type_declaration_casing'     => true,
            'no_alias_language_construct_call'            => true,
            'no_alternative_syntax'                       => true,
            'no_binary_string'                            => true,
            'no_blank_lines_after_class_opening'          => true,
            'no_blank_lines_after_phpdoc'                 => true,
            'no_empty_phpdoc'                             => true,
            'no_empty_statement'                          => true,
            'no_extra_blank_lines'                        => ['tokens' => ['throw', 'use', 'extra']],
            'no_leading_import_slash'                     => true,
            'no_leading_namespace_whitespace'             => true,
            'no_mixed_echo_print'                         => true,
            'no_multiline_whitespace_around_double_arrow' => true,
            'no_short_bool_cast'                          => true,
            'no_singleline_whitespace_before_semicolons'  => true,
            'no_spaces_around_offset'                     => ['positions' => ['inside']],
            'no_trailing_comma_in_list_call'              => true,
            'no_trailing_comma_in_singleline_array'       => true,
            'no_unneeded_control_parentheses'             => true,
            'no_unneeded_curly_braces'                    => true,
            'no_unset_cast'                               => true,
            'no_unused_imports'                           => true,
            'no_useless_return'                           => true,
            'no_whitespace_before_comma_in_array'         => true,
            'no_whitespace_in_blank_line'                 => true,
            'normalize_index_brace'                       => true,
            'not_operator_with_successor_space'           => true,
            'object_operator_without_whitespace'          => true,
            'ordered_imports'                             => true,
            'phpdoc_indent'                               => true,
            'phpdoc_inline_tag_normalizer'                => true,
            'phpdoc_no_access'                            => true,
            'phpdoc_no_alias_tag'                         => ['replacements' => ['type' => 'var']],
            'phpdoc_no_package'                           => true,
            'phpdoc_no_useless_inheritdoc'                => true,
            'phpdoc_return_self_reference'                => true,
            'phpdoc_scalar'                               => true,
            'phpdoc_single_line_var_spacing'              => true,
            'phpdoc_summary'                              => true,
            'phpdoc_trim'                                 => true,
            'phpdoc_types'                                => true,
            'phpdoc_var_without_name'                     => true,
            'return_type_declaration'                     => true,
            'short_scalar_cast'                           => true,
            'single_blank_line_before_namespace'          => true,
            'single_class_element_per_statement'          => true,
            'single_line_comment_style'                   => ['comment_types' => ['hash']],
            'single_quote'                                => true,
            'space_after_semicolon'                       => true,
            'standardize_not_equals'                      => true,
            'switch_continue_to_break'                    => true,
            'ternary_operator_spaces'                     => true,
            'trailing_comma_in_multiline'                 => true,
            'trim_array_spaces'                           => true,
            'unary_operator_spaces'                       => true,
            'visibility_required'                         => ['elements' => ['method', 'property']],
            'whitespace_after_comma_in_array'             => true,

            'class_definition' => false,
            'braces'           => false,

            // LaravelCodeStyle/...
            'phpdoc_align'      => true,
            'phpdoc_order'      => true,
            'phpdoc_separation' => true,
        ];

        return array_merge($baseRule, $this->compatibilityMode());
    }

    private function compatibilityMode(): array
    {
        $rules = [];

        if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
            $rules = [
                'integer_literal_case' => true,
                'types_spaces'         => true,
            ];
        }

        return $rules;
    }
}
