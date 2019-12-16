<?php

use App\EventDispatcher\Event;
use App\EventDispatcher\EventDispatcher;
use App\EventDispatcher\ListenerProvider;

// objects creation and dependencies resolve
$listenerProvider = new ListenerProvider();
$eventDispatcher = new EventDispatcher($listenerProvider);
$event = new class extends Event {
    public function getName() { return 'My event'; }
};
$listener = function (object $e) {
    echo $e->getName() . ': I was called as event listener';
};

// using the event dispatcher and the listener provider
$listenerProvider->addListener($listener, $event);
// $listenerProvider->removeListener($listener, $event);
// $event->stopPropagation();
$eventDispatcher->dispatch($event);
