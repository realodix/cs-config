<?php

namespace Realodix\CsConfig\Rules;

use Realodix\CsConfig\Helper\Helper;

abstract class AbstractRules implements RulesInterface
{
    protected string $name = '';

    abstract protected function rules(): array;

    public function getName(): string
    {
        if ($this->name !== '') {
            return $this->name;
        }

        return Helper::classBasename($this).' CS';
    }

    public function getRules(): array
    {
        return array_merge($this->rules());
    }
}
