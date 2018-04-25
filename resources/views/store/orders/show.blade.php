@extends('layouts.mobile_store')

@section('content')
<link type="text/css"  rel='stylesheet' href="/css/frontStore/orders-show.css">
<script type="text/javascript">
    //调用微信JS api 支付
    function jsApiCall()
    {
        WeixinJSBridge.invoke(
                'getBrandWCPayRequest',
                <?php echo $jsApiParameters; ?>,
                function(res){
                    WeixinJSBridge.log(res.err_msg);
                    if(res.err_msg=='get_brand_wcpay_request:ok')
                    {
                        document.getElementById('payDom').style.display='none';
                        document.getElementById('successDom').style.display='';
                        setTimeout("window.location.href = 'http://www.jiayiwt.top/store/users/'",2000);
                    }
                    else
                    {
                        document.getElementById('payDom').style.display='none';
                        document.getElementById('failDom').style.display='';
                    }
                }
        );
    }

    function callpay()
    {
        if (typeof WeixinJSBridge == "undefined"){
            if( document.addEventListener ){
                document.addEventListener('WeixinJSBridgeReady', jsApiCall, false);
            }else if (document.attachEvent){
                document.attachEvent('WeixinJSBridgeReady', jsApiCall);
                document.attachEvent('onWeixinJSBridgeReady', jsApiCall);
            }
        }else{
            jsApiCall();
        }
    }
</script>
<script type="text/javascript">
    //获取共享地址
    function editAddress()
    {
        WeixinJSBridge.invoke(
                'editAddress',
                <?php echo $editAddress; ?>,
                function(res){
                    var value1 = res.proviceFirstStageName;
                    var value2 = res.addressCitySecondStageName;
                    var value3 = res.addressCountiesThirdStageName;
                    var value4 = res.addressDetailInfo;
                    var tel = res.telNumber;

                    //alert(value1 + value2 + value3 + value4 + ":" + tel);
                }
        );
    }
    /**
    window.onload = function(){
        if (typeof WeixinJSBridge == "undefined"){
            if( document.addEventListener ){
                document.addEventListener('WeixinJSBridgeReady', editAddress, false);
            }else if (document.attachEvent){
                document.attachEvent('WeixinJSBridgeReady', editAddress);
                document.attachEvent('onWeixinJSBridgeReady', editAddress);
            }
        }else{
            editAddress();
        }
    }; **/
</script>

<div class="cardexplain"  style="margin:0;padding:0;">
    <ul class="round" style="margin:0;padding:0;border-radius:0;border:0px;border-bottom:1px solid #C6C6C6">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="cpbiaoge">
            <tr>
                <td> <span>订单详情</span> <!--span style='float:right'><a href='./index.php?g=App&m=Index&a=index_info'>继续购物>>></a></span--> </td>
            </tr>
        </table>
    </ul>
</div>
<div class="cardexplain" style="margin-bottom: 0px;">
    <ul class="round"  style="margin-left:0;margin-right:0;">
        <li class="title mb"><span class="none">收货人信息</span></li>
        <li class="nob">
            <table>
                <tr><td>联系人：{{ $order->customer_name }}</td></tr>
                <tr><td>联系电话：{{ $customerAddress->phone }}</td></tr>
                <tr><td>联系地址：{{ $customerAddress->province }}  {{ $customerAddress->city }} {{ $customerAddress->country }} {{ $customerAddress->address }}
                </td></tr>
            </table>
        </li>
    </ul>
</div>
<div class="cardexplain">
    <ul class="round" style="margin-left:0;margin-right:0;">
        <li class="title mb"><span class="none">产品信息</span></li>
        <li class="nob">
            <table>
                <tr><td><img width='70' height='70' src="/images/products/{{ $order->product->image }}"></td>
                    <td><table>
                            <tr><td>{{ $order->product->name }}<td></tr>
                            <tr><td>￥{{ $order->single_amount }} * {{ $order->quantity }}<td></tr>
                        </table></td>
                </tr>
            </table>
            <div style='text-align:center;color:red;'>购物合计总金额：{{ $order->total_amount }}元</div>
    </ul>
</div>
<div id="payDom" class="cardexplain">
    <div class="footReturn" style="text-align:center">
        <input type="button" style="margin:0 auto 20px auto;width:100%" onclick="callpay()" class="submit"value="微信支付"/>
    </div>
</div>
<div id="failDom" style="display:none" class="cardexplain">
    <ul class="round">
        <li class="title mb"><span class="none">支付结果</span></li>
        <li class="nob">
            <table width="100%"border="0"cellspacing="0"cellpadding="0"class="kuang">
                <tr><th>支付失败</th><td><div id="failRt"></div></td></tr>
            </table>
        </li>
    </ul>
    <div class="footReturn" style="text-align:center">
        <input type="button" style="margin:0 auto 20px auto;width:100%"onclick="callpay()"class="submit"value="重新进行支付"/>
    </div>
</div>

<div id="successDom" style="display:none"  class="cardexplain">
    <ul class="round"><li class="title mb"><span class="none">支付成功</span></li>
        <li class="nob">
            <table width="100%"border="0"cellspacing="0"cellpadding="0"class="kuang">
                <tr><td>您已支付成功，页面正在跳转...</td></tr>
            </table>
            <div id="failRt"></div>
        </li>
    </ul>
</div>
@endsection
