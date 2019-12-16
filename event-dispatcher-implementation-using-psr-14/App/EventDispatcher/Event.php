<?php

namespace App\EventDispatcher;

/**
 * @author Eugene Tolubaria <m203a4@gmail.com>
 */
abstract class Event implements StoppableEventInterface
{
    /**
     * @var bool
     */
    private $propagationStopped = false;

    /**
     * @inheritDoc
     */
    public function stopPropagation(): void
    {
        $this->propagationStopped = true;
    }

    /**
     * @inheritDoc
     */
    public function isPropagationStopped(): bool
    {
        return $this->propagationStopped;
    }
}
