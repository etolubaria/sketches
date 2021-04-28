<?php

require __DIR__ . '/../vendor/autoload.php';

use UrlHelperExample\Util\UrlHelper;

$url = 'https://www.qwerty.com/path/idx.php?qwe=qweqwe&a[]=rtx&q=kh#anchor';
$additionalParams = ['uuid' => 65465465465];

echo UrlHelper::withQueryParams($url, $additionalParams), PHP_EOL;
