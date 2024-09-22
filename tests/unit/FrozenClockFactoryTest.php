<?php

declare(strict_types=1);

namespace Bebehr\Clock\Tests\Unit;

use Bebehr\Clock\FrozenClock;
use Bebehr\Clock\FrozenClockFactory;
use Bebehr\Clock\FrozenClockFactoryInterface;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Bebehr\Clock\FrozenClockFactory
 *
 * @uses \Bebehr\Clock\FrozenClock
 */
final class FrozenClockFactoryTest extends TestCase
{
    private FrozenClockFactoryInterface $factory;

    protected function setUp(): void
    {
        $this->factory = new FrozenClockFactory();
    }

    public function testFactoryIsInstanceOfFrozenClockFactory(): void
    {
        $factory = $this->factory;

        self::assertInstanceOf(FrozenClockFactory::class, $factory);
    }

    public function testCanCreateFrozenClock(): void
    {
        $factory = $this->factory;
        $now = new \DateTimeImmutable();

        $clock = $factory->create($now);

        self::assertInstanceOf(FrozenClock::class, $clock);
    }
}
