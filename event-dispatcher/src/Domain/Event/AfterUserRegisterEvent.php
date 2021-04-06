<?php

declare(strict_types=1);

namespace EventDispatcherExample\Domain\Event;

use EventDispatcherExample\Domain\Entity\User;

/**
 * Class AfterUserRegisterEvent
 *
 * @author Eugene Tolubaria <m203a4@gmail.com>
 */
final class AfterUserRegisterEvent
{
    private User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getUser(): User
    {
        return $this->user;
    }
}
