<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Config;
use Session;
use Log;
use DB;
use App\Helpers\Curl;


class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'open_id', 'access_token', 'expires_in',
        'parent_user_id_one',
        'parent_user_id_two',
        'parent_user_id_three',
        'parent_user_name_one',
        'parent_user_name_two',
        'parent_user_name_three',
        'child_user_id_one',
        'child_user_id_two',
        'child_user_id_three',
        'child_user_name_one',
        'child_user_name_two',
        'child_user_name_three',
        'qr_code_media_datetime',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function orders()
    {
        return $this->hasMany('App\Models\Order','customer_id');
    }

    public static function insertIgnore($array){
        $user = new static();
        if($user->timestamps){
            $now = \Carbon\Carbon::now();
            $array['created_at'] = $now;
            $array['updated_at'] = $now;
        }
        $result = DB::insert('INSERT IGNORE INTO shop_'.((new self)->getTable()).' ('.implode(',',array_keys($array)).
            ') values (?'.str_repeat(',?',count($array) - 1).')',array_values($array));
        return DB::getPdo()->lastInsertId();
    }

    public function authorize()
    {
        $appId = Config::get('wechatecommerce.wecahtOauth2.appId');
        $appSecret = Config::get('wechatecommerce.wecahtOauth2.appSecret');
        $openId = Config::get('wechatecommerce.open_id');

        if(isset($openId) && $openId) {
            Session::put('officialAccountAccessToken', Config::get('wechatecommerce.official_token'));
            Session::put('currentUserOpenId', $openId);
            $user = User::where('open_id', $openId)->firstOrFail();
            Session::put('userId', $user->id);
        } else { //if (empty(Session::get('currentUserOpenId')))
            if (isset($_GET['code']) && $_GET['code']) {
                $code = $_GET['code'];
                //WeChat Official Account
                $url = "https://api.wechat.com/cgi-bin/token?grant_type=client_credential&appid={$appId}&secret={$appSecret}";
                $result = json_decode(Curl::get($url));
                $accessToken = $result->access_token;
                //OAuth2.0
                $url = "https://api.wechat.com/sns/oauth2/access_token";
                $url .= "?appid={$appId}&secret={$appSecret}&code={$code}&grant_type=authorization_code";
                Log::debug($url);
                $accessTokenObj = Curl::get($url);
                $accessTokenObj =json_decode($accessTokenObj);
                $openId = $accessTokenObj->openid;

                session()->regenerate();

                Session::put('officialAccountAccessToken', $accessToken);
                Session::put('currentUserOpenId', $openId);

                $user = User::firstOrNew(array('open_id' => $openId));

                $user->access_token = $accessToken;
                $user->expires_in = $accessTokenObj->expires_in;
                $user->ip = $_SERVER['REMOTE_ADDR'];
                //wechat info
                if(empty($user->name) || strlen($user->name) === 0) {
                    $wechatUserInfo = $this->wechatUserInfo($accessToken, $openId);
                    $user->name = $wechatUserInfo->nickname;
                    $user->email = $wechatUserInfo->nickname;
                    $user->subscribe_time = $wechatUserInfo->subscribe_time;
                    $user->head_img_url = $wechatUserInfo->headimgurl;
                }
                
//                if (isset($_GET['promotion']) && $_GET['promotion'] && (int)$user->promotion === 0) {
//                    $user->promotion = $_GET['promotion'];
//                }
                $user->save();

                Session::put('userId', $user->id);
            } else {
                $redirectUri = 'http://www.jiayiwt.top/store_home';
                if (isset($_GET['promotion']) && $_GET['promotion']) {
                    $redirectUri .= '?promotion='.$_GET['promotion'];
                }

                $url = 'https://open.weixin.qq.com/connect/oauth2/authorize';
                $params = '?appid='.$appId.'&redirect_uri='.$redirectUri.'&response_type=code&scope=snsapi_base&state=#wechat_redirect';
                $fullUrl = $url . $params;
                header('Location: '.$fullUrl);
            }
        }
    }

    private function wechatUserInfo($officialAccountAccessToken, $currentUserOpenId)
    {
        $profileUrl = 'https://api.wechat.com/cgi-bin/user/info';
        $profileUrl .= "?access_token={$officialAccountAccessToken}&openid={$currentUserOpenId}&lang=en_US";

        $userInfo =file_get_contents($profileUrl);
        $userInfoObj=json_decode($userInfo);
        return $userInfoObj;
    }
}
