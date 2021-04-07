<?php

require __DIR__ . '/../vendor/autoload.php';

use ValueObjectExample\EmailAddress;

$address1 = new EmailAddress('m203a4@gmail.com');
$address2 = new EmailAddress('m203a4@gmail.com', 'Eugene Tolubaria');

echo $address1, PHP_EOL;
echo $address2, PHP_EOL;
