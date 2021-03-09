<?php

namespace App\Controller;

use App\Component\Security\AccessControlInterface;
use App\Component\Http\RequestInterface;

class ApiController
{
    private AccessControlInterface $accessControl;

    public function __construct(AccessControlInterface $accessControl)
    {
        $this->accessControl = $accessControl;
    }

    public function actionIndex(RequestInterface $request)
    {
        if (!$this->accessControl->isGranted($request)) {
            return 'Access denied';
        }

        return 'Access granted';
    }
}
