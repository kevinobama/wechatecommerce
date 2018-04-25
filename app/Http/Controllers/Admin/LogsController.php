<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Log;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use App\Helpers\Log as Logger;
use Log as laravelLog;

class LogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $logs = Log::orderBy('id', 'desc')->paginate(30);
        $logContent = Logger::read();
        $laravelLog = Logger::read(storage_path().'/logs/laravel.log');

        return view('admin.logs.index', compact('logs','logContent','laravelLog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        $output = shell_exec('sh /var/www/php/wechatecommerce/gitpull.sh');
        //$output = shell_exec('ls /var/www -a');
        print_r($output);
        exit;
        Session::flash('flash_message', 'successful!'.$output);

        return redirect('admin/logs');
        //return view('admin.logs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['title' => 'required', 'log_content' => 'required', ]);

        Log::create($request->all());

        Session::flash('flash_message', 'Log added!');

        return redirect('admin/logs');
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
        $log = Log::findOrFail($id);

        return view('admin.logs.show', compact('log'));
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
        $log = Log::findOrFail($id);

        return view('admin.logs.edit', compact('log'));
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
        $this->validate($request, ['title' => 'required', 'log_content' => 'required', ]);

        $log = Log::findOrFail($id);
        $log->update($request->all());

        Session::flash('flash_message', 'Log updated!');

        return redirect('admin/logs');
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
        Log::destroy($id);

        Session::flash('flash_message', 'Log deleted!');

        return redirect('admin/logs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function truncate()
    {
        Log::truncate();

        Logger::write(null, true);
        Logger::write(null, true, storage_path().'/logs/laravel.log');

        Session::flash('flash_message', 'Log deleted!');

        return redirect('admin/logs');
    }
}
