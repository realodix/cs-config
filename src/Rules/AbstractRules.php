<?php

namespace Realodix\CsConfig\Rules;

use Realodix\CsConfig\Helper\ClassHelper;

abstract class AbstractRules implements RulesInterface
{
    protected array $additional = [];

    protected string $name = '';

    abstract protected function rules(): array;

    public function __construct(array $additional = [])
    {
        $this->additional = $additional;
    }

    public function getName(): string
    {
        if ($this->name !== '') {
            return $this->name;
        }

        return ClassHelper::classBasename($this).' CS';
    }

    public function getRules(): array
    {
        return array_merge($this->rules(), $this->additional);
    }
}
