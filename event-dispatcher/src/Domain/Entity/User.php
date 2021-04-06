<?php

declare(strict_types=1);

namespace EventDispatcherExample\Domain\Entity;

/**
 * Class User
 *
 * @author Eugene Tolubaria <m203a4@gmail.com>
 */
class User
{
    private ?int $id;
    private string $login;
    private string $password;

    public function __construct(string $login, string $password)
    {
        try {
            $this->id = random_int(1, 9);
        } catch (\Exception $e) {
            $this->id = null;
        }
        $this->login = $login;
        $this->password = $password;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLogin(): string
    {
        return $this->login;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}
