<?php

require __DIR__ . '/../vendor/autoload.php';

use EventDispatcherPsr14Example\Component\EventDispatcher\Event;
use EventDispatcherPsr14Example\Component\EventDispatcher\EventDispatcher;
use EventDispatcherPsr14Example\Component\EventDispatcher\ListenerProvider;
use EventDispatcherPsr14Example\Component\EventDispatcher\NamedEventInterface;

// objects creation and dependencies resolve
$listenerProvider = new ListenerProvider();
$eventDispatcher = new EventDispatcher($listenerProvider);

// events and listeners
$event = new class extends Event {
    public function getName(): string
    {
        return 'My event';
    }
};
$listener = static function (NamedEventInterface $event) {
    echo $event->getName() . ' has just happened and was handled by the event listener', PHP_EOL;
};

// example of using the PSR-14 event dispatcher and listener provider
$listenerProvider->addListener($listener, $event->getName());
//$event->stopPropagation();
//$listenerProvider->removeListener($listener, $event->getName());
$eventDispatcher->dispatch($event);
