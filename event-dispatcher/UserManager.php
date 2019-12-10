<?php

/**
 * @author Eugene Tolubaria <m203a4@gmail.com>
 */
class UserManager
{
    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    /**
     * @param EventDispatcherInterface $eventDispatcher
     */
    public function __construct(EventDispatcherInterface $eventDispatcher)
    {
        $this->eventDispatcher = $eventDispatcher;
    }

    /**
     * Registers the user in the system
     *
     * @param string $login
     * @param string $password
     */
    public function register(string $login, string $password)
    {
        $this->eventDispatcher->dispatch('user.register.before', new BeforeUserRegisterEvent($login));

        $user = new User($login, $password);

        $this->eventDispatcher->dispatch('user.register.after', new AfterUserRegisterEvent($user));
    }
}
