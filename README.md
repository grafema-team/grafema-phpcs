# PHP CS Fixer: Grafema fixers

A set of custom fixers for [PHP CS Fixer](https://github.com/FriendsOfPHP/PHP-CS-Fixer), specially for Grafema.

### What is php-cs-fixer?

The [php-cs-fixer](https://github.com/FriendsOfPHP/PHP-CS-Fixer) or [PHP Coding Standards Fixer](https://cs.symfony.com/) is an awesome tool created by the super awesome people at [Symfony](https://symfony.com/).

It helps your PHP code/repository to follow a certain coding standard defined by you team.

#### Available Additional Fixers

1. **Space Inside Parenthesis**: This fixer ensures that when defining functions, if/else blocks, or control structures which have parenthesis, a space after the starting parenthesis and before the ending parenthesis exists. Rule name: `GrafemaPHPCS/space_inside_parenthesis`.

## Installation
PHP CS Fixer: custom fixers can be installed by running:

```bash
composer require --dev grafema-team/grafema-phpcs
```

## Usage
In your PHP CS Fixer configuration (`.php-cs-fixer.php`) register fixers and use them:

```php
<?php
$header = <<<'EOF'
This file is part of Grafema Projects.
EOF;

return (new PhpCsFixer\Config())
	->setRiskyAllowed( true )
	->registerCustomFixers( [
		new GrafemaPHPCS\Fixer\SpaceInsideParenthesisFixer(),
	] )
	->setRules( [
		'@DoctrineAnnotation'                   => true,
		'@PSR2'                                 => true,
		'@PhpCsFixer'                           => true,
		'@Symfony'                              => true,
		'GrafemaPHPCS/space_inside_parenthesis' => true,
		'align_multiline_comment'               => true,
		'array_syntax'                          => [
			'syntax' => 'short',
		],
		'binary_operator_spaces' => [
			'operators' => [
				'=>' => 'align_single_space_minimal',
				'='  => 'align_single_space_minimal',
			],
		],
		'blank_line_before_statement' => [
			'statements' => [
				'declare',
				'return',
				'try',
				'while',
				'for',
				'foreach',
				'do',
			],
		],
		'class_attributes_separation' => true,
		'combine_consecutive_unsets'  => true,
		'concat_space'                => [
			'spacing' => 'one',
		],
		'constant_case' => [
			'case' => 'lower',
		],
		'general_phpdoc_annotation_remove' => [
			'annotations' => [
				'author',
			],
		],
		'global_namespace_import' => [
			'import_classes'   => true,
			'import_constants' => true,
			'import_functions' => true,
		],
		'header_comment' => [
			'comment_type' => 'PHPDoc',
			'header'       => $header,
			'separate'     => 'none',
			'location'     => 'after_declare_strict',
		],
		'linebreak_after_opening_tag' => true,
		'list_syntax'                 => [
			'syntax' => 'short',
		],
		'lowercase_static_reference'             => true,
		'multiline_comment_opening_closing'      => true,
		'multiline_whitespace_before_semicolons' => [
			'strategy' => 'no_multi_line',
		],
		'no_unused_imports'                 => true,
		'no_useless_else'                   => true,
		'not_operator_with_successor_space' => true,
		'ordered_class_elements'            => true,
		'ordered_imports'                   => [
			'imports_order' => [
				'class',
				'function',
				'const',
			],
			'sort_algorithm' => 'alpha',
		],
		'phpdoc_align' => [
			'align' => 'vertical',
		],
		'phpdoc_no_alias_tag'       => true,
		'phpdoc_separation'         => true,
		'single_line_comment_style' => [
			'comment_types' => [],
		],
		'single_quote'           => true,
		'standardize_not_equals' => true,
		'yoda_style'             => [
			'always_move_variable' => false,
			'equal'                => false,
			'identical'            => false,
		],
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

Upon configuring everything, run `php-cs-fixer fix` from the commandline.
