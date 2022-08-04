<?php

namespace Realodix\CsConfig;

use PhpCsFixer\ConfigInterface;

class Config
{
    public function __construct(string $name = 'realodix')
    {
        $this->name = $name;
    }

    public function create(array $localRules = []): ConfigInterface
    {
        $rules = $this->ruleSets((new self)->name, $localRules);

        return (new \PhpCsFixer\Config($rules->getName()))
            ->registerCustomFixers(new \PhpCsFixerCustomFixers\Fixers)
            ->registerCustomFixers([
                new Fixers\Laravel\LaravelPhpdocAlignmentFixer,
                new Fixers\Laravel\LaravelPhpdocOrderFixer,
                new Fixers\Laravel\LaravelPhpdocSeparationFixer,
            ])
            ->setRiskyAllowed(true)
            ->setRules($rules->getRules());
    }

    private function ruleSets(string $name, array $localRules): object
    {
        switch ($name) {
            case 'realodix':
                return new \Realodix\CsConfig\Rules\Realodix($localRules);
            case 'realodix_plus':
                return new \Realodix\CsConfig\Rules\RealodixPlus($localRules);
            case 'laravel':
                return new \Realodix\CsConfig\Rules\Laravel($localRules);
            case 'laravel_risky':
                return new \Realodix\CsConfig\Rules\LaravelRisky($localRules);
            case 'spatie':
                return new \Realodix\CsConfig\Rules\Spatie($localRules);
            default:
                return new \Realodix\CsConfig\Rules\Realodix($localRules);
        }
    }
}
