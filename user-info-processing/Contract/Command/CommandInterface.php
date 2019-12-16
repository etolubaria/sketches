<?php

/*
 * This is a test application.
 *
 * It shows an example of working with an external API
 *   and processing request-response in various formats.
 *
 * Should be ran from the PHP Command Line Interface.
 *
 * (c) Eugene Tolubaria <m203a4@gmail.com>
 */

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
