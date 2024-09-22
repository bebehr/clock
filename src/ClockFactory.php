<?php

declare(strict_types=1);

namespace Bebehr\Clock;

use Psr\Clock\ClockInterface;

final class ClockFactory implements ClockFactoryInterface
{
    public function create(?\DateTimeZone $timeZone = null): ClockInterface
    {
        return $this->createSystemClock($timeZone);
    }

    public function createSystemClock(?\DateTimeZone $timeZone = null): ClockInterface
    {
        return (new SystemClockFactory())->create($timeZone);
    }

    public function createFrozenClock(?\DateTimeImmutable $now = null): ClockInterface
    {
        return (new FrozenClockFactory())->create($now);
    }
}
