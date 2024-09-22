<?php

declare(strict_types=1);

namespace Bebehr\Clock\Helpers;

interface DateTimeHelperInterface
{
    public function createDefaultDateTime(): \DateTimeImmutable;
}
