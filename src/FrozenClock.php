<?php

declare(strict_types=1);

namespace Bebehr\Clock;

final class FrozenClock implements \Psr\Clock\ClockInterface
{
    private \DateTimeImmutable $now;

    public function __construct(\DateTimeImmutable $now)
    {
        $this->now = $now;
    }

    public function now(): \DateTimeImmutable
    {
        return clone $this->now;
    }
}
