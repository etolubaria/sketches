<?php

require __DIR__ . '/../vendor/autoload.php';

use EventDispatcherExample\Component\EventDispatcher\EventDispatcher;
use EventDispatcherExample\Domain\Listener\UserEventListener;
use EventDispatcherExample\Domain\Repository\UserRepository;
use EventDispatcherExample\Domain\Service\UserRegistrar;

// Creating objects and resolving dependencies
$eventDispatcher = new EventDispatcher();
$userRepository = new UserRepository();
$userRegistrar = new UserRegistrar($eventDispatcher, $userRepository);
$userEventListener = new UserEventListener();

// Listeners registration
$eventDispatcher->bind('user.register.before', [$userEventListener, 'beforeUserRegister']);
$eventDispatcher->bind('user.register.after', [$userEventListener, 'afterUserRegister']);
$eventDispatcher->bind('user.register.before', static function () {
    echo 'Before register: It will also be called to perform some actions', PHP_EOL;
});

// Some logic
$userRegistrar->register('Eugene Tolubaria', 'super_secure_password');
