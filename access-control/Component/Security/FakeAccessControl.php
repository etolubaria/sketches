<?php

namespace App\Component\Security;

use App\Component\Http\RequestInterface;

class FakeAccessControl implements AccessControlInterface
{
    public function isGranted(RequestInterface $request): bool
    {
        // always a positive result
        return true;
    }
}
