<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Customer_address;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class Customer_addressesController extends Controller
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
        $customer_addresses = Customer_address::paginate(15);

        return view('admin.customer_addresses.index', compact('customer_addresses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('admin.customer_addresses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['id' => 'required', 'customer_id' => 'required', 'is_default' => 'required', 'receiver' => 'required', 'address' => 'required', 'city' => 'required', 'province' => 'required', 'country' => 'required', 'zip_code' => 'required', 'phone' => 'required', 'fax' => 'required', 'created_at' => 'required', 'updated_at' => 'required', ]);

        Customer_address::create($request->all());

        Session::flash('flash_message', 'Customer_address added!');

        return redirect('admin/customer_addresses');
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

        return view('admin.customer_addresses.show', compact('customer_address'));
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

        return view('admin.customer_addresses.edit', compact('customer_address'));
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
        $this->validate($request, ['id' => 'required', 'customer_id' => 'required', 'is_default' => 'required', 'receiver' => 'required', 'address' => 'required', 'city' => 'required', 'province' => 'required', 'country' => 'required', 'zip_code' => 'required', 'phone' => 'required', 'fax' => 'required', 'created_at' => 'required', 'updated_at' => 'required', ]);

        $customer_address = Customer_address::findOrFail($id);
        $customer_address->update($request->all());

        Session::flash('flash_message', 'Customer_address updated!');

        return redirect('admin/customer_addresses');
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

        return redirect('admin/customer_addresses');
    }
}
