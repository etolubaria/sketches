<?php

declare(strict_types=1);

namespace EmailQueueConsumerExample\Component\Console;

use EmailQueueConsumerExample\Component\Logger\LoggerInterface;

/**
 * Class ConsoleCommand
 *
 * @author Eugene Tolubaria <m203a4@gmail.com>
 */
abstract class ConsoleCommand implements ConsoleCommandInterface
{
    protected LoggerInterface $logger;
    protected OutputInterface $output;

    public function __construct(LoggerInterface $logger, OutputInterface $output)
    {
        $this->logger = $logger;
        $this->output = $output;
    }
}
