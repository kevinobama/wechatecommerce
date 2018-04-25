<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Debugbar;
use Session;
use Config;
class Wechat_menusController extends Controller
{
    public $accessToken;

    public function __construct()
    {
        $this->middleware('auth');
        $url = 'https://api.wechat.com/cgi-bin/token?grant_type=client_credential&appid=wx763c44fe2f3f4a92&secret=eae29e416b5401608065f4394a7a7ec7';
        $result = json_decode(file_get_contents($url));
        $this->accessToken = $result->access_token;
    }

    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $url = 'https://api.wechat.com/cgi-bin/menu/get?access_token='.$this->accessToken;
        $menus = file_get_contents($url);
        $menus = str_replace('{', "\n  {", $menus);
        Debugbar::info($menus);

        $followerListUrl = 'https://api.wechat.com/cgi-bin/user/get';
        $followerListUrl .= '?access_token='.$this->accessToken.'&next_openid=NEXT_OPENID';
        $followerList = file_get_contents($followerListUrl);
        Debugbar::info($followerList);

        return view('admin.wechat_menus.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        $customerServicesUrl = Config::get('wechatecommerce.customerServicesUrl');
        //-------------------------------------------------------------------------------------
        $url = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".$this->accessToken;

        $params ='{
  				 "button":[
                      {	
                              "type":"view",
                              "name":"女王宫殿",
                              "url":"http://www.jiayiwt.top/store_home"
                      },  
                      {	
                              "type":"view",
                              "name":"客服中心",
                              "url":"'.$customerServicesUrl.'"
                      },                      				 
					  {
						   "name":"我的小蜜",
                            "sub_button":[
							{
							   "type":"view",
							   "name":"快递查询",
							   "url":"http://www.kuaidi100.com/"
							},
							{
							   "type":"view",
							   "name":"我是代言人",
							   "url":"http://www.jiayiwt.top/store/users/index"
							},
							{
							   "type":"click",
							   "name":"操作指南",
							   "key":"world_queen_user_guide"
							},
							{
							   "type":"click",
							   "name":"我的二维码",
							   "key":"world_queen_my_QRcode"
							},																						
							{
							   "type":"view",
							   "name":"品牌介绍",
							   "url":"http://mp.weixin.qq.com/s?__biz=MzIxNzUxNDQzMA==&mid=100000012&idx=1&sn=ebd69159bb578eddd93f3c25987a8441&chksm=17f9e9dd208e60cb80204fb2c9676df7ef9e4c8692872560517b5d1ba68d76aea22698ae7285#rd"
							}																										
							]
					  }					   
				]}';
        $result = $this->curl_post($url,$params);
        Debugbar::info($result);
        return redirect('admin/wechat_menus/index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {

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
    public function destroy()
    {
        $url = 'https://api.wechat.com/cgi-bin/menu/delete?access_token='.$this->accessToken;
        $result = file_get_contents($url);

        Session::flash('flash_message', 'Product deleted!'.$result);

        return redirect('admin/wechat_menus/index');
    }

    private function curl_post($url,$data){
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($curl, CURLOPT_AUTOREFERER, 1);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_TIMEOUT, 30);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $tmpInfo = curl_exec($curl);
        if (curl_errno($curl)) {
            echo 'Errno'.curl_error($curl);
        }
        curl_close($curl);
        return $tmpInfo;
    }
}
