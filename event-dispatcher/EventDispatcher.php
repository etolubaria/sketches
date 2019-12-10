<?php

/**
 * @author Eugene Tolubaria <m203a4@gmail.com>
 */
class EventDispatcher implements EventDispatcherInterface
{
    /**
     * @var array
     */
    private $binds = [];

    /**
     * @inheritDoc
     */
    public function bind(string $eventType, callable $handler): void
    {
        $this->binds[$eventType][] = $handler;
    }

    /**
     * @inheritDoc
     */
    public function unbind(string $eventType, callable $handler): void
    {
        if (isset($this->binds[$eventType])) {
            foreach ($this->binds[$eventType] as $index => $registredHandler) {
                if ($registredHandler == $handler) {
                    unset($this->binds[$eventType][$index]);
                }
            }
        }
    }

    /**
     * @inheritDoc
     */
    public function dispatch(string $eventType, object $event): void
    {
        if (isset($this->binds[$eventType])) {
            foreach ($this->binds[$eventType] as $handler) {
                $handler($event);
            }
        }
    }
}
