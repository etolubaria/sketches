<?php

declare(strict_types=1);

namespace EventDispatcherExample\Domain\Repository;

use EventDispatcherExample\Domain\Entity\User;

/**
 * Class UserRepository
 *
 * @author Eugene Tolubaria <m203a4@gmail.com>
 */
class UserRepository
{
    /**
     * Saves the user entity
     *
     * @param User $user
     *
     * @return bool True if successful, otherwise false
     */
    public function save(User $user): bool
    {
        try {
            return (bool) random_int(0, 1);
        } catch (\Exception $e) {
            return false;
        }
    }
}
