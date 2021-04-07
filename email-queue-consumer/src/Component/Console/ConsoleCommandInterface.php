<?php

declare(strict_types=1);

namespace EmailQueueConsumerExample\Component\Console;

/**
 * Interface ConsoleCommandInterface
 *
 * @author Eugene Tolubaria <m203a4@gmail.com>
 */
interface ConsoleCommandInterface
{
    /**
     * Runs a console command for execution
     */
    public function run(): void;
}
