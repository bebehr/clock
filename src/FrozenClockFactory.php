<?php

declare(strict_types=1);

namespace Bebehr\Clock;

use Psr\Clock\ClockInterface;

final class FrozenClockFactory implements FrozenClockFactoryInterface
{
    public function create(\DateTimeImmutable $now): ClockInterface
    {
        return new FrozenClock($now);
    }
}
