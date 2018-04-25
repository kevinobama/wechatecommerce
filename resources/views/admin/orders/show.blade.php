@extends('layouts.shop_admin')

@section('content')
<div class="container">
    <h1>订购</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $order->id }}</td>
                </tr>
                <tr>
                    <th>重复购买金额</th>
                    <td> {{ $order->repeat_purchase_amount }} </td>
                </tr>
                <tr>
                    <th> 产品名称 </th><td> {{ $order->product['name'] }} </td>
                </tr>
                <tr>
                    <th> 预付ID </th><td> {{ $order->prepay_id }} </td>
                </tr>
                <tr>
                    <th> out_trade_no </th><td> {{ $order->out_trade_no }} </td>
                </tr>
                <tr>
                    <th> 交易id </th><td> {{ $order->transaction_id }} </td>
                </tr>
                <tr>
                    <th> 用户 </th><td> {{ $order->user }} </td>
                </tr>
                <tr>
                    <th> 用户名</th><td> {{ $order->user['name'] }} </td>
                </tr>
                <tr>
                    <th> 父用户ID一</th><td> {{ $order->user['parent_user_id_one'] }} </td>
                </tr>
                <tr>
                    <th> 顾客姓名 </th><td> {{ $order->customer_name }} </td>
                </tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
