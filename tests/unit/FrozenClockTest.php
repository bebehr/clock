<?php

declare(strict_types=1);

namespace Bebehr\Clock\Tests\Unit;

use Bebehr\Clock\FrozenClock;
use PHPUnit\Framework\TestCase;
use Psr\Clock\ClockInterface;

/**
 * @covers \Bebehr\Clock\FrozenClock
 */
final class FrozenClockTest extends TestCase
{
    private \DateTimeZone $timeZone;
    private \DateTimeImmutable $now;
    private ClockInterface $clock;

    protected function setUp(): void
    {
        $this->timeZone = new \DateTimeZone('Europe/Berlin');
        $this->now = new \DateTimeImmutable('now', $this->timeZone);
        $this->clock = new FrozenClock($this->now);
    }

    public function testClockIsInstanceOfFrozenClock(): void
    {
        $clock = $this->clock;

        self::assertInstanceOf(FrozenClock::class, $clock);
    }

    public function testDateTimeInjection(): void
    {
        $now = $this->now;

        $clock = new FrozenClock($now);
        $privateNow = $this->getPropertyNowReflection($clock);

        self::assertSame($now, $privateNow);
    }

    public function testNowReturnsFreshDateTimeimmutable(): void
    {
        $clock = $this->clock;
        $now = [];

        $now[] = $clock->now();
        $now[] = $clock->now();

        self::assertNotSame($now[1], $now[0]);
    }

    public function testNowReturnsNowProperty(): void
    {
        $clock = $this->clock;
        $privateNow = $this->getPropertyNowReflection($clock);

        sleep(1);
        $now = $clock->now();

        self::assertEquals($privateNow, $now);
    }

    private function getPropertyNowReflection(ClockInterface $clock): \DateTimeImmutable
    {
        $nowReflection = (new \ReflectionClass($clock))
            ->getProperty('now')
        ;
        $privateNow = $nowReflection->getValue($clock);
        \assert($privateNow instanceof \DateTimeImmutable);

        return $privateNow;
    }
}
