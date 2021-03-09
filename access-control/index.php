<?php

use App\Component\Http\Request;
use App\Component\Security\TokenBasedAccessControl;
use App\Controller\ApiController;

$request = new Request();
$accessControl = new TokenBasedAccessControl();
$controller = new ApiController($accessControl);

echo $controller->actionIndex($request);
