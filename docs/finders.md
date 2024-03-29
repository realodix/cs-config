## Finder Presets

#### **`Finder::base()`**
- Inherits [`PhpCsFixer\Finder`](https://github.com/FriendsOfPHP/PHP-CS-Fixer/blob/master/src/Finder.php) (includes PHP files & excludes `vendor` directory).
- Includes PHP files in all folders.
- Ignores VCS files.
- Ignores dotfiles.
- Excludes `_ide_helper_actions.php`, `_ide_helper_models.php`, `_ide_helper.php`, `.phpstorm.meta.php` files.

#### **`Finder::laravel()`**
- Inherits `Finder::base()` presets.
- Excludes all files in the `bootstrap/cache`, `public`, `resources` & `storage` directories.
- Excludes `*.blade.php` files.
