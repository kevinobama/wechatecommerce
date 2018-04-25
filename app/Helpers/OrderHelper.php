<?php
namespace App\Helpers;

use App\User;
use DB;

class OrderHelper {

    public static function orderStatus($status)
    {
        $statusCn = '';
        switch ($status) {
            case 'New':
                $statusCn = "新建订单";
                break;
            case 'Pending Payment':
                $statusCn = "待支付";
                break;
            case 'Processing':
                $statusCn = "待发货";
                break;
            case 'SentGoods':
                $statusCn = "已发货";
                break;
            case 'ReceivedGoods':
                $statusCn = "已收货";
                break;
            case 'Completed':
                $statusCn = "已完成";
                break;
        }
        return $statusCn;
    }

    public static function paymentStatus($status)
    {
        $statusCn = '';
        if($status == '1') {
            $statusCn = '已支付';
        } else {
            $statusCn = '未支付';
        }
        return $statusCn;
    }
}