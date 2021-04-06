<?php

declare(strict_types=1);

namespace AccessControlExample\Component\Security;

use AccessControlExample\Component\Http\RequestInterface;

class FakeAccessControl implements AccessControlInterface
{
    public function isGranted(RequestInterface $request): bool
    {
        // always a positive result
        return true;
    }
}
