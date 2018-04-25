@extends('layouts.mobile_store')

@section('content')
{!! Form::model($order, [
    'method' => 'PATCH',
    'url' => ['/store/orders', $order->id],
    'class' => 'form-horizontal'
]) !!}
<link type="text/css"  rel='stylesheet' href="/css/frontStore/orders-edit.css">
<div id='load'></div>
<div class="top">
    <a class="icon-angle-left" href="javascript:window.history.back();">&nbsp&nbsp返回</a>
    填写订单
</div>
<div class="all">
    <div class="site">
        <div class="dizhi">
            <div class='msg' style=''>
                <p class='left' id="customer_addresses">
                    <span id='username'>{{ $customerAddress->country }} {{ $customerAddress->province }} {{ $customerAddress->city }}</span>&nbsp;&nbsp;<span id='phone'>{{ $customerAddress->phone }}</span><br>
                    <span id='address'>{{ $customerAddress->address }}</span>
                </p>
            </div>
            <p class='edit'><a href="javascript:void(0)" onclick="editAddress();">添加收货地址</a></p>
        </div>
        <ul id='zitibox'>
        </ul>
    </div>
    <div class="price-play">
        <div class="tit">
            <div style="width:auto; float:left;">商品合计：</div><div class="t-r" style="width:auto; float:right;">￥<span id='totalprice' data-total='399'>{{ $order->total_amount }}</span>(含运费<span id='postage'>{{ $order->shipping_fee }}</span>元)</div>
        </div>
    </div>
    <div class="goods">
        <ul>
            <li>
                <div class="goodbox">
                    <div class="pic">
                        <img width="60px" height="60px" src="/images/products/{{ $order->product->image }}">
                    </div>
                    <div class="goodtit">{{ $order->product->name }}</div>
                    <div class="guige">Size:M</div>
                </div>
                <div class="goodjg t-r">
                    <span>￥{{ $order->single_amount }}</span>
                    <span>x{{ $order->quantity }}</span>
                </div>
            </li></ul>
    </div>
    <div class="goods" style="padding:5px; overflow:hidden;">
        <div style="width:60px; line-height:60px; text-align:center; float:left;">备注：</div>
        <div style="width:calc(100% - 60px); float:left;"><textarea name="customer_note" style="width:100%; height:60px;border:1px solid black;"  ></textarea></div>
    </div>
</div>
    <div class="confirm">
    <div class="zj">
        <div class="w50">实付款</div>
        <div class="w50 t-r">￥<span id='disprice'>{{ $order->total_amount }}</span></div>
    </div>
    <input type="submit" name="register-submit"    class="fukuan" value="付款">
</div>
{!! Form::close() !!}

<script type="text/javascript">

//获取共享地址
function editAddress()
{
    /**
    var user_id = '{ order->customer_id }';
    $.post( "/store/customer_addresses", { user_id: user_id ,
        province: '.proviceFirstStageName' ,
        city: '.addressCitySecondStageName' ,
        country: '.addressCountiesThirdStageName',
        address: '.addressDetailInfo',
        phone: '.telNumber '}, function( data ) {
        //alert( "Data Loaded: " + data );
    });
    **/

    WeixinJSBridge.invoke(
            'editAddress',
            <?php echo $editAddress; ?>,
            function(res){
                var provice = res.proviceFirstStageName;
                var City = res.addressCitySecondStageName;
                var Counties = res.addressCountiesThirdStageName;
                var address = res.addressDetailInfo;
                var telNumber = res.telNumber;
                var addressInfo = Counties + provice + City + telNumber + address;

                document.getElementById('customer_addresses').innerHTML = addressInfo;

                //save address
                var user_id = '{{ $order->customer_id }}';
                customer_addresses
                $.post( "/store/customer_addresses", { user_id: user_id ,
                    province: provice ,
                    city: City ,
                    country: Counties,
                    address: address,
                    phone: telNumber }, function( data ) {
                    alert( "成功");
                });

            }
    );
}
</script>
@endsection