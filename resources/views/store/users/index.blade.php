@extends('layouts.mobile_store')

@section('content')
<link type="text/css"  rel='stylesheet' href="/css/frontStore/users.css">
<div id="member-container" style="display: block;">

    <div class="div_header">
        <img width="100%" src="/images/frontStore/ProfileBackground.png">
        <div class="con">
            <div style="margin:0 auto;margin-left:20px;align-self: center;">
                <div class="tx">
                    <img src='{{ $user->head_img_url }}' style='width:10.0rem;'>                    </div>
                <div class="nr">
                    <div class="hang">
                        {{  $user->name }} &nbsp; ID：{{ $user->id }}
                        </div>
                    <div class="hang">会员：
                        @if ($orderCount == 0 )
                            我还不是代言人
                        @else
                            <a style="color:#fff;" href='javascript:void(0);'>我是代言人</a>
                        @endif
                    </div>
                    @if ($orderCount == 0 )
                    <div class="hang"><a style="color:#fff;" href='/store_home'>点击链接成为会员</a></div>
                    @endif
                </div>
            </div>
        </div>
        <div class="fig">
            &nbsp;
        </div>
    </div>

	<div class="div_table">
        <div class="box100"><p>您是由[
                @if($user->parent_user_name_one)
                    {{ $user->parent_user_name_one }}
                @else
                    World Queen
                @endif
                ]推荐</p></div>
        <div class="box"><span>{{ $paidAmount }}元</span><p>销售额</p></div>
        <div class="bor"></div>
        <div class="box"><span>{{ $user->money }}元</span><p>我的奖励</p></div>
    </div>

    <div class="card">
        <div class="div_ul" id="all_cnt" >
            <div class="bt"><span><img style='margin-left:5px;margin-right:5px;' height="14px" src="/images/frontStore/ac.png"></span><span>我是代言人</span></div>
            <div class="sz"><span class="kuang">0 (0)</span></div>
        </div>
        <ul id="iAmSalesman" class="round" style="display: none;">
            <li class="member_cnt" style=""><span><img style="width:20px;height:20px;" src="/images/frontStore/bullet_blue_expand.png">代言人<span class="fortune_amount">0 (0)</span></span></li>
        </ul>
    </div>

    <div class="card">
        <div class="div_ul" id="all_buy"><div class="bt"><span><img style='margin-left:5px;margin-right:5px;' height="14px" src="/images/frontStore/ac.png"></span><span>代言人推广</span></div><div class="sz"><span class="kuang">0单(￥{{ $unpaidAmount+$paidAmount }})</span></div></div>
        <ul id="salesmanPromotion" class="round" style="display: none;">
            <li class="buy_cnt"><a href="#"><span>下单未购买<span class="fortune_amount">0 (￥{{ $unpaidAmount }})</span></span></a></li>
            <li class="buy_cnt"><a href="#"><span>下单已购买<span class="fortune_amount">0 (￥{{ $paidAmount }})</span></span></a></li>
        </ul>
    </div>

    <div class="card" >
        <div class="div_ul" id="all_price"><div class="bt"><span><img style='margin-left:5px;margin-right:5px;' height="14px" src="/images/frontStore/ac.png"></span><span>我的财富</span></div><div class="sz"><span class="kuang">￥{{ $user->money }}</span></div></div>
        <ul class="round" id="myFortune" style="display: none;">
            <li class="price_cnt"><span>未付款定单财富<span class="fortune_amount">{{ $user->unpaid_fortune }}</span></span></li>
            <li class="price_cnt"><span>已付款定单财富<span class="fortune_amount">{{ $user->paid_fortune }}</span></span></li>
            <li class="price_cnt"><span>已收货定单财富<span class="fortune_amount">{{ $user->received_goods_fortune }}</span></span></li>
            <li class="price_cnt"><span>已完成定单财富<span class="fortune_amount">{{ $user->completed_fortune }}</span></span></li>
            <li class="price_cnt"><span>已提现财富<span class="fortune_amount">{{ $user->withdrawal }}</span></span></li>
            <li class="price_cnt"><span>可提现财富<span class="fortune_amount">{{ $user->money }}</span></span></li>
        </ul>
    </div>

    <div class="card">
        <div class="div_ul" onClick="applyForCash();">
            <div class="bt"><span><img style='margin-left:5px;margin-right:5px;' height="14px" src="/images/frontStore/ac.png"></span><span>申请提现</span></div>
            <div class="sz"><span class="tu"><img style='margin-left:5px;' height="20px" src="/images/frontStore/tit.png"></span></div></div>
    </div>
</div>

