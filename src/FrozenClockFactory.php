<?php

declare(strict_types=1);

namespace Bebehr\Clock;

final class FrozenClockFactory implements FrozenClockFactoryInterface
{
    public function create(\DateTimeImmutable $now): \Psr\Clock\ClockInterface
    {
        return new FrozenClock($now);
    }
}
