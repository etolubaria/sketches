<?php

declare(strict_types=1);

namespace EventDispatcherPsr14Example\Component\EventDispatcher;

/**
 * Class ListenerProvider
 *
 * @author Eugene Tolubaria <m203a4@gmail.com>
 */
final class ListenerProvider implements ListenerProviderInterface
{
    private array $listeners;

    public function getListenersForEvent(object $event): iterable
    {
        $eventName = $event instanceof NamedEventInterface
            ? $event->getName()
            : get_class($event);

        return $this->listeners[$eventName] ?? [];
    }

    public function addListener(callable $listener, string $eventName): void
    {
        $this->listeners[$eventName][] = $listener;
    }

    public function removeListener(callable $listener, string $eventName): void
    {
        if (!isset($this->listeners[$eventName])) {
            return;
        }

        foreach ($this->listeners[$eventName] as $index => $attachedListener) {
            if ($attachedListener === $listener) {
                unset($this->listeners[$eventName][$index]);
            }
        }
    }
}
