<?php

declare(strict_types=1);

namespace EmailQueueConsumerExample\Component\Mailer;

/**
 * Implementation is simplified and close to Yii mailer.
 * Note: Yii mailer is a piece of shit.
 *
 * @author Eugene Tolubaria <m203a4@gmail.com>
 */
final class Mailer
{
    private string $subject;
    private string $body;
    private string $from;
    private string $to;

    public string $layout;

    public function compose(string $template, array $context): self
    {
        return $this;
    }

    public function setSubject(string $subject): self
    {
        return $this;
    }

    public function setFrom(string $sender): self
    {
        return $this;
    }

    public function setTo(string $receiver): self
    {
        return $this;
    }

    public function send(): bool
    {
        return true;
    }
}
