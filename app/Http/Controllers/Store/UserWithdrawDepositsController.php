<?php

namespace App\Http\Controllers\Store;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\UserWithdrawDeposit;
use Illuminate\Http\Request;
use App\User;
use Session;
use Config;
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

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {

     }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        if (Session::has('currentUserOpenId') || Config::get('wechatecommerce.open_id')) {
            $myPromotionPerson = null;
            if (Config::get('wechatecommerce.open_id')) {
                $currentUserOpenId = Config::get('wechatecommerce.open_id');
            } else {
                $currentUserOpenId = Session::get('currentUserOpenId');
            }
            $user = User::where('open_id', $currentUserOpenId)->firstOrFail();
            $userId = $user->id;
            $user->money = $user->money - $request->amount;
            $user->save();
            Log::info('deposit');
            Log::debug($request->all());
            $fields = array_merge($request->all(), array('user_id' => $userId));
            UserWithdrawDeposit::create($fields);

            Session::flash('flash_message', 'UserWithdrawDeposit added!');
            //echo("<script>alert('佣金成功!');</script>");
        }
        return redirect('/store/users/index');
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
