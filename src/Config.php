<?php

namespace Realodix\CsConfig;

use PhpCsFixer\ConfigInterface;
use Realodix\CsConfig\Rules\RulesInterface;

class Config
{
    /**
     * @param string|RulesInterface $ruleSet
     *
     * @throws \InvalidArgumentException
     */
    public static function create($ruleSet, array $localRules = []): ConfigInterface
    {
        if (! is_string($ruleSet) && ! $ruleSet instanceof RulesInterface) {
            throw new \InvalidArgumentException(sprintf(
                '%s(): Argument #1 ($ruleSet) must be of type %s, %s given',
                __METHOD__,
                'string|RulesInterface',
                gettype($ruleSet)
            ));
        }

        if (is_string($ruleSet)) {
            $ruleSet = self::ruleSet($ruleSet);
        }

        return (new \PhpCsFixer\Config($ruleSet->getName()))
            ->registerCustomFixers(new \PhpCsFixerCustomFixers\Fixers)
            ->registerCustomFixers([
                new Fixers\Laravel\LaravelPhpdocAlignmentFixer,
                new Fixers\Laravel\LaravelPhpdocOrderFixer,
                new Fixers\Laravel\LaravelPhpdocSeparationFixer,
            ])
            ->setRiskyAllowed(true)
            ->setRules(array_merge($ruleSet->getRules(), $localRules))
            ->setFinder(Finder::base());
    }

    /**
     * @throws \Exception
     */
    private static function ruleSet(string $name): object
    {
        switch ($name) {
            case 'blank':
                return new \Realodix\CsConfig\Rules\Blank;
            case 'realodix':
                return new \Realodix\CsConfig\Rules\Realodix;
            case 'laravel':
                return new \Realodix\CsConfig\Rules\Laravel;
            case 'spatie':
                return new \Realodix\CsConfig\Rules\Spatie;
            default:
                throw new \Exception('Unknown rule set.');
        }
    }
}
