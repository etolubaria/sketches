<?php

namespace AccessControlExample\Component\Security;

use AccessControlExample\Component\Http\RequestInterface;

class TokenBasedAccessControl implements AccessControlInterface
{
    public function isGranted(RequestInterface $request): bool
    {
        return $request->getToken() === 'valid token';
    }
}
