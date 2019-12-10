<?php

namespace app\enums;

/**
 * Describes enumerated types.
 *
 * An enumerated type is a data type consisting of a set of named values.
 * The enumerator names are identifiers that behave like constants.
 * Classes inheritors must contain a set of constants having a common context.
 *
 * @author Eugene Tolubaria <m203a4@gmail.com>
 */
interface EnumInterface
{
    /**
     * Returns all constant values
     *
     * @return array
     */
    public static function getValues(): array;

    /**
     * Returns all constant names
     *
     * @return array
     */
    public static function getKeys(): array;

    /**
     * Returns true if it has a constant with such value
     *
     * @param mixed $value
     *
     * @return bool
     */
    public static function hasValue($value): bool;

    /**
     * Returns true if it has a constant with such name
     *
     * @param string $key
     *
     * @return bool
     */
    public static function hasKey(string $key): bool;
}
