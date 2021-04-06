<?php

declare(strict_types=1);

namespace EventDispatcherPsr14Example\Component\EventDispatcher;

use Psr\EventDispatcher\ListenerProviderInterface as PsrListenerProviderInterface;

/**
 * Interface ListenerProviderInterface
 *
 * @author Eugene Tolubaria <m203a4@gmail.com>
 */
interface ListenerProviderInterface extends PsrListenerProviderInterface
{
    /**
     * Adds an event listener that listens on a specified event
     *
     * @param callable $listener
     * @param string   $eventName
     */
    public function addListener(callable $listener, string $eventName): void;

    /**
     * Removes an event listener that listens on a specified event
     *
     * @param callable $listener
     * @param string   $eventName
     */
    public function removeListener(callable $listener, string $eventName): void;
}
