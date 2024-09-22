<?php

declare(strict_types=1);

namespace Bebehr\Clock;

use Psr\Clock\ClockInterface;

/** @immutable */
final class SystemClock implements ClockInterface
{
    public function __construct(private readonly \DateTimeZone $timeZone)
    {
    }

    public function now(): \DateTimeImmutable
    {
        return new \DateTimeImmutable('now', $this->timeZone);
    }

    public function freeze(): FrozenClock
    {
        return new FrozenClock($this->now());
    }
}
