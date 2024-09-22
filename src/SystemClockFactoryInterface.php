<?php

declare(strict_types=1);

namespace Bebehr\Clock;

use Psr\Clock\ClockInterface;

interface SystemClockFactoryInterface
{
    public function create(?\DateTimeZone $timeZone = null): ClockInterface;
}
