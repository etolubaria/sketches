<?php

namespace app\queues;

/**
 * @author Eugene Tolubaria <m203a4@gmail.com>
 */
interface QueueInterface
{
    /**
     * Push a new item into the queue
     *
     * @param array $payload
     */
    public function push(array $payload): void;

    /**
     * Remove and return the value of the queue head
     *
     * @return array
     */
    public function pop();

    /**
     * Check the queue for emptiness
     *
     * @return bool
     */
    public function isEmpty(): bool;
}
