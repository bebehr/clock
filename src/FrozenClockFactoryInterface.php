<?php

declare(strict_types=1);

namespace Bebehr\Clock;

use Psr\Clock\ClockInterface;

interface FrozenClockFactoryInterface
{
    public function create(?\DateTimeImmutable $now = null): ClockInterface;
}
