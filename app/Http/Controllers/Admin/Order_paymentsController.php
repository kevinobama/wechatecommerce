<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Order_payment;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class Order_paymentsController extends Controller
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
        $order_payments = Order_payment::paginate(15);

        return view('admin.order_payments.index', compact('order_payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('admin.order_payments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['id' => 'required', 'order_id' => 'required', 'payment_gateway' => 'required', 'total_amount' => 'required', 'ip_address' => 'required', 'created_at' => 'required', 'successful_at' => 'required', 'status' => 'required', ]);

        Order_payment::create($request->all());

        Session::flash('flash_message', 'Order_payment added!');

        return redirect('admin/order_payments');
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
        $order_payment = Order_payment::findOrFail($id);

        return view('admin.order_payments.show', compact('order_payment'));
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
        $order_payment = Order_payment::findOrFail($id);

        return view('admin.order_payments.edit', compact('order_payment'));
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
        $this->validate($request, ['id' => 'required', 'order_id' => 'required', 'payment_gateway' => 'required', 'total_amount' => 'required', 'ip_address' => 'required', 'created_at' => 'required', 'successful_at' => 'required', 'status' => 'required', ]);

        $order_payment = Order_payment::findOrFail($id);
        $order_payment->update($request->all());

        Session::flash('flash_message', 'Order_payment updated!');

        return redirect('admin/order_payments');
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
        Order_payment::destroy($id);

        Session::flash('flash_message', 'Order_payment deleted!');

        return redirect('admin/order_payments');
    }
}
