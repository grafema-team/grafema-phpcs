# PHP CS Fixer: Grafema fixers

A set of custom fixers for [PHP CS Fixer](https://github.com/FriendsOfPHP/PHP-CS-Fixer), specially for Grafema.

### What is php-cs-fixer?

The [php-cs-fixer](https://github.com/FriendsOfPHP/PHP-CS-Fixer) or [PHP Coding Standards Fixer](https://cs.symfony.com/) is an awesome tool created by the super awesome people at [Symfony](https://symfony.com/).

It helps your PHP code/repository to follow a certain coding standard defined by you team.

### What are Grafema Fixers?

Grafema uses a bit different coding standard from the rest of the world. It doesn't follow PSR standards yet.

The aim of this Grafema specific fixers is to allow Grafema developers to standardize their code according to the [Grafema Coding Standard](https://make.Grafema.org/core/handbook/best-practices/coding-standards/php/).

#### Available Fixers

1. **Space Inside Parenthesis**: This fixer ensures that when defining functions, if/else blocks, or control structures which have parenthesis, a space after the starting parenthesis and before the ending parenthesis exists. Rule name: `GrafemaPHPCS/space_inside_parenthesis`.
2. **Blank Line After Class Opening**: PSR standards have the class opening brace on a new line, Grafema follows the same line standard. This ensures after the opening brace, one blank line exists (equals to two `\n`). Rule name: `GrafemaPHPCS/blank_line_after_class_opening`.

## Installation
PHP CS Fixer: custom fixers can be installed by running:

```bash
composer require --dev tareq1988/wp-php-cs-fixer
```

## Usage
In your PHP CS Fixer configuration (`.php-cs-fixer.dist.php`) register fixers and use them:

```diff
 <?php
 // add the custom fixers
+ require_once __DIR__ . '/vendor/tareq1988/wp-php-cs-fixer/loader.php';

 $finder = PhpCsFixer\Finder::create()
    ->exclude('node_modules')
    ->exclude('vendors')
    ->in( __DIR__ )
 ;

 $config = new PhpCsFixer\Config();
 $config
+    ->registerCustomFixers([
+        new GrafemaPHPCS\Fixer\SpaceInsideParenthesisFixer(),
+        new GrafemaPHPCS\Fixer\BlankLineAfterClassOpeningFixer()
+     ])
+    ->setRules( GrafemaPHPCS\Fixer\Fixer::rules() )
     ->setFinder( $finder )
;

 return $config;
```

The `GrafemaPHPCS\Fixer\Fixer::rules()` function simplifies the usage of the Grafema specific rules. However, if you want more control and have different taste, you can copy/paste the rules from the `GrafemaPHPCS\Fixer\Fixer` class to the `.php_cs` file if you want to.

### Example File

The example [.php_cs.example](https://github.com/tareq1988/wp-php-cs-fixer/blob/master/.php-cs-fixer.dist.php.example) file should be a fine starting point for your plugins. Just drop the file into your plugin folder by renaming to `.php-cs-fixer.dist.php` and you are good to go.

Upon configuring everything, run `php-cs-fixer fix` from the commandline.
