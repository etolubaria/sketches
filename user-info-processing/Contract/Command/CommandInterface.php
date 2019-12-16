<?php

namespace Contract\Command;

/**
 * Assumes console execution
 *
 * @author Eugene Tolubaria <m203a4@gmail.com>
 */
interface CommandInterface
{
    /**
     * Entry point of the command.
     */
    public function execute(): void;
}
