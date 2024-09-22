<?php

declare(strict_types=1);

namespace Bebehr\Clock;

/** @immutable */
final class SystemClock implements \Psr\Clock\ClockInterface
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
