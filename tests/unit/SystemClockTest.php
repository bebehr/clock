<?php

declare(strict_types=1);

namespace Bebehr\Clock\Tests\Unit;

use Bebehr\Clock\SystemClock;
use PHPUnit\Framework\TestCase;
use Psr\Clock\ClockInterface;

/**
 * @covers \Bebehr\Clock\SystemClock
 */
final class SystemClockTest extends TestCase
{
    private \DateTimeZone $timeZone;
    private ClockInterface $clock;

    protected function setUp(): void
    {
        $this->timeZone = new \DateTimeZone('Europe/Berlin');
        $this->clock = new SystemClock($this->timeZone);
    }

    public function testClockIsInstanceOfSystemClock(): void
    {
        $clock = $this->clock;

        self::assertInstanceOf(SystemClock::class, $clock);
    }

    public function testTimeZoneInjection(): void
    {
        $timeZone = new \DateTimeZone('Europe/London');

        $clock = new SystemClock($timeZone);
        $privateTimeZone = $this->getPropertyTimeZoneReflection($clock);

        self::assertSame($timeZone, $privateTimeZone);
    }

    public function testNowReturnsFreshDateTimeimmutable(): void
    {
        $clock = $this->clock;
        $now = [];

        $now[] = $clock->now();
        $now[] = $clock->now();

        self::assertNotSame($now[1], $now[0]);
    }

    public function testNowReturnsCurrentDateTime(): void
    {
        $timeZone = $this->timeZone;
        $clock = $this->clock;

        $before = new \DateTimeImmutable('now', $timeZone);
        $now = $clock->now();
        $after = new \DateTimeImmutable('now', $timeZone);

        self::assertGreaterThanOrEqual($before, $now);
        self::assertLessThanOrEqual($after, $now);
    }

    public function testNowReturnsGreaterDateTimeAfterSecond(): void
    {
        $clock = $this->clock;

        $before = $clock->now();
        sleep(1);
        $now = $clock->now();
        sleep(1);
        $after = $clock->now();

        self::assertGreaterThan($before, $now);
        self::assertLessThan($after, $now);
    }

    public function testNowReturnsTimeZoneProperty(): void
    {
        $clock = new SystemClock($this->timeZone);
        $privateTimeZone = $this->getPropertyTimeZoneReflection($clock);

        $timeZone = $clock->now()->getTimezone();

        self::assertEquals($privateTimeZone, $timeZone);
    }

    private function getPropertyTimeZoneReflection(ClockInterface $clock): \DateTimeZone
    {
        $timeZoneReflection = (new \ReflectionClass($clock))
            ->getProperty('timeZone')
        ;
        $privateTimeZone = $timeZoneReflection->getValue($clock);
        \assert($privateTimeZone instanceof \DateTimeZone);

        return $privateTimeZone;
    }
}
