# :exclamation: Abandoned!

This package is abandoned, you should avoid using it. Use [`realodix/relax`](https://github.com/realodix/relax) instead.

# Realodix CS Config

![PHPVersion](https://img.shields.io/badge/PHP-7.4%20|%208-777BB4.svg?style=flat-square)
![Build Status](../../actions/workflows/ci.yml/badge.svg)

This package is built on top of [`PHP CS Fixer`](http://github.com/FriendsOfPHP/PHP-CS-Fixer) and makes it simple to to sharing identical PHP CS Fixer rules across all of your projects without copy-and-pasting configuration files.


## Installation

You can install this package by using [composer](https://getcomposer.org/):

```sh
composer require --dev realodix/cs-config
```

PHP          | Version
------------ | ----------
`>= 7.1` | `1.0.x`
`>= 7.4` | `1.1.x`

## Configuration

In your PHP CS Fixer configuration file, use the following contents:

```php
<?php

use Realodix\CsConfig\Config;
use Realodix\CsConfig\Finder;
use Realodix\CsConfig\Rules\Realodix;

return Config::create(new Realodix);
```

#### Finder Presets
- [`Finder::base()`](docs/finders.md#finderbase) - Default
- [`Finder::laravel()`](docs/finders.md#finderlaravel)

#### Rulesets
- [`Realodix`](src/Rules/Realodix.php), [`RealodixPlus`](src/Rules/RealodixPlus.php)
- [`Laravel`](src/Rules/Laravel.php), [`LaravelRisky`](src/Rules/LaravelRisky.php)
- [`Spatie`](src/Rules/Spatie.php)
- [`Blank`](src/Rules/Blank.php) - No predefined rules. Use this to completely set your own rules.

:bulb: Namespace `Realodix\CsConfig\Rules\`

**Custom Fixers**
- [`Laravel/laravel_phpdoc_alignment`](src/Fixers/Laravel/LaravelPhpdocAlignmentFixer.php)
- [`Laravel/laravel_phpdoc_order`](src/Fixers/Laravel/LaravelPhpdocOrderFixer.php)
- [`Laravel/laravel_phpdoc_separation`](src/Fixers/Laravel/LaravelPhpdocSeparationFixer.php)
- [kubawerlos/php-cs-fixer-custom-fixers](https://github.com/kubawerlos/php-cs-fixer-custom-fixers)

:bulb: It's already registered, so you no longer need to register it via `registerCustomFixers()`.

## Advanced Configuration

In case you only need some tweaks for specific projects, which won't deserve an own preset - you can add additional rules or override them.

```php
<?php

use Realodix\CsConfig\Config;
use Realodix\CsConfig\Finder;
use Realodix\CsConfig\Rules\Realodix;

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

return Config::create(new Realodix($localRules))
    ->registerCustomFixers(new PhpCsFixerCustomFixers\CustomFixer());
```

## Extending

You can easily create your own presets by extending the [`AbstractRules`](src/Rules/AbstractRules.php) class.

```php
<?php

use Realodix\CsConfig\Rules\AbstractRules;

final class MyRules extends AbstractRules
{
    // public string $name = 'Personal CS';

    protected function rules(): array
    {
        //
    }
}
```

And use it!

```php
<?php

use Realodix\CsConfig\Config;
use Realodix\CsConfig\Finder;
use YourVendorName\YourPackageName\MyRules;

$finder = Finder::base(__DIR__);

return Config::create(new MyRules)
    ->setFinder($finder);
```

## Troubleshooting

For general help and support join our [GitHub Discussions](../../discussions).

Please report bugs to the [GitHub Issue Tracker](../../issues).

## License

This package is licensed under the [MIT License](/LICENSE).
