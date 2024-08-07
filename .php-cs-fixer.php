<?php

use PhpCsFixer\Runner\Parallel\ParallelConfigFactory;

$finder = Symfony\Component\Finder\Finder::create()
    ->notPath('vendor')
    ->notPath('bootstrap')
    ->notPath('storage')
    ->in(__DIR__)
    ->name('*.php')
    ->notName('*.blade.php');

return (new PhpCsFixer\Config())
    ->setParallelConfig(ParallelConfigFactory::detect())
    ->setRules([
        '@PSR2' => true,
        '@PhpCsFixer' => true,
        'php_unit_test_class_requires_covers' => false,
        'multiline_whitespace_before_semicolons' => ['strategy' => 'no_multi_line'],
        'php_unit_method_casing' => ['case' => 'snake_case'],
        'trailing_comma_in_multiline' => true,
        'class_attributes_separation' => ['elements' => [
            'const' => 'one',
            'method' => 'one',
            'property' => 'one',
            'trait_import' => 'none',
        ],
        ],
        'no_superfluous_phpdoc_tags' => [
            'allow_mixed' => true,
        ],
        'phpdoc_to_comment' => [
            'ignored_tags' => ['deprecated', 'phpstan-ignore-next-line', 'phpstan-ignore-line'],
        ],
        'global_namespace_import' => [
            'import_classes' => true,
            'import_constants' => true,
            'import_functions' => true,
        ],
    ])
    ->setFinder($finder);
