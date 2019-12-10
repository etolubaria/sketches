<?php

/**
 * @author Eugene Tolubaria <m203a4@gmail.com>
 */
interface LoggerInterface
{
    public function emergency(string $message, $context): void;
    public function alert(string $message, $context): void;
    public function critical(string $message, $context): void;
    public function error(string $message, $context): void;
    public function warning(string $message, $context): void;
    public function notice(string $message, $context): void;
    public function info(string $message, $context): void;
    public function debug(string $message, $context): void;
    public function log(string $level, string $message, $context): void;
}
