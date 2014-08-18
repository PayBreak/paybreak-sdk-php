<?php
/*
 * This file is part of the PayBreak\Sdk package.
 *
 * (c) PayBreak <dev@paybreak.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PayBreak\Sdk;

/**
 * Class FieldEncoder
 *
 * @author WN
 * @package PayBreak\Sdk
 */
class FieldEncoder
{
    /**
     * Encode field data
     *
     * @param  array  $data
     * @return string
     */
    public static function encodeField(array $data)
    {
        return base64_encode(json_encode($data));
    }

    /**
     * Decode field data
     *
     * @param  string $content
     * @return array
     */
    public static function decodeField($content)
    {
        return json_decode(base64_decode($content), true);
    }
}
