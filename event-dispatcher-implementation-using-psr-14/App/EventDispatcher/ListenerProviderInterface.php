<?php

namespace App\EventDispatcher;

use Psr\EventDispatcher\ListenerProviderInterface as PsrListenerProviderInterface;

/**
 * @author Eugene Tolubaria <m203a4@gmail.com>
 */
interface ListenerProviderInterface extends PsrListenerProviderInterface
{
    /**
     * Adds an event listener that listens on a specified event
     *
     * @param object $event
     * @param callable $listener
     */
    public function addListener(callable $listener, object $event): void;

    /**
     * Removes an event listener that listens on a specified event
     *
     * @param object $event
     * @param callable $listener
     */
    public function removeListener(callable $listener, object $event): void;
}
