<?php

require __DIR__ . '/../vendor/autoload.php';

use DateTimeExample\Component\DateTime\DateTimeFormat;

$datetimeString = 'now';
// $datetimeString = 'today';
// $datetimeString = 'yesterday';
// $datetimeString = 'first day of this month';
// $datetimeString = 'last day of february 2020';
// $datetimeString = '2021-01-01';
// $datetimeString = '2021-12-31';

$timezone = new DateTimeZone('Europe/Kiev');
// $timezone = new DateTimeZone('Europe/London');
// $timezone = new DateTimeZone('PDT');
// $timezone = new DateTimeZone('EDT');
// $timezone = new DateTimeZone('UTC');
// $timezone = new DateTimeZone('GMT');

try {
    $date = new DateTime($datetimeString, $timezone);

    echo sprintf("Date:\t\t\t%s\n", $date->format(DateTimeFormat::ISO8601_DATE));
    echo sprintf("Date and time in UTC:\t%s\n", $date->format(DateTimeFormat::ISO8601_DATETIME));
    echo sprintf("Date ordinal:\t\t%s\n", $date->format(DateTimeFormat::ISO8601_ORDINAL_DATE));
    echo sprintf("Year:\t\t\t%s\n", $date->format(DateTimeFormat::ISO8601_YEAR));
    echo sprintf("Time:\t\t\t%s\n", $date->format(DateTimeFormat::ISO8601_TIME));
    echo sprintf("Time with milliseconds:\t%s\n", $date->format(DateTimeFormat::ISO8601_MILLISECONDS_TIME));
    echo sprintf("Week:\t\t\t%s\n", $date->format(DateTimeFormat::ISO8601_WEEK));
    echo sprintf("Week with weekday:\t%s\n", $date->format(DateTimeFormat::ISO8601_WEEK_DATE));
    echo sprintf("Simple datetime:\t%s\n", $date->format(DateTimeFormat::SIMPLE_DATETIME));
} catch (Exception $e) {
    echo 'Invalid datetime string', PHP_EOL;
}
