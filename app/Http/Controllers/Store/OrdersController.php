<?php

namespace App\Http\Controllers\Store;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Debugbar;
use App\Models\Order;
use Session;
use App\User;
use JsApiPay;
use WxPayUnifiedOrder;
use WxPayConfig;
use WxPayApi;
use Config;
use App\Models\Customer_address;
use App\Models\Log;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Config::get('wechatecommerce.open_id')) {
            $currentUserOpenId = Config::get('wechatecommerce.open_id');
        } else {
            $currentUserOpenId = Session::get('currentUserOpenId');
        }

        $user = User::where('open_id', $currentUserOpenId)->firstOrFail();

        $orders = Order::where('customer_id', $user->id)->orderBy('id', 'desc')->paginate(10);

        return view('store.orders.index',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //\Log::DEBUG("my orders");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$this->validate($request, ['id' => 'required', 'repeat_purchase_amount' => 'required', 'increment_id' => 'required', 'customer_id' => 'required', 'product_id' => 'required', 'quantity' => 'required', 'single_amount' => 'required', 'total_amount' => 'required', 'status' => 'required', 'customer_email' => 'required', 'customer_name' => 'required', 'customer_address' => 'required', 'remote_ip' => 'required', 'shipping_method' => 'required', 'x_forwarded_for' => 'required', 'customer_note' => 'required', 'total_item_count' => 'required', 'customer_gender' => 'required', 'shipping_arrival_date' => 'required', 'created_at' => 'required', 'updated_at' => 'required', ]);
        //Log::create(array('title'=>'Session userId', 'log_content'=> Session::get('userId')));
        $user = User::findOrFail(Session::get('userId'));
        $input = $request->all();

        $openId = Session::get('currentUserOpenId');
        $totalAmount = $input['single_amount'] * (int)$input['quantity'];
        if ($input['shipping_fee']) {
            $totalAmount = $totalAmount + $input['shipping_fee'];
        }
        $setFields = array(
            'increment_id' => time(),
            'customer_id' => $user->id,
            'customer_name' => $user->name,
            'status' => 'New',
            'total_amount' => $totalAmount,
            'customer_address' => $user->name);
        $fields = array_merge($request->all(), $setFields);
        $order = Order::create($fields);

        Session::flash('flash_message', 'Order added!');

        return redirect('store/orders/'.$order->id."/edit");
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function result($id)
    {
        //Debugbar::disable();
        $order = Order::findOrFail($id);

        $order->update(array('status' =>'Processing', 'updated_at' => date('Y-m-d H:i:s')));

        return view('store.orders.result', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $apiPath = app_path().'/Helpers/wechat_payment/';
        require_once $apiPath. "lib/WxPay.Api.php";
        require_once $apiPath."example/WxPay.JsApiPay.php";

        $order = Order::findOrFail($id);
        $customerAddress = Customer_address::firstOrNew(array('user_id' => $order->customer_id));
        //①、获取用户openid
        $tools = new JsApiPay();
        if(Config::get('app.env') == 'production') {
            $openId = $tools->GetOpenid();
        }

        //获取共享收货地址js函数参数
        $editAddress = $tools->GetEditAddressParameters();
        //Log::write($editAddress);
        //Log::create(array('title'=>'editAddress', 'log_content'=>print_r($editAddress,true)));

        return view('store.orders.edit', compact('order', 'editAddress','customerAddress'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $order->update(array_merge($request->all(), array('status' =>'Pending Payment')));

        Session::flash('flash_message', 'Order updated!');

        return redirect('store/orders/'.$id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $apiPath = app_path().'/Helpers/wechat_payment/';
        require_once $apiPath. "lib/WxPay.Api.php";
        require_once $apiPath."example/WxPay.JsApiPay.php";

        $order = Order::findOrFail($id);
        $customerAddress = Customer_address::firstOrNew(array('user_id' => $order->customer_id));
        $outTradeNo = WxPayConfig::MCHID.date("YmdHis");

        //①、获取用户openid
        $tools = new JsApiPay();
        $openId = null;
        $jsApiParameters = null;
        $editAddress = null;

        if(Config::get('app.env') == 'production') {
            $openId = $tools->GetOpenid();

            //②、统一下单
            $input = new WxPayUnifiedOrder();
            $input->SetBody($order->product['name']);
            $input->SetOut_trade_no($outTradeNo);
            $input->SetTotal_fee($order->total_amount * 100);//money
            $input->SetTime_start(date("YmdHis"));
            $input->SetTime_expire(date("YmdHis", time() + 600));
            $input->SetNotify_url(Config::get('wechatecommerce.wechatPayment.notify_url'));
            $input->SetTrade_type("JSAPI");
            $input->SetOpenid($openId);
            $wechatOrder = WxPayApi::unifiedOrder($input);

            $jsApiParameters = $tools->GetJsApiParameters($wechatOrder);

            //获取共享收货地址js函数参数
            $editAddress = $tools->GetEditAddressParameters();

            $order->prepay_id = $wechatOrder['prepay_id'];
            $order->out_trade_no = $outTradeNo;

            $order->save();
        }

        return view('store.orders.show', compact('order','jsApiParameters','editAddress','customerAddress'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function testPayment()
    {
        ///var/www/php/wechatecommerce/app/Helpers/wechat_payment/
//        $appPath = app_path();
//        $apiPath = $appPath.'/Helpers/wechat_payment/';
//        //error_reporting(E_ERROR);
//        require_once $apiPath. "lib/WxPay.Api.php";
//        require_once $apiPath."example/WxPay.JsApiPay.php";
//
//        //①、获取用户openid
//        $tools = new JsApiPay();
//        $openId = $tools->GetOpenid();
//
//        //②、统一下单
//        $input = new WxPayUnifiedOrder();
//        $input->SetBody("test");
//        $input->SetAttach("test");
//        $input->SetOut_trade_no(WxPayConfig::MCHID.date("YmdHis"));
//        $input->SetTotal_fee("1");//money
//        $input->SetTime_start(date("YmdHis"));
//        $input->SetTime_expire(date("YmdHis", time() + 600));
//        $input->SetGoods_tag("test");
//        $input->SetNotify_url("http://www.jiayiwt.top/payment/example/notify.php");
//        $input->SetTrade_type("JSAPI");
//        $input->SetOpenid($openId);
//        $order = WxPayApi::unifiedOrder($input);
//        echo '<font color="#f00"><b>Order info</b></font><br/>';
//
//        $jsApiParameters = $tools->GetJsApiParameters($order);
//        //print_r($jsApiParameters);
//        //获取共享收货地址js函数参数
//        $editAddress = $tools->GetEditAddressParameters();
//        //print_r($editAddress);
//        //③、在支持成功回调通知中处理成功之后的事宜，见 notify.php
//        /**
//         * 注意：
//         * 1、当你的回调地址不可访问的时候，回调通知会失败，可以通过查询订单来确认支付是否成功
//         * 2、jsapi支付时需要填入用户openid，WxPay.JsApiPay.php中有获取openid流程 （文档可以参考微信公众平台“网页授权接口”，
//         * 参考http://mp.weixin.qq.com/wiki/17/c0f37d5704f0b64713d5d2c37b468d75.html）
//         */
//        Log::create(array('title'=>'wechatUserInfo', 'log_content'=>print_r($order,true)));
//
//        return view('store.orders.testPayment', compact('order','jsApiParameters','editAddress'));
    }
}
