<?php

final class CurrencySign
{
    private static $map = [
        Currency::USD => '$'
    ];

    public static function get(string $currency): string
    {
        return self::$map[$currency] ?? '';
    }
}
