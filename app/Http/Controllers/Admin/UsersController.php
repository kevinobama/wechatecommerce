<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use App\Helpers\UserHelper;

class UsersController extends Controller
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
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(15);

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required', ]);

        User::create($request->all());

        Session::flash('flash_message', 'User added!');

        return redirect('admin/users');
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
        $user = User::findOrFail($id);

        return view('admin.users.show', compact('user'));
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
        $user = User::findOrFail($id);

        return view('admin.users.edit', compact('user'));
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
        $this->validate($request, ['name' => 'required', ]);

        $user = User::findOrFail($id);
        $user->update($request->all());

        Session::flash('flash_message', 'User updated!');

        return redirect('admin/users');
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
        User::destroy($id);

        Session::flash('flash_message', 'User deleted!');

        return redirect('admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function createUserByFollow()
    {
//        $input = '<xml><ToUserName><![CDATA[gh_ea0530d955ed]]></ToUserName>
//<FromUserName><![CDATA[ovl_Hv0foRe48tC53PP-DvCh6Fgk]]></FromUserName>
//<CreateTime>1477837206</CreateTime>
//<MsgType><![CDATA[event]]></MsgType>
//<Event><![CDATA[subscribe]]></Event>
//<EventKey><![CDATA[qrscene_3]]></EventKey>
//<Ticket><![CDATA[gQGW8DoAAAAAAAAAASxodHRwOi8vd2VpeGluLnFxLmNvbS9xL1FVVGRMNm5sVWtBcl9RM1RxV3A2AAIEtk8UWAMEAI0nAA==]]></Ticket>
//</xml>';

        $input = '<xml><ToUserName><![CDATA[gh_ea0530d955ed]]></ToUserName>
<FromUserName><![CDATA[ovl_Hvwdnrbb7GreOR1rEEwAc0dw]]></FromUserName>
<CreateTime>1477919696</CreateTime>
<MsgType><![CDATA[event]]></MsgType>
<Event><![CDATA[subscribe]]></Event>
<EventKey><![CDATA[qrscene_48]]></EventKey>
<Ticket><![CDATA[gQHl7zoAAAAAAAAAASxodHRwOi8vd2VpeGluLnFxLmNvbS9xL2FVU2hIdGpsVTBBcWtTV2YxV3A2AAIEYz8XWAMEAI0nAA==]]></Ticket>
</xml>';
        libxml_disable_entity_loader(true);
        $message = simplexml_load_string($input, 'SimpleXMLElement', LIBXML_NOCDATA);

        $fromUserName = $message->FromUserName;//open id
        $eventKey = str_replace("qrscene_","", $message->EventKey);
        Userhelper::createUserByFollow((string)$fromUserName, (int)$eventKey);
        exit('create User By Follow');
    }
}
