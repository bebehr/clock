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
        $this->clock = new SystemClock();
    }

    public function testClockIsInstanceOfSystemClock(): void
    {
        $clock = $this->clock;

        $this->assertInstanceOf(SystemClock::class, $clock);
    }

    public function testClockImplementsClockInterface(): void
    {
        $clock = $this->clock;

        $this->assertInstanceOf(ClockInterface::class, $clock);
    }

    public function testNowReturnsDateTimeimmutable(): void
    {
        $clock = $this->clock;

        $now = $clock->now();

        $this->assertInstanceOf(\DateTimeImmutable::class, $now);
    }

    public function testNowReturnsFreshDateTimeimmutable(): void
    {
        $clock = $this->clock;
        $now = [];

        $now[] = $clock->now();
        $now[] = $clock->now();

        $this->assertNotSame($now[1], $now[0]);
    }

    public function testNowReturnsCurrentDateTime(): void
    {
        $timeZone = $this->timeZone;
        $clock = $this->clock;

        $before = new \DateTimeImmutable('now', $timeZone);
        $now = $clock->now();
        $after = new \DateTimeImmutable('now', $timeZone);

        $this->assertGreaterThanOrEqual($before, $now);
        $this->assertLessThanOrEqual($after, $now);
    }

    public function testNowReturnsGreaterDateTimeAfterSecond(): void
    {
        $clock = $this->clock;

        $before = $clock->now();
        sleep(1);
        $now = $clock->now();
        sleep(1);
        $after = $clock->now();

        $this->assertGreaterThan($before, $now);
        $this->assertLessThan($after, $now);
    }
}
