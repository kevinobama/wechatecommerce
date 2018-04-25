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
use Lang;

class OrderMessage {

    public static function successfulOrderText($wechatCustomer, $data)
    {
        //$openId = 'ovl_Hv2kfU3QMsCC7xWQNTP9n4Uw';
        $content = Lang::get('wechat_order.successfulOrderText');
        $content = sprintf($content, $data['orderId'], $data['amount']);
        $wechatCustomer->message($content)->to($data['openId'])->send();
    }

    public static function successfulOrderYourGoldMedal($wechatCustomer, $data)
    {
        $content = Lang::get('wechat_order.successfulOrderYourGoldMedal');
        $content = sprintf($content,$data['userName'], $data['userId'],$data['orderDateTime'],$data['orderId'],$data['amount'],$data['commission']);
        $wechatCustomer->message($content)->to($data['openId'])->send();
    }

    public static function successfulOrderYourSilverMedal($wechatCustomer, $data)
    {
        $content = Lang::get('wechat_order.successfulOrderYourSilverMedal');
        $content = sprintf($content,$data['userName'], $data['userId'],$data['orderDateTime'],$data['orderId'],$data['amount'],$data['commission']);
        $wechatCustomer->message($content)->to($data['openId'])->send();
    }

    public static function successfulOrderYourBronzeMedal($wechatCustomer, $data)
    {
        $content = Lang::get('wechat_order.successfulOrderYourBronzeMedal');
        $content = sprintf($content,$data['userName'], $data['userId'],$data['orderDateTime'],$data['orderId'],$data['amount'],$data['commission']);
        $wechatCustomer->message($content)->to($data['openId'])->send();
    }

    public static function sentGoods($wechatCustomer, $data)
    {
        $content = Lang::get('wechat_order.sentGoods');
        $content = sprintf($content,$data['userName'], $data['userId'],$data['orderDateTime'],$data['orderId'],$data['amount'],$data['commission']);
        $wechatCustomer->message($content)->to($data['openId'])->send();
    }
}