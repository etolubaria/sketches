<?php

/**
 * @author Eugene Tolubaria <m203a4@gmail.com>
 */
interface NotificationInterface
{
    public function getSubject(): string;
    public function getLayout(): string;
    public function getTemplate(): string;
    public function getContext(): array;
    public function getSender(): string;
    public function getReceiver(): string;
}
