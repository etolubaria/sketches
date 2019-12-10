<?php

/**
 * @author Eugene Tolubaria <m203a4@gmail.com>
 */
class BeforeUserRegisterEvent
{
    /**
     * @var string
     */
    private $login;

    /**
     * @param string $login
     */
    public function __construct(string $login)
    {
        $this->login = $login;
    }

    /**
     * @return string
     */
    public function getLogin(): string
    {
        return $this->login;
    }
}
