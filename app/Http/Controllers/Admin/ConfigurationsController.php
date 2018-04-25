<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Configuration;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class ConfigurationsController extends Controller
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
        $configurations = Configuration::paginate(15);

        return view('admin.configurations.index', compact('configurations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('admin.configurations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['config_id' => 'required', 'scope' => 'required', 'scope_id' => 'required', 'path' => 'required', 'value' => 'required', ]);

        Configuration::create($request->all());

        Session::flash('flash_message', 'Configuration added!');

        return redirect('admin/configurations');
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
        $configuration = Configuration::findOrFail($id);

        return view('admin.configurations.show', compact('configuration'));
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
        $configuration = Configuration::findOrFail($id);

        return view('admin.configurations.edit', compact('configuration'));
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
        $this->validate($request, ['config_id' => 'required', 'scope' => 'required', 'scope_id' => 'required', 'path' => 'required', 'value' => 'required', ]);

        $configuration = Configuration::findOrFail($id);
        $configuration->update($request->all());

        Session::flash('flash_message', 'Configuration updated!');

        return redirect('admin/configurations');
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
        Configuration::destroy($id);

        Session::flash('flash_message', 'Configuration deleted!');

        return redirect('admin/configurations');
    }
}
