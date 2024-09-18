<?php

declare(strict_types=1);

use PhpCsFixer\Config;
use PhpCsFixer\Finder;

return (new Config())
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
    ->setFinder(
        (new Finder())
            ->ignoreDotFiles(false)
            ->ignoreVCSIgnored(true)
            ->exclude(['var', 'vendor', 'vendor-bin'])
            ->in(__DIR__)
    )
    ->setCacheFile(__DIR__ . '/var/cache/php-cs-fixer.cache')
;
