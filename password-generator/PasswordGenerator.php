<?php

declare(strict_types=1);

class PasswordGenerator
{
    /**
     * Minimum and maximum password length
     */
    public const LENGTH_MIN = 1;
    public const LENGTH_MAX = 256;

    /**
     * A group of options
     */
    public const DIGITS             = 1;
    public const SMALL_LETTERS      = 2;
    public const CAPITAL_LETTERS    = 4;
    public const SPECIAL_CHARACTERS = 8;
    public const ALL                = 15;

    /**
     * A group of patterns (character sets) corresponding to certain options
     */
    private const SET_OF_DIGITS             = '1234567890';
    private const SET_OF_SMALL_LETTERS      = 'abcdefghijklmnpqrstuwxyz';
    private const SET_OF_CAPITAL_LETTERS    = 'ABCDEFGHJKLMNPQRSTUWXYZ';
    private const SET_OF_SPECIAL_CHARACTERS = '~!@#$%^&*()-_=+]}[{';

    /**
     * Returns a character set for the subsequent password generation
     * using bit masks for the selected options.
     *
     * @param int $options
     *
     * @return string
     */
    private static function generatePattern(int $options): string
    {
        $pattern = '';
        if ($options & self::DIGITS) {
            $pattern .= self::SET_OF_DIGITS;
        }
        if ($options & self::SMALL_LETTERS) {
            $pattern .= self::SET_OF_SMALL_LETTERS;
        }
        if ($options & self::CAPITAL_LETTERS) {
            $pattern .= self::SET_OF_CAPITAL_LETTERS;
        }
        if ($options & self::SPECIAL_CHARACTERS) {
            $pattern .= self::SET_OF_SPECIAL_CHARACTERS;
        }

        return $pattern;
    }

    /**
     * Generates a password of a given length
     *
     * There is also a choice of which characters the password can contain:
     * ```php
     * // generate a 12-chars password containing digits, capital and small letters, and special chars
     * $password = PasswordGenerator::generate(12);
     *
     * // generate a 32-chars password containing only digits
     * $password = PasswordGenerator::generate(32, PasswordGenerator::DIGITS);
     *
     * // generate an 8-chars password containing all available symbols except special chars
     * $password = PasswordGenerator::generate(8, PasswordGenerator::ALL ^ PasswordGenerator::SPECIAL_CHARACTERS);
     *
     * // generate an 8-chars password containing only capital and small letters
     * $password = PasswordGenerator::generate(8, PasswordGenerator::CAPITAL_LETTERS | PasswordGenerator::SMALL_LETTERS);
     * ```
     *
     * @param int $length
     * @param int $options
     *
     * @return string
     *
     * @throws \Exception
     */
    public static function generate(int $length, int $options = self::ALL): string
    {
        if ($length < self::LENGTH_MIN) {
            throw new \InvalidArgumentException('Password is too small');
        }
        if ($length > self::LENGTH_MAX) {
            throw new \InvalidArgumentException('Password is too long');
        }
        $pattern = self::generatePattern($options);
        if ('' === $pattern) {
            throw new \InvalidArgumentException('Options are invalid');
        }

        $password = '';
        for ($i = 0; $i < $length; $i++) {
            $password .= $pattern[random_int(0, strlen($pattern) - 1)];
        }

        return $password;
    }
}
