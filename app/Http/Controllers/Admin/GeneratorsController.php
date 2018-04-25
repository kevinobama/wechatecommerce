<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Schema;

class GeneratorsController extends Controller
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
    public function index(Request $request)
    {
        $tables = DB::select('SHOW TABLES');
        //fetch all of fields
        $getData = $request->all();
        $currentTable=isset($getData['table']) ? $getData['table'] : 'shop_products';
        $tableColumns = DB::select('SHOW COLUMNS FROM  '.$currentTable);
        $columnsCount = DB::select("SELECT count(*) as count FROM information_schema.columns WHERE table_name =  '{$currentTable}' " );
        $namespace = str_replace("shop_","",$currentTable);
        $namespace = ucfirst($namespace);

        return view('admin.generators.index', compact('currentTable','tables', 'tableColumns', 'namespace', 'columnsCount'));
    }
}
