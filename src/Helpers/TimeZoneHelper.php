<?php

declare(strict_types=1);

namespace Bebehr\Clock\Helpers;

final class TimeZoneHelper implements TimeZoneHelperInterface
{
    public function createDefaultTimezone(): \DateTimeZone
    {
        return new \DateTimeZone(date_default_timezone_get());
    }
}
