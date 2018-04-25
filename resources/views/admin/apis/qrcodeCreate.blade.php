@extends('layouts.shop_admin')

@section('content')
<div class="container">

    <h1>created  qrcode now</h1>
    <div class="table">
        <img src="https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket={{ $response->ticket }}">

    </div>
</div>
@endsection
