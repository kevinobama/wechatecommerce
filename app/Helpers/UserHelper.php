<?php
namespace App\Helpers;

use App\User;
use DB;
use Wechat;

class UserHelper {

    public static function createUserByFollow($fromUserName, $eventKey)
    {
        DB::connection()->enableQueryLog();

        $currentUser = $user = User::firstOrNew(array('open_id' => $fromUserName));

        if(!$user->name) {
            //Log::write($fromUserName);
            $wechatUser = Wechat::user();
            $wechatUser = $wechatUser->get((string)$fromUserName);
            $user->name = $wechatUser->nickname;
            $user->email = $wechatUser->nickname;
            $user->subscribe_time = $wechatUser->subscribe_time;
            $user->head_img_url = $wechatUser->headimgurl;
            $user->save();
            $currentUser = $user;
            //Log::write($user);
        }
        if ((int)$user->parent_user_id_one == 0 && $eventKey) {
            //parent user and update next level info
            //one level
            $parentUser = User::find($eventKey);
            if(!$parentUser) {
                Log::write("parentUser empty=".$parentUser);
                exit('parentUser empty');
            }
            $parentUser->child_user_id_one = $user->id;
            $parentUser->child_user_name_one = $user->name;
            $parentUser->save();

            //update  parent_user_id_one
            User::where('open_id', $fromUserName)->update(
                [
                    'parent_user_id_one' => $parentUser->id,
                    'parent_user_name_one' => $parentUser->name
                ]
            );

            //second level
            if ((int)$parentUser->parent_user_id_one <> 0) {
                $grandParentUser = User::find($parentUser->parent_user_id_one);
                $grandParentUser->child_user_id_two = $user->id;
                $grandParentUser->child_user_name_two = $user->name;
                $grandParentUser->save();
                $currentUser->parent_user_id_two = $grandParentUser->id;
                $currentUser->parent_user_name_two = $grandParentUser->name;
                $currentUser->save();

                //three level
                if((int)$grandParentUser->parent_user_id_one <> 0 ) {
                    $topUser = User::find($grandParentUser->parent_user_id_one);

                    $topUser->child_user_id_three = $user->id;
                    $topUser->child_user_name_three = $user->name;
                    $topUser->save();
                    //Log::write($topUser);
                    $currentUser->parent_user_id_three = $topUser->id;
                    $currentUser->parent_user_name_three = $topUser->name;
                    $currentUser->save();
                }
            }
        }
        $queries = DB::getQueryLog();
        //Log::write($queries);
    }

    public static function createUserByFollowWechat($fromUserName, $eventKey)
    {
        $currentUser = $user = User::firstOrNew(array('open_id' => $fromUserName));

        if(!$user->name) {
            $wechatUser = Wechat::user();
            $wechatUser = $wechatUser->get((string)$fromUserName);
            $user->name = $wechatUser->nickname;
            $user->email = $wechatUser->nickname;
            $user->subscribe_time = $wechatUser->subscribe_time;
            $user->head_img_url = $wechatUser->headimgurl;
            $user->save();
            $currentUser = $user;
        }
        if ((int)$user->parent_user_id_one == 0 && $eventKey) {
            //parent user and update next level info
            //one level
            $parentUser = User::find((int)$eventKey);
            if(!$parentUser) {
                Log::write("parentUser empty=".$parentUser);
                exit('parentUser empty');
            }
            $parentUser->child_user_id_one = $user->id;
            $parentUser->child_user_name_one = $user->name;
            $parentUser->save();

            //update  parent_user_id_one
            User::where('open_id', $fromUserName)->update(
                [
                    'parent_user_id_one' => $parentUser->id,
                    'parent_user_name_one' => $parentUser->name
                ]
            );

            //second level
            if ((int)$parentUser->parent_user_id_one <> 0) {
                $grandParentUser = User::find($parentUser->parent_user_id_one);
                $grandParentUser->child_user_id_two = $user->id;
                $grandParentUser->child_user_name_two = $user->name;
                $grandParentUser->save();
                $currentUser->parent_user_id_two = $grandParentUser->id;
                $currentUser->parent_user_name_two = $grandParentUser->name;
                $currentUser->save();

                //three level
                if((int)$grandParentUser->parent_user_id_one <> 0 ) {
                    $topUser = User::find($grandParentUser->parent_user_id_one);

                    $topUser->child_user_id_three = $user->id;
                    $topUser->child_user_name_three = $user->name;
                    $topUser->save();
                    //Log::write($topUser);
                    $currentUser->parent_user_id_three = $topUser->id;
                    $currentUser->parent_user_name_three = $topUser->name;
                    $currentUser->save();
                }
            }
        }
    }
}