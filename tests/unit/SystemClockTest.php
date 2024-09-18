<?php

declare(strict_types=1);

require dirname(__DIR__, 2) . '/vendor/autoload.php';

use Bebehr\Clock\SystemClock;

$clock = new SystemClock();

$dateTime = $clock->now();
dump($dateTime);

$timeStamp = $clock->now()->getTimestamp();
dump($timeStamp);
