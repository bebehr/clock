<?php

declare(strict_types=1);

namespace Bebehr\Clock;

use Psr\Clock\ClockInterface;

interface ClockFactoryInterface
{
    public function create(?\DateTimeZone $timeZone = null): ClockInterface;

    public function createSystemClock(?\DateTimeZone $timeZone = null): ClockInterface;

    public function createFrozenClock(?\DateTimeImmutable $now = null): ClockInterface;
}
