<?php

declare(strict_types=1);

namespace ValueObjectExample;

/**
 * Email address value object
 *
 * @author Eugene Tolubaria <m203a4@gmail.com>
 */
class EmailAddress
{
    /**
     * @var string
     */
    private string $email;

    /**
     * @var string|null
     */
    private ?string $name;

    /**
     * @param string $email
     * @param string|null $name
     */
    public function __construct(string $email, ?string $name = null)
    {
        $this->email = $email;
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        if (null === $this->name) {
            return $this->email;
        }

        return sprintf('%s<%s>', $this->name, $this->email);
    }
}
