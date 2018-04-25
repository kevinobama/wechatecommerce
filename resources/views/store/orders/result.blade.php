@extends('layouts.mobile_store')

@section('content')
<link type="text/css"  rel='stylesheet' href="/css/frontStore/orders-show.css">
<div class="cardexplain"  style="margin:0;padding:0;">
    <ul class="round" style="margin:0;padding:0;border-radius:0;border:0px;border-bottom:1px solid #C6C6C6">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="cpbiaoge">
            <tr>
                <td> <span>支付结果</span> <!--span style='float:right'><a href='./index.php?g=App&m=Index&a=index_info'>继续购物>>></a></span--> </td>
            </tr>
        </table>
    </ul>
</div>

<div id="successDom" class="cardexplain">
    <ul class="round"><li class="title mb"><span class="none">支付成功</span></li>
        <li class="nob">
            <table width="100%"border="0"cellspacing="0"cellpadding="0"class="kuang">
                <tr><td>
                        <h1>Your Payment was successful</h1>
                        <h1>Thank you for your payment. </h1>
                        <p><img src="/images/frontStore/wechat-payments-successful.jpg" alt="" style="border: none;" width="100%"   border="0"></p>
                    </td>
                </tr>
            </table>
            <div id="failRt"></div>
        </li>
    </ul>
</div>
<div id="payDom" class="cardexplain">
    <div class="footReturn" style="text-align:center">
        <input type="button" style="margin:0 auto 20px auto;width:100%" onclick="done();" class="submit"value="Done"/>
    </div>
</div>

@endsection
<script language="javascript">
    function done() {

        location.href='/store_home';
    }
</script> 