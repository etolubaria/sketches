<?php

require __DIR__ . '/../vendor/autoload.php';

use PasswordGeneratorExample\Component\Security\PasswordGenerator;

echo "Twenty-char password length:\t\t\t", strlen(PasswordGenerator::generate(20)), PHP_EOL;
echo "Only digits:\t\t\t\t\t", PasswordGenerator::generate(32, PasswordGenerator::DIGITS), PHP_EOL;
echo "Digits and capital letters:\t\t\t", PasswordGenerator::generate(32, PasswordGenerator::DIGITS | PasswordGenerator::CAPITAL_LETTERS), PHP_EOL;
echo "Password of all symbols, except special chars:\t", PasswordGenerator::generate(32, PasswordGenerator::ALL ^ PasswordGenerator::SPECIAL_CHARACTERS), PHP_EOL;
echo "Password contains any available chars:\t\t", PasswordGenerator::generate(32), PHP_EOL;
