<?php

namespace Realodix\CsConfig\Fixers\Laravel;

use PhpCsFixer\DocBlock\TypeExpression;
use PhpCsFixer\Fixer\FixerInterface;
use PhpCsFixer\FixerDefinition\FixerDefinition;
use PhpCsFixer\FixerDefinition\FixerDefinitionInterface;
use PhpCsFixer\Tokenizer\Token;
use PhpCsFixer\Tokenizer\Tokens;

class LaravelPhpdocAlignmentFixer implements FixerInterface
{
    public function getName(): string
    {
        return 'Laravel/laravel_phpdoc_alignment';
    }

    public function getDefinition(): FixerDefinitionInterface
    {
        return new FixerDefinition(
            '@param and type definition must be followed by two spaces.',
            []
        );
    }

    public function getPriority(): int
    {
        return -42;
    }

    public function isRisky(): bool
    {
        return false;
    }

    public function isCandidate(Tokens $tokens): bool
    {
        return $tokens->isAnyTokenKindsFound([T_DOC_COMMENT]);
    }

    public function fix(\SplFileInfo $file, Tokens $tokens): void
    {
        for ($index = $tokens->count() - 1; $index > 0; $index--) {
            if (! $tokens[$index]->isGivenKind([\T_DOC_COMMENT])) {
                continue;
            }

            $newContent = preg_replace_callback(
                '/(?P<tag>@param)\s+(?P<hint>(?:'.TypeExpression::REGEX_TYPES.')?)\s+(?P<var>(?:&|\.{3})?\$\S+)/ux',
                fn ($matches) => $matches['tag'].'  '.$matches['hint'].'  '.$matches['var'],
                $tokens[$index]->getContent()
            );

            if ($newContent == $tokens[$index]->getContent()) {
                continue;
            }

            $tokens[$index] = new Token([T_DOC_COMMENT, $newContent]);
        }
    }

    public function supports(\SplFileInfo $file): bool
    {
        return true;
    }
}
