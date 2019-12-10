<?php

/**
 * Manages listeners and dispatches events
 *
 * @author Eugene Tolubaria <m203a4@gmail.com>
 */
interface EventDispatcherInterface
{
    /**
     * @param string $eventType
     * @param callable $handler
     */
    public function bind(string $eventType, callable $handler): void;

    /**
     * @param string $eventType
     * @param callable $handler
     */
    public function unbind(string $eventType, callable $handler): void;

    /**
     * @param string $eventType
     * @param object $event
     */
    public function dispatch(string $eventType, object $event): void;
}
