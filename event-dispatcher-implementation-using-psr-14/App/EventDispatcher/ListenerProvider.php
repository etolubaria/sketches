<?php

namespace App\EventDispatcher;

/**
 * @author Eugene Tolubaria <m203a4@gmail.com>
 */
class ListenerProvider implements ListenerProviderInterface
{
    /**
     * @var array
     */
    private $listeners;

    /**
     * @inheritDoc
     */
    public function getListenersForEvent(object $event): iterable
    {
        $eventName = get_class($event);
        if (isset($this->listeners[$eventName])) {
            return $this->listeners[$eventName];
        }

        return [];
    }

    /**
     * @inheritDoc
     */
    public function addListener(callable $listener, object $event): void
    {
        $this->listeners[get_class($event)][] = $listener;
    }

    /**
     * @inheritDoc
     */
    public function removeListener(callable $listener, object $event): void
    {
        $eventName = get_class($event);
        if (!isset($this->listeners[$eventName])) {
            return;
        }

        foreach ($this->listeners[$eventName] as $index => $attachedListener) {
            if ($attachedListener == $listener) {
                unset($this->listeners[$eventName][$index]);
            }
        }
    }
}
