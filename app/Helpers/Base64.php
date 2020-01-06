<?php
/**
 * base64 相关方法封装
 */

namespace App\Helpers;

class Base64
{
    /**
     * url safe base64 encode.
     *
     * @param string $url
     * @return string
     */
    public static function urlsafeEncode(string $url): string
    {
        return str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($url));
    }

    /**
     * url safe base64 decode.
     *
     * @param string $url
     * @return string
     */
    public function urlsafeDecode(string $url): string
    {
        return base64_decode(str_replace(['-', '_'], ['+', '/'], $url));
    }
}
