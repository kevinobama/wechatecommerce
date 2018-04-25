<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = ['store/payment/notify/',
        '/store/customer_addresses',
        '/store/wechatcallback/index',
        '/api/wechat/callback'
    ];
    
    //private $openRoutes = ['store/payment/notify/'];

}
