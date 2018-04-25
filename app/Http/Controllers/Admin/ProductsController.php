<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Illuminate\Routing\Route;
use App\Helpers\Menu;
use Debugbar;
use App\Helpers\Log;
use DB;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index(Route $route)
    {
        DB::connection()->enableQueryLog();
        $products = Product::orderBy('id', 'desc')->paginate(15);
//        print_r($route->getActionName());
//        print_r($route->getActionName());

        //error_log("data!".print_r($products,true), 0);
        Log::write(DB::getQueryLog());

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        $categories = Category::all();
        $status = array('出售','下架');
        $commissionPaymentType = array('申请提现','红包发放');
        $purchaseAsMember = array('否','是');
        $products = Product::all();

        return view('admin.products.create', compact('categories', 'status', 'commissionPaymentType', 'purchaseAsMember', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['category_id' => 'required', 'name' => 'required', ]);

        $product = Product::create($request->all());

        if ($request->file('image')) {
            $imageName = $product->id . '.' . $request->file('image')->getClientOriginalExtension();

            $request->file('image')->move(
                base_path() . '/public/images/products/', $imageName
            );
            $product->image = $imageName;
            $product->save();
        }

        //error_log("data:".print_r($product,true), 0);

        Session::flash('flash_message', 'Product added!');

        return redirect('admin/products');
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
        $product = Product::findOrFail($id);
        //\Debugbar::info($product);
        //Debugbar::addMessage('Another message', 'mylabel');
        return view('admin.products.show', compact('product'));
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
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $status = array('出售','下架');
        $commissionPaymentType = array('申请提现','红包发放');
        $purchaseAsMember = array('否','是');
        $products = Product::all();;

        return view('admin.products.edit', compact('product','categories', 'status', 'commissionPaymentType', 'purchaseAsMember', 'products'));
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
        $product = Product::findOrFail($id);

        $postData = $request->all();

        if ($request->file('image')) {
            $imageName = $product->id . '.' . $request->file('image')->getClientOriginalExtension();

            $request->file('image')->move(
                base_path() . '/public/images/products/', $imageName
            );
            $postData['image'] = $imageName;
        }

        if ($request->file('withdraw_message')) {
            $imageName = time() . '-' . date('YmdHis') . '.' . $request->file('withdraw_message')->getClientOriginalExtension();
            $request->file('withdraw_message')->move(
                base_path() . '/public/images/products/withdraw_message/', $imageName
            );
            $postData['withdraw_message'] = $imageName;
            error_log("imageName:".print_r($imageName,true), 0);
        }

//        error_log("detail:".print_r($_POST['detail'],true), 0);
        //error_log("data:".print_r($postData,true), 0);

        $product->update($postData);

        Session::flash('flash_message', 'Product updated!');

        return redirect('admin/products');
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
        Product::destroy($id);

        Session::flash('flash_message', 'Product deleted!');

        return redirect('admin/products');
    }
}
