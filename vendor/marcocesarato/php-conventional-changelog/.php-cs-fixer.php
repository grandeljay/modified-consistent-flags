<?php

$finder = PhpCsFixer\Finder::create()
    ->ignoreDotFiles(false)
    ->ignoreVCS(true)
    ->exclude('vendor')
    ->name('.changelog')
    ->name('.php_cs')
    ->name('conventional-changelog')
    ->in(__DIR__);

$config = new PhpCsFixer\Config();

return $config
    ->setUsingCache(true)
    ->setRiskyAllowed(true)
    ->setCacheFile(__DIR__ . '/.php-cs-fixer.cache')
    ->setRules([
        '@PSR1' => true,
        '@PSR2' => true,
        '@Symfony' => true,
        'psr_autoloading' => true,
        // Custom rules
        'align_multiline_comment' => ['comment_type' => 'phpdocs_only'], // PSR-5
        'phpdoc_to_comment' => false,
        'array_indentation' => true,
        'array_syntax' => ['syntax' => 'short'],
        'cast_spaces' => ['space' => 'none'],
        'concat_space' => ['spacing' => 'one'],
        'compact_nullable_typehint' => true,
        'declare_equal_normalize' => ['space' => 'single'],
        'increment_style' => ['style' => 'post'],
        'list_syntax' => ['syntax' => 'long'],
        'echo_tag_syntax' => ['format' => 'long'],
        'phpdoc_align' => false,
        'phpdoc_no_empty_return' => false,
        'phpdoc_order' => true, // PSR-5
        'phpdoc_no_useless_inheritdoc' => false,
        'protected_to_private' => false,
        'yoda_style' => false,
        'method_argument_space' => ['on_multiline' => 'ensure_fully_multiline'],
        'ordered_imports' => [
            'sort_algorithm' => 'alpha',
            'imports_order' => ['class', 'const', 'function'],
        ],
    ])
    ->setFinder($finder);
