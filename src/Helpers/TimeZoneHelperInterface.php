<?php

declare(strict_types=1);

namespace Bebehr\Clock\Helpers;

interface TimeZoneHelperInterface
{
    public function createDefaultTimezone(): \DateTimeZone;
}
