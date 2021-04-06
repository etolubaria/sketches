<?php

declare(strict_types=1);

namespace EventDispatcherExample\Domain\Service;

use EventDispatcherExample\Component\EventDispatcher\EventDispatcherInterface;
use EventDispatcherExample\Domain\Entity\User;
use EventDispatcherExample\Domain\Event\AfterUserRegisterEvent;
use EventDispatcherExample\Domain\Event\BeforeUserRegisterEvent;
use EventDispatcherExample\Domain\Repository\UserRepository;

/**
 * Class UserRegistrar
 *
 * @author Eugene Tolubaria <m203a4@gmail.com>
 */
final class UserRegistrar
{
    private EventDispatcherInterface $eventDispatcher;
    private UserRepository $userRepository;

    public function __construct(EventDispatcherInterface $eventDispatcher, UserRepository $userRepository)
    {
        $this->eventDispatcher = $eventDispatcher;
        $this->userRepository = $userRepository;
    }

    /**
     * Registers the user in the system
     *
     * @param string $login
     * @param string $password
     */
    public function register(string $login, string $password): void
    {
        $this->eventDispatcher->dispatch('user.register.before', new BeforeUserRegisterEvent($login));

        $user = new User($login, $password);
        $this->userRepository->save($user);

        $this->eventDispatcher->dispatch('user.register.after', new AfterUserRegisterEvent($user));
    }
}
