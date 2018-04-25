<?php
/**
 * Created by PhpStorm.
 * User: kevingates
 * Date: 10/29/16
 * Time: 4:03 PM
 */
namespace App\Helpers;

use Config;
use App\Helpers\Curl;
use Debugbar;
use App\Helpers\Log;

class CustomerServiceMessage {

    public static function textMessage($accessToken, $openId,$content = '')
    {
        $url = 'https://api.wechat.com/cgi-bin/message/custom/send?access_token='.$accessToken;

        $articleUrl = 'http://mp.weixin.qq.com/s?__biz=MzIxNzUxNDQzMA==&tempkey=6wCSNtXn4vOSRObvE%2BUWJV7hj86bhdEV9SEpUs72CjCokD7OpmnI02PNQhOJ6cap0FUaYLhBXeekJllHECT8AFgZF73z8OEWzmxPS9sf8n%2Bh%2ByH8vHvvwEZHNfgFKODJVq21yeFhDZNGMK1OcB4LsA%3D%3D&chksm=17f9e9d5208e60c3eb3a8ac24717d3f71477dec2b5724232bd4658ca2adc9ae4b424319f3138#rd';
        if (empty($content)) {
            $content = "<a href='{$articleUrl}'>article by kevinGates</a>";
        }
        $parameters = array(
            'touser' => $openId,//ovl_Hv0foRe48tC53PP-DvCh6Fgk,ovl_Hv2kfU3QMsCC7xWQNTP9n4Uw(xuanbao)
            'msgtype' => 'text',
            "text" =>array(
                "content"=> $content
            )
        );
        $response = Curl::postTest($url, $parameters);
        return $response;
    }
}