<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Order;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use App\Helpers\OrderMessage;
use Wechat;

class OrdersController extends Controller
{

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
     * @return void
     */
    public function index()
    {
        $orders = Order::orderBy('id', 'desc')->paginate(15);

        return view('admin.orders.index', compact('orders'));
    }

    /**
     * send goods and express
     *
     * @return void
     */
    public function create(Request $request)
    {
        if($request->id) {
            $order = Order::findOrFail($request->id);
            if($order->express_company  && $order->express_number) {
                $wechatCustomer = Wechat::staff();
                //update order status
                $order->status = 'SentGoods';
                $order->save();
                //send message to user
                $data = array(
                    'openId' => (string)$order->user['open_id'],//parent user open id
                    'amount' => $order->total_amount,
                    'userName' => $order->customer_name,
                    'userId' => $order->customer_id,
                    'orderDateTime' => $order->created_at,
                    'orderId' => $order->out_trade_no,
                    'commission' => $order->total_amount
                );
                OrderMessage::sentGoods($wechatCustomer, $data);

                Session::flash('flash_message', 'goods have been sent succsssfull.货物已成功发送!');
            } else {
                Session::flash('flash_message', 'express company  and express number required快递公司和快递号码必要!');
            }
        } else {
            Session::flash('flash_message', 'Order id is empty!');
        }
        return redirect('admin/orders');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        //$this->validate($request, ['id' => 'required', 'repeat_purchase_amount' => 'required', 'increment_id' => 'required', 'customer_id' => 'required', 'product_id' => 'required', 'quantity' => 'required', 'single_amount' => 'required', 'total_amount' => 'required', 'status' => 'required', 'customer_email' => 'required', 'customer_name' => 'required', 'customer_address' => 'required', 'remote_ip' => 'required', 'shipping_method' => 'required', 'x_forwarded_for' => 'required', 'customer_note' => 'required', 'total_item_count' => 'required', 'customer_gender' => 'required', 'shipping_arrival_date' => 'required', 'created_at' => 'required', 'updated_at' => 'required', ]);

        Order::create($request->all());

        Session::flash('flash_message', 'Order added!');

        return redirect('admin/orders');
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
        $order = Order::findOrFail($id);

        return view('admin.orders.show', compact('order'));
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
        $order = Order::findOrFail($id);
        
        return view('admin.orders.edit', compact('order'));
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
        $this->validate($request, ['total_amount' => 'required']);

        $order = Order::findOrFail($id);
        $order->update($request->all());

        Session::flash('flash_message', 'Order updated!');

        return redirect('admin/orders');
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
        Order::destroy($id);

        Session::flash('flash_message', 'Order deleted!');

        return redirect('admin/orders');
    }
}
