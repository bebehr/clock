<?php

declare(strict_types=1);

namespace Bebehr\Clock;

use Bebehr\Clock\Helpers\DateTimeHelper;
use Psr\Clock\ClockInterface;

final class FrozenClockFactory implements FrozenClockFactoryInterface
{
    public function create(?\DateTimeImmutable $now = null): ClockInterface
    {
        if ($now === null) {
            $now = (new DateTimeHelper())->createDefaultDateTime();
        }

        return new FrozenClock($now);
    }
}
