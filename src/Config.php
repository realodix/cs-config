<?php

namespace Realodix\CsConfig;

use PhpCsFixer\ConfigInterface;
use Realodix\CsConfig\Rules\RulesInterface;

class Config
{
    /**
     * @param string|RulesInterface $name
     *
     * @throws \InvalidArgumentException
     */
    public static function create($name, array $localRules = []): ConfigInterface
    {
        if (! $name instanceof RulesInterface && ! is_string($name)) {
            throw new \InvalidArgumentException('$name must be of type string or instanceof Realodix\CsConfig\Rules\RulesInterface');
        }

        $rules = is_string($name) ? self::ruleSets($name) : $name;

        return (new \PhpCsFixer\Config($rules->getName()))
            ->registerCustomFixers(new \PhpCsFixerCustomFixers\Fixers)
            ->registerCustomFixers([
                new Fixers\Laravel\LaravelPhpdocAlignmentFixer,
                new Fixers\Laravel\LaravelPhpdocOrderFixer,
                new Fixers\Laravel\LaravelPhpdocSeparationFixer,
            ])
            ->setRiskyAllowed(true)
            ->setRules(array_merge($rules->getRules(), $localRules));
    }

    private static function ruleSets(string $name): object
    {
        switch ($name) {
            case 'blank':
                return new \Realodix\CsConfig\Rules\Blank;
            case 'realodix':
                return new \Realodix\CsConfig\Rules\Realodix;
            case 'realodix_plus':
                return new \Realodix\CsConfig\Rules\RealodixPlus;
            case 'laravel':
                return new \Realodix\CsConfig\Rules\Laravel;
            case 'laravel_risky':
                return new \Realodix\CsConfig\Rules\LaravelRisky;
            case 'spatie':
                return new \Realodix\CsConfig\Rules\Spatie;
            default:
                return new \Realodix\CsConfig\Rules\Realodix;
        }
    }
}
