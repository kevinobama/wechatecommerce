<?php
namespace App\Http\Controllers\Store;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Helpers\Log;
use App\Helpers\WechatApi;
use App\Helpers\WechatMessage;
use App\User;
use DB;
use App\Helpers\UserHelper;
use Lang;
use App\Helpers\DateTimeHelper;

define("TOKEN", "buffercasualty");

class WechatCallbackController extends Controller
{
    public function index()
    {
        $this->valid();
        $this->responseMsg();
    }

    public function valid()
    {
        $echoStr = isset($_GET["echostr"]) ? $_GET["echostr"] : '';

        Log::write(file_get_contents("php://input"));

        //valid signature , option
        if($this->checkSignature()){
            echo $echoStr;
            if($echoStr) {
                exit;
            }
            //Logger::write('vaild:'.$echoStr);
        } else {
            echo("invaild:". $echoStr);
            //Logger::write('invaild:'.$echoStr);
            exit;
        }
    }

    public function responseMsg()
    {
        $input = file_get_contents("php://input");
        libxml_disable_entity_loader(true);
        $message = simplexml_load_string($input, 'SimpleXMLElement', LIBXML_NOCDATA);

        if (trim($message->Event) === 'subscribe' && $message->EventKey) {
            $fromUserName = $message->FromUserName;
            if ($message->EventKey) {
                $eventKey = str_replace("qrscene_","", $message->EventKey);
                UserHelper::createUserByFollowWechat($fromUserName, $eventKey);
                WechatMessage::textMessage($input, '欢迎来到world女王.');
//                $user = User::where('open_id', $fromUserName)->first();;
//                if ($user->promotion == 0) {
//                    User::where('open_id', $fromUserName)->update(['promotion' => $eventKey]);
//                    //push message to owner
//                    $parentUser=User::find($eventKey);
//
//                    $content = $user->name.'刚扫了你的二维码，成了你的下线.';
//                    WechatMessage::textMessage($input, $content, $parentUser->open_id);
//                } else {
//                    WechatMessage::textMessage($input, '你已经绑定');
//                }
            }
        } elseif (trim($message->Event) === 'CLICK') {
            if($message->EventKey == 'world_queen_my_QRcode') {
                $fromUserName = $message->FromUserName;//user open id
                $user = User::where('open_id', $fromUserName)->firstOrFail();
                if ($user->orders->count() === 0 ) {
                    $content = "你不是代言人,请购买";
                    WechatMessage::textMessage($input, $content);
                } else {
                    $MediaId = $user->qr_code_media_id;
                    $expireDateTime = date('Y-m-d H:i:s', strtotime('+3 day', strtotime($user->qr_code_media_datetime)));

                    //get media id
                    if($MediaId && DateTimeHelper::compareDateTime($expireDateTime, date('Y-m-d H:i:s'))) {
                        WechatMessage::imageMessage($input,$MediaId);
                    } else {
                        $mediaId = WechatApi::generateQRcodeMedia($user->id);
                        $user->qr_code_media_id = $mediaId;
                        $user->qr_code_media_datetime = date('Y-m-d H:i:s');
                        $user->save();
                        WechatMessage::imageMessage($input,$MediaId);
                    }
                }
            } elseif($message->EventKey == 'world_queen_I_am_salesman') {
                $mediaId = "r8yz-e9wH-BMuNrT4qYq6Kvl8YbIGlroDT7n0i8ZM2g";
                WechatMessage::imageMessage($input, $mediaId);
            } elseif($message->EventKey == 'world_queen_user_guide') {
                    WechatMessage::textMessage($input, Lang::get('user_guide.user_guide_content'));
            } else {
                $articleUrl = 'http://mp.weixin.qq.com/s?__biz=MzIxNzUxNDQzMA==&tempkey=6wCSNtXn4vOSRObvE%2BUWJV7hj86bhdEV9SEpUs72CjCokD7OpmnI02PNQhOJ6cap0FUaYLhBXeekJllHECT8AFgZF73z8OEWzmxPS9sf8n%2Bh%2ByH8vHvvwEZHNfgFKODJVq21yeFhDZNGMK1OcB4LsA%3D%3D&chksm=17f9e9d5208e60c3eb3a8ac24717d3f71477dec2b5724232bd4658ca2adc9ae4b424319f3138#rd';
                $content = "hi user,You clicked ".$message->EventKey.",<a href='{$articleUrl}'>article</a>";
                WechatMessage::textMessage($input, $content);
            }
        } else {
            $content = "欢迎来到女王的世界!".date('Y-m-d H:i:s');
            WechatMessage::textMessage($input, $content);
        }
    }

    private function checkSignature()
    {
        // you must define TOKEN by yourself
        if (!defined("TOKEN")) {
            throw new Exception('TOKEN is not defined!');
        }

        $signature = isset($_GET["signature"]) ? $_GET["signature"] : '';
        $timestamp = isset($_GET["timestamp"]) ? $_GET["timestamp"] : '';
        $nonce = isset($_GET["nonce"]) ? $_GET["nonce"] : '';

        $token = TOKEN;
        $tmpArr = array($token, $timestamp, $nonce);
        // use SORT_STRING rule
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode( $tmpArr );
        $tmpStr = sha1( $tmpStr );

        if( $tmpStr == $signature ){
            return true;
        }else{
            return false;
        }
    }
}
