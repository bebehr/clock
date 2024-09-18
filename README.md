# clock

Provides a simple PSR-20 implementation for reading date and time from the system clock in PHP.

## Installing

```
composer require bebehr/clock
```

## Usage

```
use Bebehr\Clock\FrozenClock;
use Bebehr\Clock\SystemClock;

// SystemClock
$clock = new SystemClock();
$dateTime  = $clock->now();
$timeStamp = $clock->now()->getTimestamp();

// FrozenClock
$mockClock = new FrozenClock(new DateTimeImmutable(
    'now',
    new DateTimeZone('Europe/Berlin'),
));
$mockDateTime  = $mockClock->now();
$mockTimeStamp = $mockClock->now()->getTimestamp();

```
