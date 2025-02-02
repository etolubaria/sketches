<?php

namespace app\enums;

/**
 * The base class of the enumerated types
 *
 * @author Eugene Tolubaria <m203a4@gmail.com>
 */
abstract class Enum implements EnumInterface
{
    /**
     * @return array
     *
     * @throws \ReflectionException
     */
    private static function getConstants(): array
    {
        $reflection = new \ReflectionClass(static::class);

        return $reflection->getConstants();
    }

    /**
     * @inheritDoc
     */
    public static function getValues(): array
    {
        return array_values(static::getConstants());
    }

    /**
     * @inheritDoc
     */
    public static function getKeys(): array
    {
        return array_keys(static::getConstants());
    }

    /**
     * @inheritDoc
     */
    public static function hasValue($value): bool
    {
        return in_array($value, static::getValues());
    }

    /**
     * @inheritDoc
     */
    public static function hasKey(string $key): bool
    {
        return in_array($key, static::getKeys());
    }
}
