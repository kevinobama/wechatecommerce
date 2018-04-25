<?php
namespace App\Helpers;

use Config;
use App\Helpers\Curl;
use Debugbar;
use App\Helpers\Log;


class WechatApi {
    public static function getToken()
    {
        $appId = Config::get('wechatecommerce.wecahtOauth2.appId');
        $appSecret = Config::get('wechatecommerce.wecahtOauth2.appSecret');

        $url = "https://api.wechat.com/cgi-bin/token?grant_type=client_credential&appid={$appId}&secret={$appSecret}";

        $result = json_decode(Curl::get($url, array()));
        $accessToken = $result->access_token;
        
        return $accessToken;
    }

    public static function generateQRcodeMedia($userId)
    {
        $appId = Config::get('wechatecommerce.wecahtOauth2.appId');
        $appSecret = Config::get('wechatecommerce.wecahtOauth2.appSecret');

        $url = "https://api.wechat.com/cgi-bin/token?grant_type=client_credential&appid={$appId}&secret={$appSecret}";

        $result = json_decode(Curl::get($url, array()));
        $accessToken = $result->access_token;

        $qrcode  = WechatApi::generateQRcode($accessToken, $userId);
        $Image  = WechatApi::getQRcodeImage($qrcode->ticket, $userId);
        $media  = WechatApi::uploadQRcodeImage($accessToken, $userId);
        $media = json_decode($media);

        return $media->media_id;
    }

    //generate temporary QRcode image
    public static function generateQRcode($accessToken, $userId)
    {
        //generate temporary QRcode image
        $url = 'https://api.wechat.com/cgi-bin/qrcode/create?access_token='.$accessToken;
        $parameters = array(
            'expire_seconds' => '2592000',
            'action_name' => 'QR_SCENE',
            'action_info' => array(
                "scene" => array(
                    'scene_id' => $userId,
                    'scene_str' => 'binding'
                )
            ),
        );
        $response = Curl::postJson($url, $parameters);
        $response = json_decode($response);
        return $response;
    }
    public static function getQRcodeImage($ticket,$userId)
    {
        //get temporary QRcode image
        //$imageUrl = "https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket={ $response->ticket }";
        $imageUrl = "https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket=".$ticket;
        $savePath = '/var/www/php/wechatecommerce/public/images/QRCode/'.$userId.'.jpg';
        $imageResponse = Curl::grabImage($imageUrl, $savePath);
        return $imageResponse;
    }
    public static function uploadQRcodeImage($accessToken, $userId)
    {
        //upload temporary QRcode image
        $url = 'Https://api.weixin.qq.com/cgi-bin/media/upload?type=image&access_token='.$accessToken;
        $file_path = curl_file_create('/var/www/php/wechatecommerce/public/images/QRCode/'.$userId.'.jpg');
        
        $parameters = array(
            'media' => $file_path
        );
        $response = Curl::postUpload($url, $parameters);
        return $response;
    }
}