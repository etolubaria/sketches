<?php

declare(strict_types=1);

namespace EventDispatcherExample\Component\EventDispatcher;

/**
 * Class EventDispatcher
 *
 * @author Eugene Tolubaria <m203a4@gmail.com>
 */
final class EventDispatcher implements EventDispatcherInterface
{
    private array $binds = [];

    public function bind(string $eventType, callable $handler): void
    {
        $this->binds[$eventType][] = $handler;
    }

    public function unbind(string $eventType, callable $handler): void
    {
        if (isset($this->binds[$eventType])) {
            foreach ($this->binds[$eventType] as $index => $registeredHandler) {
                if ($registeredHandler === $handler) {
                    unset($this->binds[$eventType][$index]);
                }
            }
        }
    }

    public function dispatch(string $eventType, object $event): void
    {
        if (isset($this->binds[$eventType])) {
            foreach ($this->binds[$eventType] as $handler) {
                $handler($event);
            }
        }
    }
}
