<?php

declare(strict_types=1);

namespace EventDispatcherPsr14Example\Component\EventDispatcher;

/**
 * Interface NamedEventInterface
 *
 * @author Eugene Tolubaria <m203a4@gmail.com>
 */
interface NamedEventInterface
{
    /**
     * Returns the event name
     */
    public function getName(): string;
}
