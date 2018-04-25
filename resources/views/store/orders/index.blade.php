@extends('layouts.mobile_store')

@section('content')
<link type="text/css"  rel='stylesheet' href="/css/frontStore/orders-edit.css">
<link type="text/css"  rel='stylesheet' href="/css/frontStore/orders-index.css">

<div id="tx-container"  >
    <div id="user-container" style="">

        <div class="ddtop">
            <div class="l1"></div>
            <div class="l2">订单详情</div>
            <div class="r1"><a href='/store/'>获取推广二维码>>></a></div>
            <div class="r2"><img height="14px" src="/images/frontStore/MiniQRCode.png"></div>
        </div>

        <div class="cardexplain">
            <div id="page_tag_load" hidefocus="true" style="display: none; z-index: 10;">
                <div class="btn-group"
                     style="position: fixed; font-size: 12px; width: 220px; bottom: 80px; left: 50%; margin-left: -110px; z-index: 999;">
                    <div class="del" style="font-size: 14px;">
                        <img src="/images/frontStore/ajax-loader.gif" alt="loader">正在获取订单...
                    </div>
                </div>
            </div>
            @include('store.orders.partials.orderDetail')
        </div>
    </div>
</div>

@include('layouts.partials.store.footer')
@endsection