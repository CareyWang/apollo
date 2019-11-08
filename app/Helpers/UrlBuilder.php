<?php


namespace App\Helpers;


class UrlBuilder
{
    /**
     * 根据 baseUrl 与参数构造 url
     * @param string $baseUrl
     * @param array|object $params
     * @return string
     */
    public static function build(string $baseUrl, $params): string
    {
        return $baseUrl . '?' . http_build_query($params);
    }
}