<?php

declare(strict_types=1);

namespace EventDispatcherPsr14Example\Component\EventDispatcher;

/**
 * Class Event
 *
 * @author Eugene Tolubaria <m203a4@gmail.com>
 */
abstract class Event implements StoppableEventInterface, NamedEventInterface
{
    private bool $propagationStopped = false;

    public function stopPropagation(): void
    {
        $this->propagationStopped = true;
    }

    public function isPropagationStopped(): bool
    {
        return $this->propagationStopped;
    }
}
