<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Category;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use App\Helpers\Menu;
use App\Helpers\Curl;
use Debugbar;
use Config;

use App\Helpers\Log;
use App\Helpers\WechatApi;

class ApisController extends Controller
{
    //
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * https://api.wechat.com/cgi-bin/qrcode/create?access_token=TOKEN
     * @return void
     */
    public function qrcodeShow()
    {
//        $appId = Config::get('wechatecommerce.wecahtOauth2.appId');
//        $appSecret = Config::get('wechatecommerce.wecahtOauth2.appSecret');
//
//        $url = "https://api.wechat.com/cgi-bin/token?grant_type=client_credential&appid={$appId}&secret={$appSecret}";
//
//        $result = json_decode(Curl::get($url, array()));
//        $accessToken = $result->access_token;
//
//        $url = 'https://api.wechat.com/cgi-bin/qrcode/create?access_token='.$accessToken;
//
//        $parameters = array(
//            'expire_seconds' => '2592000',
//            'action_name' => 'QR_SCENE',
//            'action_info' => array(
//                "scene" => array(
//                    'scene_id' => '1',
//                    'scene_str' => 'binding'
//                )
//            ),
//        );
        //$response = Curl::postJson($url, $parameters);
        //$response= "{'':''}";
        //$response = json_decode($response);
        //Log::create(array('title'=>'wechatUserInfo', 'log_content'=>print_r($response,true)));
        //Debugbar::info($response);

        //Logging::write(print_r($response,true));


        //$materialBatchGetMaterial = $this->materialBatchGetMaterial();
        //$materialBatchGetMaterial = $materialBatchGetMaterial;
        $materialBatchGetMaterial = '';
        //$this->generateQRcodeMediaUpload();
        //WechatApi::generateQRcodeMedia(3);
        //Log::write(json_encode($materialBatchGetMaterial));
        return view('admin.apis.qrcodeShow', compact('response','materialBatchGetMaterial'));
    }
    /**
     * Display a listing of the resource.
     *
     * https://api.wechat.com/cgi-bin/qrcode/create?access_token=TOKEN
     * @return void
     */
    public function materialBatchGetMaterial()
    {
        $appId = Config::get('wechatecommerce.wecahtOauth2.appId');
        $appSecret = Config::get('wechatecommerce.wecahtOauth2.appSecret');

        $url = "https://api.wechat.com/cgi-bin/token?grant_type=client_credential&appid={$appId}&secret={$appSecret}";

        $result = json_decode(Curl::get($url, array()));
        $accessToken = $result->access_token;

        $url = 'https://api.weixin.qq.com/cgi-bin/material/batchget_material?access_token='.$accessToken;
        //image,news
        $parameters = array(
            'type' => 'image',
            'offset' => '0',
            'count' => 20
        );
        $response = Curl::postJson($url, $parameters);
        //$response = json_decode($response);
        //Log::create(array('title'=>'wechatUserInfo', 'log_content'=>print_r($response,true)));

//        $imageUrl = "https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket=gQGB8DoAAAAAAAAAASxodHRwOi8vd2VpeGluLnFxLmNvbS9xL24wUWM0anZsbVVEZ2VOTVVhR3A2AAIEzzsUWAMEAI0nAA==";
//        $savePath = '/var/www/php/wechatecommerce/public/images/QRCode/'.time().'.jpg';
//        $imageResponse = Curl::grabImage($imageUrl, $savePath);
//        Log::write($imageResponse);

        return $response;
    }
    /**
     * Display a listing of the resource.
     *
     * https://api.wechat.com/cgi-bin/qrcode/create?access_token=TOKEN
     * @return void
     */
    public function qrcodeCreate()
    {
        $appId = Config::get('wechatecommerce.wecahtOauth2.appId');
        $appSecret = Config::get('wechatecommerce.wecahtOauth2.appSecret');

        $url = "https://api.wechat.com/cgi-bin/token?grant_type=client_credential&appid={$appId}&secret={$appSecret}";

        $result = json_decode(Curl::get($url, array()));
        $accessToken = $result->access_token;

        $url = 'https://api.wechat.com/cgi-bin/qrcode/create?access_token='.$accessToken;

        $parameters = array(
            'expire_seconds' => '2592000',
            'action_name' => 'QR_SCENE',
            'action_info' => array(
                "scene" => array(
                    'scene_id' => '1',
                    'scene_str' => 'binding'
                )
            ),
        );
        $response = Curl::postJson($url, $parameters);
        $response = json_decode($response);

        $imageUrl = "https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket={{ $response->ticket }}";
        $savePath = '/var/www/php/wechatecommerce/public/images/QRCode/'.time().'.jpg';
        $imageResponse = Curl::grabImage($imageUrl, $savePath);

        return view('admin.apis.qrcodeCreate', compact('response'));
    }

    /**
     * Display a listing of the resource.
     *
     * Https://api.weixin.qq.com/cgi-bin/media/upload?access_token=ACCESS_TOKEN&type=TYPE
     * @return void
     */
    public function mediaUpload()
    {
        $appId = Config::get('wechatecommerce.wecahtOauth2.appId');
        $appSecret = Config::get('wechatecommerce.wecahtOauth2.appSecret');

        $url = "https://api.wechat.com/cgi-bin/token?grant_type=client_credential&appid={$appId}&secret={$appSecret}";

        $result = json_decode(Curl::get($url, array()));
        $accessToken = $result->access_token;

        $url = 'Https://api.weixin.qq.com/cgi-bin/media/upload?type=image&access_token='.$accessToken;
        $file_path = curl_file_create('/var/www/php/wechatecommerce/public/images/QRCode/2.jpg');//realpath('./sample.jpeg');

        $parameters = array(
            'media' => $file_path
        );
        $response = Curl::postUpload($url, $parameters);

        print_r($response);
        //Log::write($response);
    }

    /**
     * Display a listing of the resource.
     *
     * Https://api.weixin.qq.com/cgi-bin/media/upload?access_token=ACCESS_TOKEN&type=TYPE
     * @return void
     */
    public function generateQRcodeMediaUpload()
    {
        $appId = Config::get('wechatecommerce.wecahtOauth2.appId');
        $appSecret = Config::get('wechatecommerce.wecahtOauth2.appSecret');

        $url = "https://api.wechat.com/cgi-bin/token?grant_type=client_credential&appid={$appId}&secret={$appSecret}";

        $result = json_decode(Curl::get($url, array()));
        $accessToken = $result->access_token;
        $userId =3;

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

        //get temporary QRcode image
        $imageUrl = "https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket={ $response->ticket }";
        $savePath = '/var/www/php/wechatecommerce/public/images/QRCode/'.$userId.'.jpg';
        $imageResponse = Curl::grabImage($imageUrl, $savePath);

        //upload temporary QRcode image
        /**
        $url = 'Https://api.weixin.qq.com/cgi-bin/media/upload?type=image&access_token='.$accessToken;
        $file_path = curl_file_create('/var/www/php/wechatecommerce/public/images/QRCode/'.$userId.'.jpg');

        $parameters = array(
            'media' => $file_path
        );
        $response = Curl::postUpload($url, $parameters);
         * **/
        Log::write($imageUrl);
        Log::write(json_encode($response));
    }
}
