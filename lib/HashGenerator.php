<?php
/*
 * This file is part of the Graham package.
 *
 * (c) Wojciech Nowicki <wojtek@gettelegramm.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Graham;

/**
 * Class HashGenerator
 *
 * @package Graham
 */
class HashGenerator
{
    const TYPE_SHA256 = 'sha256';

    /**
     * Generates array hash with given $key and algorithm
     *
     * @param  array  $data
     * @param $key
     * @param  string $hashType
     * @return string
     */
    public static function genHash(array $data, $key, $hashType=self::TYPE_SHA256)
    {
        return hash_hmac($hashType, self::flattenValues(self::ksortRecursive($data)), $key);
    }

    public static function genHashFromObject(\stdClass $object, $key, $hashType=self::TYPE_SHA256)
    {
        return self::genHash((array) $object, $key, $hashType);
    }

    /**
     * Flatten multidimensional array values into concatenated string
     *
     * @param  array  $array
     * @return string
     */
    private static function flattenValues(array $array)
    {
        $flatValue = '';
        foreach ($array as $value) {

            if (is_array($value)) {

                $flatValue .= self::flattenValues($value);

            } else {

                $flatValue .= $value;

            }
        }

        return $flatValue;
    }

    /**
     * Sorts array recursively
     *
     * @param  array $array
     * @return array
     */
    private static function ksortRecursive(array $array)
    {
        foreach ($array as $value) {

            if (is_array($value)) self::ksortRecursive($value);

        }

        ksort($array);

        return $array;
    }
}
