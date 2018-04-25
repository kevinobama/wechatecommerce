<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\UserWithdrawDeposit;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Wechat;
use Log;

class UserWithdrawDepositsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $userwithdrawdeposits = UserWithdrawDeposit::orderBy('id', 'desc')->with('user')->paginate(20);

        return view('admin.user-withdraw-deposits.index', compact('userwithdrawdeposits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        //
        return view('admin.user-withdraw-deposits.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        
        UserWithdrawDeposit::create($request->all());

        Session::flash('flash_message', 'UserWithdrawDeposit added!');

        return redirect('admin/user-withdraw-deposits');
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
        $userwithdrawdeposit = UserWithdrawDeposit::findOrFail($id);

        return view('admin.user-withdraw-deposits.show', compact('userwithdrawdeposit'));
    }

    /**
     * send red package
     *
     * @param  int  $id
     *
     * @return void
     */
    public function edit($id)
    {
        $userWithdrawDeposit = UserWithdrawDeposit::findOrFail($id);
        $luckyMoney = Wechat::lucky_money();
        $mchBillNo = time();
        $luckyMoneyData = [
            'mch_billno'       => $mchBillNo,
            'send_name'        => '世界女王',
            're_openid'        => $userWithdrawDeposit->user['open_id'],
            'total_num'        => 1,  //普通红包固定为1，裂变红包不小于3
            'total_amount'     => (int)$userWithdrawDeposit->amount * 100,  //单位为分，普通红包不小于100，裂变红包不小于300
            'wishing'          => $userWithdrawDeposit->user['name'].'佣金发放  ',
            'client_ip'        => '192.168.0.1',  //可不传，不传则由 SDK 取当前客户端 IP
            'act_name'         => $userWithdrawDeposit->user['name'].'提现  ',
            'remark'           => $userWithdrawDeposit->user['name'].'提现  ',
        ];
        $result = $luckyMoney->send($luckyMoneyData, 'NORMAL');
        $result = json_decode($result);

        $userWithdrawDeposit->red_packet_result = json_encode(array($luckyMoneyData,$result));

        if ($result->result_code == 'SUCCESS') {
            $userWithdrawDeposit->mch_billno = $mchBillNo;
            $userWithdrawDeposit->status = 1;
            $userWithdrawDeposit->save();
            Session::flash('flash_message', 'red packet has been sent!');
            return redirect('admin/user-withdraw-deposits');
        } else {
            Log::debug((array)$result);
            $userWithdrawDeposit->save();
            print_r($result);
            exit();
        }
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
        
        $userwithdrawdeposit = UserWithdrawDeposit::findOrFail($id);
        $userwithdrawdeposit->update($request->all());

        Session::flash('flash_message', 'UserWithdrawDeposit updated!');

        return redirect('admin/user-withdraw-deposits');
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
        UserWithdrawDeposit::destroy($id);

        Session::flash('flash_message', 'UserWithdrawDeposit deleted!');

        return redirect('admin/user-withdraw-deposits');
    }
}
