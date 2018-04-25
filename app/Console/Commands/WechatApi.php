<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Log;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Helpers\WechatApi as WechatApiHelper;
use App\Helpers\WechatMessage;
use DB;
use App\Helpers\UserHelper;
use Wechat;

class WechatApi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'WechatApi:main';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Wechat Api main';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     * php artisan WechatApi:main
     * //$this->generatingQRCode();
     * $this->material();
     * @return mixed
     */
    public function handle()
    {
        $this->material();
    }


    /**
     * Execute the console command.
     * //https://api.weixin.qq.com/cgi-bin/material/batchget_material?access_token=ACCESS_TOKEN
     *
     * $material = Wechat::material();
     * $temporary = Wechat::material_temporary();
     * @return mixed
     */
    public function material()
    {
        // 永久素材
        $material = Wechat::material();

        $lists = $material->lists('news', 0, 20);
        echo("<pre>");
        print_r($lists);
        Log::debug($lists);
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function generatingQRCode()
    {
        $input = "<xml><ToUserName><![CDATA[gh_ea0530d955ed]]></ToUserName>
<FromUserName><![CDATA[ovl_Hv0foRe48tC53PP-DvCh6Fgk]]></FromUserName>
<CreateTime>1478089223</CreateTime>
<MsgType><![CDATA[event]]></MsgType>
<Event><![CDATA[CLICK]]></Event>
<EventKey><![CDATA[world_queen_my_QRcode]]></EventKey>
</xml>";

        libxml_disable_entity_loader(true);
        $message = simplexml_load_string($input, 'SimpleXMLElement', LIBXML_NOCDATA);

        if (trim($message->Event) === 'CLICK') {
            if($message->EventKey == 'world_queen_my_QRcode') {
                $fromUserName = $message->FromUserName;//user open id
                $user = User::where('open_id', $fromUserName)->firstOrFail();
                $MediaId = $user->qr_code_media_id;
                //get media id
                if($MediaId) {
                    WechatMessage::imageMessage($input,$MediaId);
                } else {
                    $content = "Generating QRCode now,Please wait";
                    WechatMessage::textMessage($input, $content);
                    $mediaId = WechatApiHelper::generateQRcodeMedia($user->id);
                    $user->qr_code_media_id = $mediaId;
                    //$user->save();
                    WechatMessage::imageMessage($input,$MediaId);
                    Log::info($mediaId);
                }
            } else {
                $content = "hi user,You clicked";
                Log::info($content);
            }
        } else {
            $content = "欢迎来到女王的世界!".date('Y-m-d H:i:s');
            Log::info($content);
        }
    }
}
