<?php

namespace App\Http\Controllers\Store;

use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class BaseController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $user = new User();
        $user->authorize();
    }
}
