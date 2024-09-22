# clock

Provides a simple PSR-20 implementation for reading date and time from the system clock in PHP.

## Installing

```
composer require bebehr/clock
```

## Usage

### Using the SystemClock

```
use Bebehr\Clock\SystemClockFactory;

// Create a clock
$clock = (new SystemClockFactory())->create(
  new DateTimeZone('Europe/Berlin'),
);
// or even more simple, using the system default timezone:
// $clock = (new SystemClockFactory())->create();

// $clock->now() ALWAYS returns a fresh DateTimeImmutable
$dateTime  = $clock->now();
$timeStamp = $clock->now()->getTimestamp();
$timeZone  = $clock->now()->getTimezone();
```

### Using a FrozenClock

```
use Bebehr\Clock\FrozenClockFactory;

// Create a clock
$mockClock = (new FrozenClockFactory())->create(
  new DateTimeImmutable(
    '2000-01-01',
    new DateTimeZone('Australia/Sydney'),
  )
);

// $clock->now() always returns an equal DateTimeImmutable
$mockDateTime  = $mockClock->now();
$mockTimeStamp = $mockClock->now()->getTimestamp();
$mockTimeZone  = $mockClock->now()->getTimezone();
```

### Freezing the SystemClock

```
use Bebehr\Clock\FrozenClockFactory;
use Bebehr\Clock\SystemClockFactory;

$frozenClock = (new SystemClockFactory())->create()->freeze();

// This is the same as:
$frozenClock = (new FrozenClockFactory())->create(
  (new SystemClockFactory())->create(),
);
```
