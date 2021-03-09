<?php

echo strlen(PasswordGenerator::generate(20)), PHP_EOL;

echo PasswordGenerator::generate(32, PasswordGenerator::DIGITS), PHP_EOL;
echo PasswordGenerator::generate(32, PasswordGenerator::DIGITS | PasswordGenerator::CAPITAL_LETTERS), PHP_EOL;
echo PasswordGenerator::generate(32, PasswordGenerator::ALL ^ PasswordGenerator::SPECIAL_CHARACTERS), PHP_EOL;