{{--<div id="ticket-container" style="display: none;">--}}
    {{--<img src='/Public/Uploads/57a046cbe2152.jpg?2016100607' style="width:100%">--}}
{{--</div>--}}

<div id="tx-container" style="display: none;">
    <div class="menu_header">
        <div class="menu_topbar">
            <div id="menu" class="sort ">
                <a href="">申请提现</a>
            </div>
        </div>
    </div>

    <div class="div_header">
        <img width="100%" src="/images/frontStore/ProfileBackground.png">
        <div class="con">
            <div style="margin:0 auto;margin-left:20px;align-self: center;">
                <div class="tx">
                    <img src='{{ $user->head_img_url }}' style='width:10.0rem;'>                    </div>
                <div class="nr">
                    <div class="hang">
                        {{  $user->name }} &nbsp; ID：{{ $user->id }}
                    </div>
                    <div class="hang">会员：
                        @if ($orderCount == 0 )
                            我还不是代言人
                        {{--@else--}}
                            {{--<a style="color:#fff;" href='/store/users/myqrcode'>我的二维码</a>--}}
                        @endif
                                    <!--<p><button class="btn-success" id="checkJsApi">checkJsApi</button></p>
                        <p><button class="btn-success" id="onMenuShareAppMessage">onMenuShareAppMessage</button></p>
                        -->
                    </div>

                    @if ($orderCount == 0 )
                        <div class="hang"><a style="color:#fff;" href='/store_home'>点击链接成为会员</a></div>
                    @endif
                </div>
            </div>
        </div>
        <div class="fig">
            &nbsp;
        </div>
    </div>

    <section class="order" style="background-color: white; ">
        {!! Form::open(['id' => 'user-withdraw-deposits', 'url' => '/store/user-withdraw-deposits', 'class' => 'form-horizontal']) !!}
            <div class="contact-info">
                <ul>
                    <li class="title">提现信息</li>
                    <li>
                        <table style="padding: 0; margin: 0; width: 100%;">
                            <tbody>
                            <tr>
                                <td width="80px"><label for="price" class="ui-input-text">提现金额：</label></td>
                                <td>
                                    <div class="ui-input-text">
                                        {!! Form::number('amount', 0, ['id'=>'amount', 'class' => 'form-control']) !!}
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="footReturn" style="padding: 10px 10px 10px 10px;">
                            <p class="text-center">
                                {!! Form::submit('确定提交', ['class' => 'btn btn-primary form-control']) !!}
                                {!! Form::hidden('status', 0) !!}
                            </p>
                        </div>
                    </li>
                </ul>
            </div>
        {!! Form::close() !!}

        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </section>

    <ul class="round" style="padding-top: 20px;">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="cpbiaoge">
            <tr>
                <th>编号</th>
                <th class="cc">金额</th>
                <th class="cc">状态</th>
            </tr>
            <tbody>
            @foreach($userWithdrawDeposits as $userWithdrawDeposit)
                <tr>
                    <td>{{ $userWithdrawDeposit->id }}</td>
                    <td>{{ $userWithdrawDeposit->amount }}</td>
                    <td>
                        @if($userWithdrawDeposit->status == 0)
                            待发红包
                        @elseif($userWithdrawDeposit->status == 1)
                            已发红包
                        @elseif($userWithdrawDeposit->status == 2)
                            已收红包
                        @elseif($userWithdrawDeposit->status == 3)
                            未收红包
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </ul>
</div>
@include('layouts.partials.store.footer')
<script language="javascript">
var commissionMoney = {{  $user->money }};
$(document).ready(function() {
    $('#all_cnt').click(function(){
        if ($("#iAmSalesman").css("display") == 'block') {
            $('#iAmSalesman').hide();
        } else {
            $('#iAmSalesman').show();
        }
    });

    $('#all_buy').click(function(){
        if ($("#salesmanPromotion").css("display") == 'block') {
            $('#salesmanPromotion').hide();
        } else {
            $('#salesmanPromotion').show();
        }
    });

    $('#all_price').click(function(){
        if ($("#myFortune").css("display") == 'block') {
            $('#myFortune').hide();
        } else {
            $('#myFortune').show();
        }
    });
    $('#user-withdraw-deposits').submit(function() {
        var amount = $('#amount').val();
        if (amount < 5 || amount >200) {
            alert("提现金额只允许5-200元.你输入的佣金:" + amount);
            return false;
        }
        if (commissionMoney < amount) {
            alert("佣金不足提现范围：5－200元!,你的佣金余额是：" + commissionMoney + '元');
            return false;
        }
    });
});
function applyForCash() {
    $('#tx-container').show();
    $('#member-container').hide();
    $('.menu_header').hide();
}
</script>

@endsection
