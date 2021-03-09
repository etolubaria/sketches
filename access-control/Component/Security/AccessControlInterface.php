<?php

namespace App\Component\Security;

use App\Component\Http\RequestInterface;

interface AccessControlInterface
{
    public function isGranted(RequestInterface $request): bool;
}
