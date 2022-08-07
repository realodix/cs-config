# Realodix Relax

![PHPVersion](https://img.shields.io/badge/PHP-7.4%20|%208-777BB4.svg?style=flat-square)
![Build Status](../../actions/workflows/ci.yml/badge.svg)

**Realodix Relax** is built on top of [`PHP CS Fixer`](http://github.com/FriendsOfPHP/PHP-CS-Fixer) and makes it simple to to sharing identical PHP CS Fixer rules across all of your projects without copy-and-pasting configuration files.


## Installation

You can install this package by using [composer](https://getcomposer.org/):

```sh
composer require --dev realodix/relax
```

## Configuration

In your PHP CS Fixer configuration file, use the following contents:

```php
<?php

use Realodix\CsConfig\Config;

return Config::create('realodix');
```

#### Finder Presets
- [`Finder::base()`](docs/finders.md#finderbase) - Default
- [`Finder::laravel()`](docs/finders.md#finderlaravel)

#### Rule Sets
- [`realodix`](src/RuleSet/Realodix.php)
- [`laravel`](src/RuleSet/Laravel.php)
- [`spatie`](src/RuleSet/Spatie.php)
- [`blank`](src/RuleSet/Blank.php) - No predefined rules. Use this to completely set your own rules.


**Custom Fixers**
- [`Laravel/laravel_phpdoc_alignment`](src/Fixers/Laravel/LaravelPhpdocAlignmentFixer.php)
- [`Laravel/laravel_phpdoc_order`](src/Fixers/Laravel/LaravelPhpdocOrderFixer.php)
- [`Laravel/laravel_phpdoc_separation`](src/Fixers/Laravel/LaravelPhpdocSeparationFixer.php)
- [kubawerlos/php-cs-fixer-custom-fixers](https://github.com/kubawerlos/php-cs-fixer-custom-fixers)

:bulb: It's already registered, so you no longer need to register it via `registerCustomFixers()`.

## Advanced Configuration

In case you only need some tweaks for specific projects, which won't deserve an own preset - You can add additional rules or override pre-defined ones by passing them as the #1 parameter to the rule set method. These rules will be merged with the pre-defined rules.

```php
<?php

use Realodix\CsConfig\Config;

// You can add or override preset rules
$localRules = [
    // Adding a rule
    'array_syntax' => true,
    // Adding a rule or override predefined rules
    'binary_operator_spaces' => [
        'operators' => ['=>' => 'align_single_space_minimal']
    ],
    // Override predefined rules
    'ternary_operator_spaces' => false,
    // Adding custom rules
    'CustomFixer/rule_1' => true,
    'CustomFixer/rule_2' => true,
];

return Config::create('realodix', $localRules)
    ->registerCustomFixers(new PhpCsFixerCustomFixers\CustomFixer());
```

## Extending

You can easily create your own presets by extending the [`AbstractRules`](src/RuleSet/AbstractRules.php) class.
```php
<?php

use Realodix\CsConfig\Rules\AbstractRules;

final class MyRules extends AbstractRules
{
    /**
     * Optionally, set the RuleSet name.
     */
    // public string $name = 'Personal CS';

    protected function rules(): array
    {
        // ...
    }
}
```

And use it!

```php
<?php

use Realodix\CsConfig\Config;
use YourVendorName\YourPackageName\MyRules;

$localRules = [
    // ...
];

return Config::create(new MyRules, $localRules);
```

## Troubleshooting

For general help and support join our [GitHub Discussions](../../discussions).

Please report bugs to the [GitHub Issue Tracker](../../issues).

## License

This package is licensed under the [MIT License](/LICENSE).
