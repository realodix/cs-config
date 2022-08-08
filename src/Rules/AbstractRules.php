<?php

namespace Realodix\CsConfig\Rules;

use Realodix\CsConfig\Helper;

abstract class AbstractRules implements RulesInterface
{
    private $localRules = [];

    abstract protected function rules(): array;

    public function __construct(array $localRules = [])
    {
        $this->localRules = $localRules;
    }

    public function getName(): string
    {
        if (isset($this->name)) {
            if (! is_string($this->name)) {
                throw new \Exception(get_class($this).'::$name must be string. Got: '.gettype($this->name));
            }

            return $this->name;
        }

        return Helper::classBasename($this).' CS';
    }

    public function getRules(): array
    {
        return array_merge($this->rules(), $this->localRules);
    }
}
