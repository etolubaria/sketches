<?php

use app\enums\Servers;
use app\forms\ServerConfigForm;
use app\queues\Queue;

$queue = new Queue();

$queue->push(['server' => Servers::HELLO, 'other' => 'data']);
$queue->push(['server' => Servers::WORLD, 'other' => 'data']);
$queue->push(['server' => 'some_server',  'other' => 'data']);

while (!$queue->isEmpty()) {
    $serverConfig = $queue->pop();

    $form = new ServerConfigForm($serverConfig);
    if ($form->validate()) {
        echo $serverConfig['server'], ': valid', PHP_EOL;
    } else {
        echo $serverConfig['server'], ': invalid', PHP_EOL;
    }
}
