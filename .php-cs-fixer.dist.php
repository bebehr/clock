<?php

declare(strict_types=1);

use PhpCsFixer\Config;
use PhpCsFixer\Finder;
use PhpCsFixer\Runner\Parallel\ParallelConfigFactory;

$finder = (new Finder())
    ->in(__DIR__)
    ->exclude(['var', 'vendor', 'vendor-bin'])
    ->ignoreDotFiles(false)
    ->ignoreVCSIgnored(true)
;
$cacheFile = __DIR__ . '/var/cache/php-cs-fixer.cache';

return (new Config())
    ->setParallelConfig(ParallelConfigFactory::detect())
    ->setRiskyAllowed(true)
    ->setRules([
        '@PHP80Migration:risky' => true,
        '@PHP81Migration' => true,
        '@PHPUnit100Migration:risky' => true,
        '@Symfony' => true,
        '@Symfony:risky' => true,
        'concat_space' => false,
        'yoda_style' => false,
    ])
    ->setFinder($finder)
    ->setCacheFile($cacheFile)
;
