<?php

namespace Realodix\CsConfig;

use PhpCsFixer\ConfigInterface;
use Realodix\CsConfig\Rules\RulesInterface;

class Config
{
    public static function create(RulesInterface $rules): ConfigInterface
    {
        return (new \PhpCsFixer\Config($rules->getName()))
                ->registerCustomFixers(new \PhpCsFixerCustomFixers\Fixers)
                ->setRiskyAllowed(true)
                ->setRules($rules->getRules());
    }
}
