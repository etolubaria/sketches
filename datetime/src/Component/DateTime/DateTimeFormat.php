<?php

declare(strict_types=1);

namespace DateTimeExample\Component\DateTime;

/**
 * Class DateTimeFormat
 *
 * @author Eugene Tolubaria <m203a4@gmail.com>
 */
final class DateTimeFormat
{
    /**
     * Representation of date and time formats according to ISO 8601
     *
     * @link https://en.wikipedia.org/wiki/ISO_8601
     * @link https://www.php.net/manual/en/datetime.format.php
     * @link https://docs.oracle.com/javase/8/docs/api/java/time/format/DateTimeFormatter.html
     */
    public const ISO8601_DATE               = 'Y-m-d';
    public const ISO8601_DATETIME           = 'Y-m-d\TH:i:sP';
    public const ISO8601_ORDINAL_DATE       = 'Y-z';
    public const ISO8601_YEAR               = 'Y';
    public const ISO8601_TIME               = 'H:i:s';
    public const ISO8601_MILLISECONDS_TIME  = 'H:i:s.v';
    public const ISO8601_WEEK               = 'o-\WW';
    public const ISO8601_WEEK_DATE          = 'o-\WW-N';

    public const SIMPLE_DATETIME = 'Y-m-d H:i:s'; // 2021-03-01 20:30:45
}
