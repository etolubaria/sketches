<?php

declare(strict_types=1);

namespace EmailQueueConsumerExample\Component\Console;

/**
 * Interface OutputInterface
 *
 * @author Eugene Tolubaria <m203a4@gmail.com>
 */
interface OutputInterface
{
    public function print(string $message);
    public function printLine(string $message);
    public function printFormat(string $format, ...$args);
}
