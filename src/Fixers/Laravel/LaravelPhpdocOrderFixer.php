<?php

namespace Realodix\CsConfig\Fixers\Laravel;

use PhpCsFixer\DocBlock\DocBlock;
use PhpCsFixer\Fixer\FixerInterface;
use PhpCsFixer\FixerDefinition\FixerDefinition;
use PhpCsFixer\FixerDefinition\FixerDefinitionInterface;
use PhpCsFixer\Tokenizer\Token;
use PhpCsFixer\Tokenizer\Tokens;

final class LaravelPhpdocOrderFixer implements FixerInterface
{
    public function getName(): string
    {
        return 'Laravel/laravel_phpdoc_order';
    }

    public function getDefinition(): FixerDefinitionInterface
    {
        return new FixerDefinition(
            'Annotations must respect the following order: @param, @return, and @throws.',
            []
        );
    }

    public function getPriority(): int
    {
        return -2;
    }

    public function isRisky(): bool
    {
        return false;
    }

    public function isCandidate(Tokens $tokens): bool
    {
        return $tokens->isTokenKindFound(T_DOC_COMMENT);
    }

    public function fix(\SplFileInfo $file, Tokens $tokens): void
    {
        foreach ($tokens as $index => $token) {
            if (! $token->isGivenKind(T_DOC_COMMENT)) {
                continue;
            }

            $content = $token->getContent();
            $content = $this->moveParamAnnotations($content);
            $content = $this->moveThrowsAnnotations($content);
            $tokens[$index] = new Token([T_DOC_COMMENT, $content]);
        }
    }

    /**
     * Moves to the @params annotations on the given content.
     *
     * @param  string  $content
     * @return string
     */
    private function moveParamAnnotations($content)
    {
        $doc = new DocBlock($content);

        if (empty($params = $doc->getAnnotationsOfType('param'))) {
            return $content;
        }

        if (empty($others = $doc->getAnnotationsOfType(['throws', 'return']))) {
            return $content;
        }

        $end = end($params)->getEnd();

        $line = $doc->getLine($end);

        foreach ($others as $other) {
            if ($other->getStart() < $end) {
                $line->setContent($line->getContent().$other->getContent());
                $other->remove();
            }
        }

        return $doc->getContent();
    }

    /**
     * Moves to the @throws annotations on the given content.
     *
     * @param  string  $content
     * @return string
     */
    private function moveThrowsAnnotations($content)
    {
        $doc = new DocBlock($content);

        if (empty($throws = $doc->getAnnotationsOfType('throws'))) {
            return $content;
        }

        if (empty($others = $doc->getAnnotationsOfType(['param', 'return']))) {
            return $content;
        }

        $start = $throws[0]->getStart();
        $line = $doc->getLine($start);

        foreach (array_reverse($others) as $other) {
            if ($other->getEnd() > $start) {
                $line->setContent($other->getContent().$line->getContent());
                $other->remove();
            }
        }

        return $doc->getContent();
    }

    public function supports(\SplFileInfo $file): bool
    {
        return true;
    }
}
