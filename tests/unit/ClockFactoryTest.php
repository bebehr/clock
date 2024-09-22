<?php

declare(strict_types=1);

namespace Bebehr\Clock\Tests\Unit;

use Bebehr\Clock\ClockFactory;
use Bebehr\Clock\ClockFactoryInterface;
use Bebehr\Clock\FrozenClock;
use Bebehr\Clock\SystemClock;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Bebehr\Clock\ClockFactory
 *
 * @uses \Bebehr\Clock\FrozenClock
 * @uses \Bebehr\Clock\FrozenClockFactory
 * @uses \Bebehr\Clock\Helpers\DateTimeHelper
 * @uses \Bebehr\Clock\Helpers\TimeZoneHelper
 * @uses \Bebehr\Clock\SystemClock
 * @uses \Bebehr\Clock\SystemClockFactory
 */
final class ClockFactoryTest extends TestCase
{
    private ClockFactoryInterface $factory;

    protected function setUp(): void
    {
        $this->factory = new ClockFactory();
    }

    public function testFactoryIsInstanceOfSystemClockFactory(): void
    {
        $factory = $this->factory;

        self::assertInstanceOf(ClockFactory::class, $factory);
    }

    public function testCanCreateSystemClock(): void
    {
        $factory = $this->factory;
        $timeZone = new \DateTimeZone('Europe/Berlin');

        $clock = $factory->createSystemClock($timeZone);

        self::assertInstanceOf(SystemClock::class, $clock);
    }

    public function testCanCreateSystemClockUsingDefault(): void
    {
        $factory = $this->factory;

        $clock = $factory->createSystemClock();

        self::assertInstanceOf(SystemClock::class, $clock);
    }

    public function testCanCreateSystemClockUsingNull(): void
    {
        $factory = $this->factory;

        $clock = $factory->createSystemClock(null);

        self::assertInstanceOf(SystemClock::class, $clock);
    }

    public function testCanCreateFrozenClock(): void
    {
        $factory = $this->factory;
        $now = new \DateTimeImmutable();

        $clock = $factory->createFrozenClock($now);

        self::assertInstanceOf(FrozenClock::class, $clock);
    }

    public function testCanCreateFrozenClockUsingDefault(): void
    {
        $factory = $this->factory;

        $clock = $factory->createFrozenClock();

        self::assertInstanceOf(FrozenClock::class, $clock);
    }

    public function testCanCreateFrozenClockUsingNull(): void
    {
        $factory = $this->factory;

        $clock = $factory->createFrozenClock(null);

        self::assertInstanceOf(FrozenClock::class, $clock);
    }

    public function testCanCreateDefaultClock(): void
    {
        $factory = $this->factory;
        $timeZone = new \DateTimeZone('Europe/Berlin');

        $clock = $factory->create($timeZone);

        self::assertInstanceOf(SystemClock::class, $clock);
    }

    public function testCanCreateDefaultClockUsingDefault(): void
    {
        $factory = $this->factory;

        $clock = $factory->create();

        self::assertInstanceOf(SystemClock::class, $clock);
    }

    public function testCanCreateDefaultClockUsingNull(): void
    {
        $factory = $this->factory;

        $clock = $factory->create(null);

        self::assertInstanceOf(SystemClock::class, $clock);
    }
}
