<?php

namespace App\EventDispatcher;

use Psr\EventDispatcher\StoppableEventInterface as PsrStoppableEventInterface;

/**
 * @author Eugene Tolubaria <m203a4@gmail.com>
 */
interface StoppableEventInterface extends PsrStoppableEventInterface
{
    /**
     * Stops the event propagation
     */
    public function stopPropagation(): void;
}
