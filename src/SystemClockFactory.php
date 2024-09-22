<?php

declare(strict_types=1);

namespace Bebehr\Clock;

use Bebehr\Clock\Helpers\TimeZoneHelper;
use Psr\Clock\ClockInterface;

final class SystemClockFactory implements SystemClockFactoryInterface
{
    public function create(?\DateTimeZone $timeZone = null): ClockInterface
    {
        if ($timeZone === null) {
            $timeZone = (new TimeZoneHelper())->createDefaultTimezone();
        }

        return new SystemClock($timeZone);
    }
}
