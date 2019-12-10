<?php

// Creating objects and resolving dependencies
$eventDispatcher = new EventDispatcher();
$userManager = new UserManager($eventDispatcher);
$userEventListener = new UserEventListener();

// Listeners registration
$eventDispatcher->bind('user.register.before', [$userEventListener, 'beforeUserRegister']);
$eventDispatcher->bind('user.register.after', [$userEventListener, 'afterUserRegister']);
$eventDispatcher->bind('user.register.before', function () {
    echo 'Before register: it will also called!', PHP_EOL;
});

// Some logic
$userManager->register('Eugene Tolubaria', 'Q59Az1hf');
