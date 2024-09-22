<?php

declare(strict_types=1);

namespace Bebehr\Clock\Tests\Unit\Helpers;

use Bebehr\Clock\Helpers\DateTimeHelper;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Bebehr\Clock\Helpers\DateTimeHelper
 *
 * @uses \Bebehr\Clock\Helpers\TimeZoneHelper
 */
final class DateTimeHelperTest extends TestCase
{
    public function testCreateDefaultDateTimeReturnsCurrentDateTime(): void
    {
        $systemTimeZone = new \DateTimeZone(date_default_timezone_get());
        $helper = new DateTimeHelper();

        $before = new \DateTimeImmutable('now', $systemTimeZone);
        $now = $helper->createDefaultDateTime();
        $after = new \DateTimeImmutable('now', $systemTimeZone);

        self::assertGreaterThanOrEqual($before, $now);
        self::assertLessThanOrEqual($after, $now);
    }

    public function testCreateDefaultDateTimeUsesDefaultTimeZone(): void
    {
        $systemTimeZone = new \DateTimeZone(date_default_timezone_get());
        $helper = new DateTimeHelper();

        $timeZone = $helper->createDefaultDateTime()->getTimezone();

        self::assertEquals($systemTimeZone, $timeZone);
    }
}
