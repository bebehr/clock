<?php

declare(strict_types=1);

namespace Bebehr\Clock;

interface FrozenClockFactoryInterface
{
    public function create(\DateTimeImmutable $now): \Psr\Clock\ClockInterface;
}
