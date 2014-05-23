<?php
namespace Belt;

use UnexpectedValueException;

class Utilities
{
    const RANDOM_TYPE_ALNUM = 'alnum';
    const RANDOM_TYPE_HEXA = 'hexa';
    const RANDOM_TYPE_ALPHA = 'alpha';
    const RANDOM_TYPE_NUMERIC = 'numeric';

    /**
     * @var array
     */
    private static $randomAlphanum = [
        'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'o', 'j', 'k', 'l',
        'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D',
        'E', 'F', 'G', 'H', 'O', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U',
        'V', 'W', 'X', 'Y', 'Z', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'
    ];

    /**
     * @var array
     */
    private static $randomAlphanumUppercase = [
        'A', 'B', 'C', 'D','E', 'F', 'G', 'H', 'O', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S',
        'T', 'U', 'V', 'W', 'X', 'Y', 'Z', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'
    ];

    /**
     * @var array
     */
    private static $randomAlpha = [
        'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'o', 'j', 'k', 'l',
        'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D',
        'E', 'F', 'G', 'H', 'O', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W',
        'X', 'Y', 'Z'
    ];

    /**
     * @var array
     */
    private static $randomAlphaUppercase = [
        'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'O', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S',
        'T', 'U', 'V', 'W', 'X', 'Y', 'Z'
    ];

    /**
     * @var array
     */
    private static $randomHexa = [
        'A', 'B', 'C', 'D', 'E', 'F', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'
    ];

    /**
     * @var array
     */
    private static $randomNumeric = [
        '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'
    ];

    /**
     * Generate a unique identifier.
     *
     * @param string $prefix
     * @return string
     */
    public static function id($prefix = '')
    {
        return uniqid($prefix, true);
    }

    /**
     * @param int $length
     * @param string $type
     * @param bool $onlyUppercase
     * @return string
     * @throws UnexpectedValueException
     */
    public static function random($length, $type = self::RANDOM_TYPE_ALNUM, $onlyUppercase = false)
    {
        switch ($type) {
            case self::RANDOM_TYPE_ALNUM:
                if ($onlyUppercase) {
                    $chars = self::$randomAlphanumUppercase;
                } else {
                    $chars = self::$randomAlphanum;
                }
                break;
            case self::RANDOM_TYPE_HEXA:
                $chars = self::$randomHexa;
                break;
            case self::RANDOM_TYPE_ALPHA:
                if ($onlyUppercase) {
                    $chars = self::$randomAlphaUppercase;
                } else {
                    $chars = self::$randomAlpha;
                }
                break;
            case self::RANDOM_TYPE_NUMERIC:
                $chars = self::$randomNumeric;
                break;
            default:
                throw new UnexpectedValueException;
                break;
        }

        srand((float)microtime() * 1000000);

        $string = '';

        do {
            shuffle($chars);
            $string .= $chars[mt_rand(0, (count($chars) - 1))];
        } while (strlen($string) < $length);

        return $string;
    }

    /**
     * Escape all HTML entities in a string.
     *
     * @param string $string
     * @return string
     */
    public static function escape($string)
    {
        return htmlentities($string, ENT_QUOTES, 'UTF-8', false);
    }

    /**
     * Return the value passed as the first argument.
     *
     * @param mixed $value
     * @return mixed
     */
    public static function with($value)
    {
        return $value;
    }

    /**
     * Invoke a $closure $number of times.
     *
     * @param integer $number
     * @param callable $closure
     * @return void
     */
    public static function times($number, callable $closure)
    {
        foreach (range(1, $number) as $index) {
            $closure();
        }
    }
}