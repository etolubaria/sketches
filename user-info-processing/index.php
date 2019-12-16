<?php

use Command\ProcessingCommand;
use Enum\FormatType;

$request = [
    'firstName'     => 'Vasya',
    'lastName'      => 'Pupkin',
    'dateOfBirth'   => '1984-07-31',
    'Salary'        => '1000',
    'creditScore'   => 'good',
];

$command = new ProcessingCommand();
$command->execute(FormatType::JSON, $userInfo);
