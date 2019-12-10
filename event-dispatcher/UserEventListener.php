<?php

/**
 * @author Eugene Tolubaria <m203a4@gmail.com>
 */
class UserEventListener
{
    /**
     * @param BeforeUserRegisterEvent $event
     */
    public function beforeUserRegister(BeforeUserRegisterEvent $event)
    {
        echo 'Before register: My name is ', $event->getLogin(), PHP_EOL;
    }

    /**
     * @param AfterUserRegisterEvent $event
     */
    public function afterUserRegister(AfterUserRegisterEvent $event)
    {
        $user = $event->getUser();
        echo sprintf('After register: %d. %s (%s).', $user->getId(), ucfirst($user->getLogin()), $user->getPassword()), PHP_EOL;
    }
}
