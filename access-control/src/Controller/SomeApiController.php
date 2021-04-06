<?php

declare(strict_types=1);

namespace AccessControlExample\Controller;

use AccessControlExample\Component\Security\AccessControlInterface;
use AccessControlExample\Component\Http\RequestInterface;

class SomeApiController
{
    private AccessControlInterface $accessControl;

    public function __construct(AccessControlInterface $accessControl)
    {
        $this->accessControl = $accessControl;
    }

    public function actionIndex(RequestInterface $request): string
    {
        if (!$this->accessControl->isGranted($request)) {
            return 'Access denied';
        }

        return 'Access granted';
    }
}
