<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use App\Helpers\Log;
use App\Models\Category;
use App\Helpers\Menu;
use App\Helpers\Curl;
use Debugbar;
use Config;
use App\Helpers\CustomerServiceMessage;
use App\Helpers\WechatApi;
use Wechat;
use Lang;
use App\Helpers\OrderMessage;

class CustomerServiceMessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $customerservicemessages = '';

        return view('admin.customer-service-messages.index', compact('customerservicemessages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        //ovl_Hv2kfU3QMsCC7xWQNTP9n4Uw,ovl_Hv0foRe48tC53PP-DvCh6Fgk
        $wechatCustomer = Wechat::staff();
        $data = array(
            'openId' => 'ovl_Hv0foRe48tC53PP-DvCh6Fgk',//ovl_Hv0foRe48tC53PP-DvCh6Fgk
            'orderId' => time(),
            'amount' => 899
        );
        OrderMessage::successfulOrderText($wechatCustomer, $data);
        $data = array(
            'openId' => 'ovl_Hv0foRe48tC53PP-DvCh6Fgk',
            'amount' => 899,
            'userName' => 'kevin',
            'userId' => '11',
            'orderDateTime' => date('Y-m-d H:i:s'),
            'orderId' => time(),
            'commission' => 100
        );
        OrderMessage::successfulOrderYourMemebers($wechatCustomer, $data);

        return view('admin.customer-service-messages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function update($id, Request $request)
    {
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function destroy($id)
    {

    }
}
