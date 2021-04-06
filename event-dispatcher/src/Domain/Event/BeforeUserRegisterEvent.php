<?php

declare(strict_types=1);

namespace EventDispatcherExample\Domain\Event;

/**
 * Class BeforeUserRegisterEvent
 *
 * @author Eugene Tolubaria <m203a4@gmail.com>
 */
final class BeforeUserRegisterEvent
{
    private string $login;

    public function __construct(string $login)
    {
        $this->login = $login;
    }

    public function getLogin(): string
    {
        return $this->login;
    }
}
