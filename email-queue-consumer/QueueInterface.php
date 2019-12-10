<?php

/**
 * @author Eugene Tolubaria <m203a4@gmail.com>
 */
interface QueueInterface
{
    public function getName(): string;
    public function push(object $data);
    public function pop(): object;
    public function peek(): object;
    public function size(): int;
    public function isEmpty(): bool;
    public function clear();
}
