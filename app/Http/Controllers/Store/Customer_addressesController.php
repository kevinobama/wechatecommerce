<?php

namespace App\Http\Controllers\Store;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Customer_address;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use App\Models\Log;

class Customer_addressesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $customer_addresses = Customer_address::paginate(15);

        return view('store.customer_addresses.index', compact('customer_addresses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('store.customer_addresses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        //
        Log::create(array('title'=>'store', 'log_content'=>print_r($request->all(),true)));

        $postData = $request->all();

        $customerAddress = Customer_address::firstOrNew(array('user_id' => $postData['user_id']));
        $customerAddress->user_id = $postData['user_id'];
        $customerAddress->province = $postData['province'];
        $customerAddress->city = $postData['city'];
        $customerAddress->country = $postData['country'];
        $customerAddress->address = $postData['address'];
        $customerAddress->phone = $postData['phone'];
        $customerAddress->is_default = '1';

        $customerAddress->save();

        //Customer_address::create($request->all());

        echo('success');
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
        $customer_address = Customer_address::findOrFail($id);

        return view('store.customer_addresses.show', compact('customer_address'));
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
        $customer_address = Customer_address::findOrFail($id);

        return view('store.customer_addresses.edit', compact('customer_address'));
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
        $this->validate($request, ['user_id' => 'required', ]);

        $customer_address = Customer_address::findOrFail($id);
        $customer_address->update($request->all());

        Session::flash('flash_message', 'Customer_address updated!');

        return redirect('store/customer_addresses');
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
        Customer_address::destroy($id);

        Session::flash('flash_message', 'Customer_address deleted!');

        return redirect('store/customer_addresses');
    }
}
