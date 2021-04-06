<?php

declare(strict_types=1);

namespace AccessControlExample\Component\Security;

use AccessControlExample\Component\Http\RequestInterface;

interface AccessControlInterface
{
    public function isGranted(RequestInterface $request): bool;
}
