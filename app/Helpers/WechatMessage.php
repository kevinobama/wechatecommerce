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

class WechatMessage {

    public static function textMessage($postData, $content, $fromUserName='')
    {
        if (!empty($postData)){
            libxml_disable_entity_loader(true);
            $message = simplexml_load_string($postData, 'SimpleXMLElement', LIBXML_NOCDATA);
            if (empty($fromUserName)) {
                $fromUserName = $message->FromUserName;//open id
            }
            $toUserName = $message->ToUserName;//Official Account
            $time = time();

            $textTpl = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							<Content><![CDATA[%s]]></Content>
							<FuncFlag>0</FuncFlag>
							</xml>";
            
            $result = sprintf($textTpl, $fromUserName, $toUserName, $time, "text", $content);

            echo $result;
        }
    }

    public static function imageMessage($postData,$mediaId = '')
    {
        libxml_disable_entity_loader(true);
        $message = simplexml_load_string($postData, 'SimpleXMLElement', LIBXML_NOCDATA);
        $fromUserName = $message->FromUserName;
        $toUserName = $message->ToUserName;
        $time = time();

        $textTpl = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							<Image>
							<MediaId><![CDATA[%s]]></MediaId>
							</Image>
							<FuncFlag>0</FuncFlag>
							</xml>";

        $msgType = "image";
        
        $resultStr = sprintf($textTpl, $fromUserName, $toUserName, $time, $msgType, $mediaId);
        echo $resultStr;
        }
}