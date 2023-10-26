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

```
<?php
$header = <<<'EOF'
This file is part of Grafema CMS.

@link     https://www.hyperf.io
@document https://hyperf.wiki
@contact  group@hyperf.io
@license  https://github.com/hyperf/hyperf/blob/master/LICENSE.md
EOF;

return (new PhpCsFixer\Config())
	->setRiskyAllowed( true )
	->registerCustomFixers( [
		new GrafemaPHPCS\Fixer\SpaceInsideParenthesisFixer(),
	] )
	->setRules( [
		'@PSR2'               => true,
		'@Symfony'            => true,
		'@DoctrineAnnotation' => true,
		'@PhpCsFixer'         => true,
		'header_comment'      => [
			'comment_type' => 'PHPDoc',
			'header'       => $header,
			'separate'     => 'none',
			'location'     => 'after_declare_strict',
		],
		'array_syntax' => [
			'syntax' => 'short',
		],
		'blank_line_before_statement' => [
			'statements' => ['declare', 'return', 'try', 'while', 'for', 'foreach', 'do'],
		],
		'list_syntax' => [
			'syntax' => 'short',
		],
		'concat_space' => [
			'spacing' => 'one',
		],
		'general_phpdoc_annotation_remove' => [
			'annotations' => [
				'author',
			],
		],
		'ordered_imports' => [
			'imports_order' => [
				'class', 'function', 'const',
			],
			'sort_algorithm' => 'alpha',
		],
		'single_line_comment_style' => [
			'comment_types' => [
			],
		],
		'yoda_style' => [
			'always_move_variable' => false,
			'equal'                => false,
			'identical'            => false,
		],
		'phpdoc_align' => [
			'align' => 'vertical',
		],
		'multiline_whitespace_before_semicolons' => [
			'strategy' => 'no_multi_line',
		],
		'constant_case' => [
			'case' => 'lower',
		],
		'global_namespace_import' => [
			'import_classes'   => true,
			'import_constants' => true,
			'import_functions' => true,
		],
		'not_operator_with_successor_space' => true,
		'class_attributes_separation'       => true,
		'combine_consecutive_unsets'        => true,
		'linebreak_after_opening_tag'       => true,
		'lowercase_static_reference'        => true,
		'no_useless_else'                   => true,
		'no_unused_imports'                 => true,
		'ordered_class_elements'            => true,
		'phpdoc_separation'                 => true,
		'single_quote'                      => true,
		'standardize_not_equals'            => true,
		'multiline_comment_opening_closing' => true,
		'align_multiline_comment'           => true,
		'binary_operator_spaces'            => [
			'operators' => [
				'=>' => 'align_single_space_minimal',
				'='  => 'align_single_space_minimal',
			],
		],
		'phpdoc_no_alias_tag'                   => true,

		// custom grafema fixes rules
		'GrafemaPHPCS/space_inside_parenthesis' => true,
	] )
	->setIndent( '	' )
	->setFinder(
		PhpCsFixer\Finder::create()
			->exclude( 'documentation' )
			->exclude( 'vendor' )
			->exclude( 'src' )
			->in( __DIR__ )
	)
	->setUsingCache( false );
```

The `GrafemaPHPCS\Fixer\Fixer::rules()` function simplifies the usage of the Grafema specific rules. However, if you want more control and have different taste, you can copy/paste the rules from the `GrafemaPHPCS\Fixer\Fixer` class to the `.php_cs` file if you want to.

### Example File

The example [.php_cs.example](https://github.com/tareq1988/wp-php-cs-fixer/blob/master/.php-cs-fixer.dist.php.example) file should be a fine starting point for your plugins. Just drop the file into your plugin folder by renaming to `.php-cs-fixer.dist.php` and you are good to go.

Upon configuring everything, run `php-cs-fixer fix` from the commandline.
