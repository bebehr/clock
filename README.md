# clock

Provides a simple PSR-20 implementation for reading date and time from the system clock in PHP.

## Installing

```
composer require bebehr/clock
```

## Usage

### Using the SystemClock

```
use Bebehr\Clock\ClockFactory;

// Create a clock
$clock = (new ClockFactory())->create(
  new DateTimeZone('Europe/Berlin'),
);
// or even more simple, using the system default timezone:
// $clock = (new ClockFactory())->create();

// now() always returns a fresh DateTimeImmutable
$dateTime  = $clock->now();
$timeStamp = $clock->now()->getTimestamp();
$timeZone  = $clock->now()->getTimezone();
```

### Using a FrozenClock

```
use Bebehr\Clock\ClockFactory;

// Create a clock
$mockClock = (new ClockFactory())->createFrozenClock(
  new DateTimeImmutable(
    '2000-01-01',
    new DateTimeZone('Australia/Sydney'),
  )
);

// now() always returns an equal DateTimeImmutable
$mockDateTime  = $mockClock->now();
$mockTimeStamp = $mockClock->now()->getTimestamp();
$mockTimeZone  = $mockClock->now()->getTimezone();
```

### Freezing the SystemClock

```
use Bebehr\Clock\ClockFactory;

$frozenClock = (new ClockFactory())->create()->freeze();

// Is the same as:

$frozenClock = (new ClockFactory())->createFrozenClock(
  (new ClockFactory())->create(),
);
```
