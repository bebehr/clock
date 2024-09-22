<?php

declare(strict_types=1);

namespace Bebehr\Clock;

final class SystemClockFactory implements SystemClockFactoryInterface
{
    public function create(\DateTimeZone $timeZone): \Psr\Clock\ClockInterface
    {
        return new SystemClock($timeZone);
    }
}
