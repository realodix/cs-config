<?php

namespace Realodix\CsConfig;

use PhpCsFixer\ConfigInterface;
use Realodix\CsConfig\Rules\RulesInterface;

class Config
{
    public static function create(RulesInterface $ruleSet): ConfigInterface
    {
        return (new \PhpCsFixer\Config($ruleSet->getName()))
            ->registerCustomFixers(new \PhpCsFixerCustomFixers\Fixers)
            ->registerCustomFixers([
                new Fixers\Laravel\LaravelPhpdocAlignmentFixer,
                new Fixers\Laravel\LaravelPhpdocOrderFixer,
                new Fixers\Laravel\LaravelPhpdocSeparationFixer,
            ])
            ->setRiskyAllowed(true)
            ->setRules($ruleSet->getRules())
            ->setFinder(Finder::base());
    }
}
