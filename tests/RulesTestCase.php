<?php

namespace Realodix\CsConfig\Tests;

use PhpCsFixer\FixerFactory;
use PhpCsFixer\RuleSet\RuleSet;
use PHPUnit\Framework\TestCase;
use Realodix\CsConfig\Rules\RulesInterface;

/**
 * Base `TestCase` class for `Rules` unit tests, because all tests are identical except
 * for the `Rules` class being tested.
 */
abstract class RulesTestCase extends TestCase
{
    abstract protected function rulesClass(): string;

    protected function getRulesClass(array $args = [])
    {
        $class = $this->rulesClass();

        return new $class($args);
    }

    /**
     * Remove PHP-CS-Fixer rule sets (@...) and custom fixer
     */
    protected function getCleanedRules(): array
    {
        $rules = $this->getRulesClass()->getRules();

        foreach ($rules as $key => $value) {
            if (preg_match('/^(@|[a-zA-Z0-9]+\/)/', $key)) {
                unset($rules[$key]);
            }
        }

        return $rules;
    }

    protected function getRulesFromConfig()
    {
        return $this->rulesFromConfig();
    }

    /**
     * It implements the rules contract
     *
     * @test
     */
    public function itImplementsTheRulesContract(): void
    {
        $rules = $this->getRulesClass();

        $this->assertInstanceOf(RulesInterface::class, $rules);
    }

    /**
     * It implements the rules is config interface
     *
     * @test
     */
    public function itImplementsTheRulesIsConfigInterface(): void
    {
        $rules = $this->getRulesFromConfig();

        $this->assertInstanceOf(\PhpCsFixer\ConfigInterface::class, $rules);
    }

    /**
     * It implements only interface methods
     *
     * @test
     */
    public function itImplementsOnlyInterfaceMethods(): void
    {
        $reflect = new \ReflectionClass($this->getRulesClass());
        $this->assertCount(1, $reflect->getMethods(\ReflectionMethod::IS_PROTECTED));
        $this->assertCount(3, $reflect->getMethods(\ReflectionMethod::IS_PUBLIC));
    }

    /**
     * It returns a valid name
     *
     * @test
     */
    public function itReturnsAValidName(): void
    {
        $rules = $this->getRulesClass();

        $this->assertIsString($rules->getName());
    }

    /**
     * It returns valid rules
     *
     * @test
     */
    public function itReturnsValidRules(): void
    {
        $rules = $this->getRulesClass();

        $this->assertIsArray($rules->getRules());
        $this->assertNotEmpty($rules->getRules());
    }

    /**
     * It merges additional rules
     *
     * @test
     */
    public function itMergesAdditionalRules(): void
    {
        $baseRules = $this->getRulesClass()->getRules();

        $rules = $this->getRulesClass(['foo' => 'bar'])
                    ->getRules();

        $this->assertIsArray($rules);
        $this->assertCount(count($baseRules) + 1, $rules);
        $this->assertArrayHasKey('foo', $rules);
        $this->assertSame('bar', $rules['foo']);
    }

    /** @test */
    public function itValidPhpCsFIxerRules(): void
    {
        $rules = $this->getCleanedRules();
        $factory = (new FixerFactory)
            ->registerBuiltInFixers()
            ->useRuleSet(new RuleSet($rules));

        $this->assertIsArray($factory->getFixers());
    }

    /* @test */
    // public function itValidPhpCsFIxerRulesName(): void
    // {
    //     $fixerFactory = new FixerFactory;
    //     $fixerFactory->registerBuiltInFixers();

    //     $configuredFixers = array_keys($this->getCleanedRules());
    //     $availableFixers = array_map(static function (FixerInterface $fixer): string {
    //         return $fixer->getName();
    //     }, $fixerFactory->getFixers());

    //     $unknownFixers = array_diff($configuredFixers, $availableFixers);

    //     $this->assertSame(0, count($unknownFixers));
    // }
}
