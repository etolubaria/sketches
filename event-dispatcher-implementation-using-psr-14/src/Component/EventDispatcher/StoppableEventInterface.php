<?php

declare(strict_types=1);

namespace EventDispatcherPsr14Example\Component\EventDispatcher;

use Psr\EventDispatcher\StoppableEventInterface as PsrStoppableEventInterface;

/**
 * Interface StoppableEventInterface
 *
 * @author Eugene Tolubaria <m203a4@gmail.com>
 */
interface StoppableEventInterface extends PsrStoppableEventInterface
{
    /**
     * Stops the event propagation
     */
    public function stopPropagation(): void;
}
