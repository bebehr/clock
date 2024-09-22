<?php

declare(strict_types=1);

namespace Bebehr\Clock\Tests\Unit\Helpers;

use Bebehr\Clock\Helpers\TimeZoneHelper;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Bebehr\Clock\Helpers\TimeZoneHelper
 */
final class TimeZoneHelperTest extends TestCase
{
    public function testCreateDefaultTimeZoneReturnsSystemDefault(): void
    {
        $systemTimeZone = new \DateTimeZone(date_default_timezone_get());
        $helper = new TimeZoneHelper();

        $timeZone = $helper->createDefaultTimezone();

        self::assertEquals($systemTimeZone, $timeZone);
    }
}
