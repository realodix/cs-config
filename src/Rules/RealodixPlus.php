<?php

namespace Realodix\CsConfig\Rules;

use PhpCsFixerCustomFixers\Fixer;

final class RealodixPlus extends AbstractRules
{
    /**
     * Inherits Realodix preset
     *
     * @see Realodix\CsConfig\Rules\Realodix
     */
    protected function rules(): array
    {
        $baseRules = (new Realodix)->rules();

        $rules = [
            'explicit_string_variable' => true,
            'no_superfluous_elseif' => true,
            'general_phpdoc_annotation_remove' => [
                'annotations' => [
                    // https://github.com/doctrine/coding-standard/blob/f86c16aedb/lib/Doctrine/Rules.xml#L192
                    'api', 'author', 'category', 'copyright', 'created', 'license', 'package', 'since',
                    'subpackage', 'version',
                    // https://github.com/laminas/laminas-coding-standard/blob/22068e0b91/src/LaminasCodingStandard/Rules.xml#L883
                    'expectedException', 'expectedExceptionCode', 'expectedExceptionMessage', 'expectedExceptionMessageRegExp',
                ],
            ],

            Fixer\NoUselessCommentFixer::name() => true,
        ];

        return array_merge($baseRules, $rules);
    }
}
