<?php

declare(strict_types=1);

namespace Bebehr\Clock\Helpers;

final class DateTimeHelper implements DateTimeHelperInterface
{
    public function createDefaultDateTime(): \DateTimeImmutable
    {
        return new \DateTimeImmutable(
            'now',
            (new TimeZoneHelper())->createDefaultTimezone(),
        );
    }
}
