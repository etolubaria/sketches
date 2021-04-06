<?php

require __DIR__ . '/../vendor/autoload.php';

use AccessControlExample\Component\Http\Request;
use AccessControlExample\Component\Security\TokenBasedAccessControl;
use AccessControlExample\Controller\SomeApiController;

$request = new Request();
$accessControl = new TokenBasedAccessControl();
$controller = new SomeApiController($accessControl);

echo $controller->actionIndex($request), PHP_EOL;
