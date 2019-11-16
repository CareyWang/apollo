<?php

namespace App\Services;

use App\Helpers\UrlBuilder;

/**
 * 基于『聚合数据』服务获取彩票开奖结果.
 *
 * Class Lottery
 */
class Lottery
{
    const API_BASE_URL = 'http://apis.juhe.cn/lottery';
    const GET_TYPES_PATH = '/types';
    const QUERY_PATH = '/query';
    const GET_HISTORY_PATH = '/history';

    private $key;

    public function __construct()
    {
        $this->key = config('services.juhe.key');
    }

    /**
     * 获取特定彩种开奖结果.
     *
     * @param string $lotteryId
     * @param string $lotteryNo
     * @return array
     */
    public function get(string $lotteryId, string $lotteryNo = ''): array
    {
        $api = self::API_BASE_URL.self::QUERY_PATH;
        $params = [
            'key' => $this->key,
            'lottery_id' => $lotteryId,
            'lottery_no' => $lotteryNo,
        ];
        $url = UrlBuilder::build($api, $params);
        $response = file_get_contents($url);

        // TODO: 存储结果

        return json_decode($response, true);
    }

    /**
     * 获取特定彩种历史开奖结果.
     *
     * @param string $lotteryId
     * @param string $pageSize
     * @param string $page
     * @return array
     */
    public function getHistory(string $lotteryId, string $pageSize = '', string $page = ''): array
    {
        $api = self::API_BASE_URL.self::GET_HISTORY_PATH;
        $params = [
            'key' => $this->key,
            'lottery_id' => $lotteryId,
            'pageSize' => $pageSize,
            'page' => $page,
        ];
        $url = UrlBuilder::build($api, $params);
        $response = file_get_contents($url);

        // TODO: 存储结果

        return json_decode($response, true);
    }

    /**
     * 获取支持的彩种.
     * @return array
     */
    public function getTypes(): array
    {
        $api = self::API_BASE_URL.self::GET_TYPES_PATH;
        $params = [
            'key' => $this->key,
        ];
        $url = UrlBuilder::build($api, $params);
        $response = file_get_contents($url);

        // TODO: 存储结果

        return json_decode($response, true);
    }
}
