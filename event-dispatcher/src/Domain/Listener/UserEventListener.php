<?php

declare(strict_types=1);

namespace EventDispatcherExample\Domain\Listener;

use EventDispatcherExample\Domain\Event\AfterUserRegisterEvent;
use EventDispatcherExample\Domain\Event\BeforeUserRegisterEvent;

/**
 * Class UserEventListener
 *
 * @author Eugene Tolubaria <m203a4@gmail.com>
 */
final class UserEventListener
{
    public function beforeUserRegister(BeforeUserRegisterEvent $event): void
    {
        echo 'Before register: My name is ', $event->getLogin(), PHP_EOL;
    }

    public function afterUserRegister(AfterUserRegisterEvent $event): void
    {
        $user = $event->getUser();
        echo sprintf(
            'After register: [%s] %s (password:%s)',
            (string) ($user->getId() ?? 'not saved'),
            ucfirst($user->getLogin()),
            $user->getPassword()
        ), PHP_EOL;
    }
}
