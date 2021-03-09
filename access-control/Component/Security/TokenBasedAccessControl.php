<?php

namespace App\Component\Security;

use App\Component\Http\RequestInterface;

class TokenBasedAccessControl implements AccessControlInterface
{
    public function isGranted(RequestInterface $request): bool
    {
        // some complicated logic
        return (bool) random_int(0, 1);
    }
}
