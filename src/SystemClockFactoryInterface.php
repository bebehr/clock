<?php

declare(strict_types=1);

namespace Bebehr\Clock;

interface SystemClockFactoryInterface
{
    public function create(): \Psr\Clock\ClockInterface;
}
