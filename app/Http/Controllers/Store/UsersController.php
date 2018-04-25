<?php

namespace App\Http\Controllers\Store;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use Debugbar;
use Config;
use App\User;
use QRcode;
use App\Models\Order;
use App\Helpers\Jssdk;
use App\Helpers\Curl;
use Log;
use App\Models\UserWithdrawDeposit;
use DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     * three level Distribution
     *
     * 已付款定单财富 payment_status=1
       已收货定单财富 status=received_goods
       已完成定单财富 status=complete
       已提现财富    status=received_goods
       可提现财富
     * 我是代言人:第一个数字未购买人数，第二个数字是已购买的代言人数
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Session::has('currentUserOpenId') || Config::get('wechatecommerce.open_id')) {
            $myPromotionPerson = null;
            if (Config::get('wechatecommerce.open_id')) {
                $currentUserOpenId = Config::get('wechatecommerce.open_id');
            } else {
                $currentUserOpenId = Session::get('currentUserOpenId');
            }
            $updateUser = $user = User::where('open_id', $currentUserOpenId)->firstOrFail();
            $userId = $user->id;
            Log::debug("user id ".$userId);
            //with draw deposit
            $userWithdrawDeposits = UserWithdrawDeposit::orderBy('id', 'desc')->where('user_id', $userId)->get();

            //get first level distribution userid
            $firstLevelUserIds = User::select('id')->where('parent_user_id_one', $userId)->lists('id')->toArray();
            //get second level distribution userid
            $secondLevelUserIds = User::select('id')->where('parent_user_id_two', $userId)->lists('id')->toArray();
            //get third level distribution userid
            $thirdLevelUserIds = User::select('id')->where('parent_user_id_three', $userId)->lists('id')->toArray();
            Log::debug($firstLevelUserIds);
            //----------------------------------------------------------------------------------------------------
            $unpaidCommissionOne = Order::select('commission_one')->whereIn('customer_id', $firstLevelUserIds)->where('payment_status', 0)->sum('commission_one');
            $unpaidCommissionTwo = Order::select('commission_two')->whereIn('customer_id', $secondLevelUserIds)->where('payment_status', 0)->sum('commission_two');
            $unpaidCommissionThree = Order::select('commission_three')->whereIn('customer_id', $thirdLevelUserIds)->where('payment_status', 0)->sum('commission_three');
            //----------------------------------------------------------------------------------------------------
            //----------------------------------------------------------------------------------------------------
            $paidCommissionOne = Order::select('commission_one')->whereIn('customer_id', $firstLevelUserIds)->where('payment_status', 1)->sum('commission_one');
            $paidCommissionTwo = Order::select('commission_two')->whereIn('customer_id', $secondLevelUserIds)->where('payment_status', 1)->sum('commission_two');
            $paidCommissionThree = Order::select('commission_three')->whereIn('customer_id', $thirdLevelUserIds)->where('payment_status', 1)->sum('commission_three');
            //----------------------------------------------------------------------------------------------------
            //----------------------------------------------------------------------------------------------------
            $receivedGoodsOne = Order::select('commission_one')->whereIn('customer_id', $firstLevelUserIds)->where('status', 'ReceivedGoods')->sum('commission_one');
            $receivedGoodsTwo = Order::select('commission_two')->whereIn('customer_id', $secondLevelUserIds)->where('status', 'ReceivedGoods')->sum('commission_two');
            $receivedGoodsThree = Order::select('commission_three')->whereIn('customer_id', $thirdLevelUserIds)->where('status', 'ReceivedGoods')->sum('commission_three');
            //----------------------------------------------------------------------------------------------------
            //----------------------------------------------------------------------------------------------------
            $completedOne = Order::select('commission_one')->whereIn('customer_id', $firstLevelUserIds)->where('status', 'Completed')->sum('commission_one');
            $completedTwo = Order::select('commission_two')->whereIn('customer_id', $secondLevelUserIds)->where('status', 'Completed')->sum('commission_two');
            $completedThree = Order::select('commission_three')->whereIn('customer_id', $thirdLevelUserIds)->where('status', 'Completed')->sum('commission_three');
            //----------------------------------------------------------------------------------------------------
            //----------------------------------------------------------------------------------------------------
            $unpaidAmount = Order::select('total_amount')->whereIn('customer_id',array_merge($firstLevelUserIds,$secondLevelUserIds,$thirdLevelUserIds))->where('payment_status', 0)->sum('total_amount');
            $paidAmount = Order::select('total_amount')->whereIn('customer_id', array_merge($firstLevelUserIds,$secondLevelUserIds,$thirdLevelUserIds))->where('payment_status', 1)->sum('total_amount');
            //----------------------------------------------------------------------------------------------------

            $updateUser->unpaid_fortune = $unpaidCommissionOne + $unpaidCommissionTwo + $unpaidCommissionThree;
            $updateUser->paid_fortune = $paidCommissionOne + $paidCommissionTwo + $paidCommissionThree;
            $updateUser->received_goods_fortune = $receivedGoodsOne + $receivedGoodsTwo + $receivedGoodsThree;
            $updateUser->completed_fortune = $completedOne + $completedTwo + $completedThree;
            $updateUser->save();

            $orderCount = Order::where('customer_id', $userId)
                ->where('status', 'Processing')
                ->count();
            //Log::debug((array)DB::getQueryLog());
        } else {
            return redirect('/store');
        }

        return view('store.users.index', compact('user','orderCount', 'signPackage', 'userWithdrawDeposits','unpaidAmountTotal','unpaidAmount','paidAmount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Debugbar::disable();
        if (Session::exists('currentUserOpenId')) {
            $officialAccountAccessToken = Session::get('officialAccountAccessToken');
            $currentUserOpenId = Session::get('currentUserOpenId');

            $profileUrl = 'https://api.wechat.com/cgi-bin/user/info';
            $profileUrl .= "?access_token={$officialAccountAccessToken}&openid={$currentUserOpenId}&lang=en_US";

            $userInfo =Curl::get($profileUrl);
            $userInfoObj=json_decode($userInfo);

            return view('store.users.show', compact('userInfo','userInfoObj'));

        } else {
            Log::debug("doesn't exist");
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function callback()
    {

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function myQRCode()
    {
        //Debugbar::disable();
        require('/var/www/php/wechatecommerce/app/Helpers/Phpqrcode/qrlib.php');
        // create a QR Code with this text and display it
        $orderCount = Order::where('customer_id', Session::get('userId'))
            ->where('status', 'Processing')
            ->count();
        if ($orderCount > 0) {
            $promotionUrl = "http://www.jiayiwt.top/store_home?promotion=".Session::get('userId');
            QRcode::png($promotionUrl, false, "L", 9, 4);
            //Debugbar::info($promotionUrl);
        } else {
            echo("You didn't buy any product yet,please go home page to buy it.");
        }
        exit();
        //return view('store.users.myQRCode', compact('QRcode'));
    }
}
