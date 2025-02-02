<?php

declare(strict_types=1);

namespace EmailQueueConsumerExample\Component\Logger;

/**
 * Interface LogLevel
 *
 * @author Eugene Tolubaria <m203a4@gmail.com>
 */
final class LogLevel
{
    public const EMERGENCY  = 'emergency';
    public const ALERT      = 'alert';
    public const CRITICAL   = 'critical';
    public const ERROR      = 'error';
    public const WARNING    = 'warning';
    public const NOTICE     = 'notice';
    public const INFO       = 'info';
    public const DEBUG      = 'debug';
}
