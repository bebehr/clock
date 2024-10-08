<?php

declare(strict_types=1);

namespace Bebehr\Clock\Tests\Unit;

use Bebehr\Clock\SystemClock;
use Bebehr\Clock\SystemClockFactory;
use Bebehr\Clock\SystemClockFactoryInterface;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Bebehr\Clock\SystemClockFactory
 *
 * @uses \Bebehr\Clock\SystemClock
 * @uses \Bebehr\Clock\Helpers\TimeZoneHelper
 */
final class SystemClockFactoryTest extends TestCase
{
    private SystemClockFactoryInterface $factory;

    protected function setUp(): void
    {
        $this->factory = new SystemClockFactory();
    }

    public function testFactoryIsInstanceOfSystemClockFactory(): void
    {
        $factory = $this->factory;

        self::assertInstanceOf(SystemClockFactory::class, $factory);
    }

    public function testCanCreateSystemClock(): void
    {
        $factory = $this->factory;
        $timeZone = new \DateTimeZone('Europe/Berlin');

        $clock = $factory->create($timeZone);

        self::assertInstanceOf(SystemClock::class, $clock);
    }

    public function testCanCreateSystemClockUsingDefault(): void
    {
        $factory = $this->factory;

        $clock = $factory->create();

        self::assertInstanceOf(SystemClock::class, $clock);
    }

    public function testCanCreateSystemClockUsingNull(): void
    {
        $factory = $this->factory;

        $clock = $factory->create(null);

        self::assertInstanceOf(SystemClock::class, $clock);
    }
}
