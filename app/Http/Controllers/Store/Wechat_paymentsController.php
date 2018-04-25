<?php

namespace App\Http\Controllers\Store;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;
use Debugbar;
use App\Models\Order;
use Session;
use App\Helpers\Log;
use App\User;

use JsApiPay;
use WxPayUnifiedOrder;
use WxPayConfig;
use WxPayApi;
use WxPayNotify;
use WxPayOrderQuery;
use App\Helpers\CustomerServiceMessage;
use App\Helpers\WechatApi;
use Wechat;
use Lang;
use App\Helpers\OrderMessage;
use Log as Logger;
use Config;
use SimpleXMLElement;

class Wechat_paymentsController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function notify(Request $request)
    {
        $apiPath = app_path().'/Helpers/wechat_payment/';
        require_once $apiPath. "lib/WxPay.Api.php";
        require_once $apiPath."example/WxPay.JsApiPay.php";
        require_once $apiPath.'lib/WxPay.Notify.php';

        $postData = file_get_contents('php://input');
        $postDataObj = simplexml_load_string($postData, 'SimpleXMLElement', LIBXML_NOCDATA);
        $data["transaction_id"] = $postDataObj->transaction_id;

        header("Content-type: text/html; charset=utf-8");
        //$data['out_trade_no'] = $postDataObj->out_trade_no;
        Log::write('wechat notify');
        Log::write($postData);

        $message = "";
        if(!array_key_exists("transaction_id", $data)){
            $message = "输入参数不正确";
            exit($message);
        }
        //查询订单，判断订单真实性
        if(!$this->Queryorder($data["transaction_id"])){
            $message = "query order failed";            
        } else {
            $currentOrder = $order = Order::where('out_trade_no', $postDataObj->out_trade_no)->firstOrFail();
            if ($order->status === 'Processing') {
                //Log::write('notify repeat,order was successfully.');
                Logger::info('notify repeat,order was successfully.');
            } else {
                $order->status = 'Processing';
                $order->transaction_id = $data["transaction_id"];
                $order->payment_status = 1;
                $order->save();
                //push message to user
                Log::write('open id='.(string)$postDataObj->openid);
                $wechatCustomer = Wechat::staff();
                $data = array(
                    'openId' => (string)$postDataObj->openid,
                    'orderId' => $postDataObj->out_trade_no,
                    'amount' => $currentOrder->total_amount
                );
                OrderMessage::successfulOrderText($wechatCustomer, $data);// this is order owner user
                Logger::info('successfulOrderText');
                if ((int)$order->user['parent_user_id_one'] > 0) {
                    $parentUser = User::find($order->user['parent_user_id_one']);
                    //Logger::info((array)$parentUser);
                    $data = array(
                        'openId' => (string)$parentUser->open_id,//parent user open id
                        'amount' => $currentOrder->total_amount,
                        'userName' => $order->customer_name,
                        'userId' => $order->customer_id,
                        'orderDateTime' => $order->created_at,
                        'orderId' => $postDataObj->out_trade_no,
                        'commission' => $currentOrder->total_amount * Config::get('wechatecommerce.commission_rate.goldMedal')
                    );
                    OrderMessage::successfulOrderYourGoldMedal($wechatCustomer, $data);
                    Logger::info('goldMedal');
                }
                if ((int)$order->user['parent_user_id_two'] > 0) {
                    $parentUser = User::find($order->user['parent_user_id_two']);
                    //Logger::info((array)$parentUser);
                    $data = array(
                        'openId' => (string)$parentUser->open_id,//parent user open id
                        'amount' => $currentOrder->total_amount,
                        'userName' => $order->customer_name,
                        'userId' => $order->customer_id,
                        'orderDateTime' => $order->created_at,
                        'orderId' => $postDataObj->out_trade_no,
                        'commission' => $currentOrder->total_amount * Config::get('wechatecommerce.commission_rate.silverMedal')
                    );
                    OrderMessage::successfulOrderYourSilverMedal($wechatCustomer, $data);
                    Logger::info('silverMedal');
                }
                if ((int)$order->user['parent_user_id_three'] > 0) {
                    $parentUser = User::find($order->user['parent_user_id_three']);
                    //Logger::info((array)$parentUser);
                    $data = array(
                        'openId' => (string)$parentUser->open_id,//parent user open id
                        'amount' => $currentOrder->total_amount,
                        'userName' => $order->customer_name,
                        'userId' => $order->customer_id,
                        'orderDateTime' => $order->created_at,
                        'orderId' => $postDataObj->out_trade_no,
                        'commission' => $currentOrder->total_amount * Config::get('wechatecommerce.commission_rate.bronzeMedal')
                    );
                    OrderMessage::successfulOrderYourBronzeMedal($wechatCustomer, $data);
                    Logger::info('bronzeMedal');
                }
                //Log::write($message);
                Log::write('notify end');
            }
            header("Content-type: text/xml");
            $returnXML=new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?><xml />');
            $returnXML->addchild("return_code","SUCCESS");
            $returnXML->addchild("return_msg", "OK");
            $message=$returnXML->asXml();
        }
        echo($message);
        Log::write($message);
    }

    //查询订单
    public function Queryorder($transaction_id)
    {
        $input = new WxPayOrderQuery();
        $input->SetTransaction_id($transaction_id);
        $result = WxPayApi::orderQuery($input);

        if(array_key_exists("return_code", $result)
            && array_key_exists("result_code", $result)
            && $result["return_code"] == "SUCCESS"
            && $result["result_code"] == "SUCCESS")
        {
            return true;
        }
        return false;
    }
}
