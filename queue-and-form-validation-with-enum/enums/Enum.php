<?php

namespace app\enums;

/**
 * @author Eugene Tolubaria <m203a4@gmail.com>
 */
abstract class Enum
{
    /**
     * @return array
     */
    public static function getValues(): array
    {
        $reflection = new \ReflectionClass(static::class);
        $constants = $reflection->getConstants();

        return array_values($constants);
    }
}
