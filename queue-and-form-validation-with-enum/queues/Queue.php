<?php

namespace app\queues;

/**
 * @author Eugene Tolubaria <m203a4@gmail.com>
 */
class Queue implements QueueInterface
{
    /**
     * @var array
     */
    private $data = [];

    /**
     * @param array $payload
     */
    public function push(array $payload): void
    {
        array_push($this->data, $payload);
    }

    /**
     * @return array
     */
    public function pop(): array
    {
        return array_pop($this->data);
    }

    /**
     * @return bool
     */
    public function isEmpty(): bool
    {
        return count($this->data) === 0;
    }

    /**
     * Dumps internal queue data
     */
    public function dump(): void
    {
        var_dump($this->data);
    }
}
