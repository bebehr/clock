<?php

declare(strict_types=1);

namespace Bebehr\Clock;

final class SystemClock implements \Psr\Clock\ClockInterface
{
    public function now(): \DateTimeImmutable
    {
        return new \DateTimeImmutable();
    }
}
