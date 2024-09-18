<?php

declare(strict_types=1);

require dirname(__DIR__, 2) . '/vendor/autoload.php';

use Bebehr\Clock\FrozenClock;

$clock = new FrozenClock(new DateTimeImmutable(
    'now',
    new DateTimeZone('Europe/Berlin'),
));

$dateTime = $clock->now();
dump($dateTime);

$timeStamp = $clock->now()->getTimestamp();
dump($timeStamp);
