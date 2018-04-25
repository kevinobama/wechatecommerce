@foreach($orders as $key => $order)
    <div class="site">
        <div class="dizhi">
            <div class='msg'>
                <p class='left' id="customer_addresses">
                    订单编号：{{ $order->out_trade_no }}<br>
                    订单金额：{{ $order->total_amount }}<br>
                    订单时间：{{ $order->created_at }}<br>
                    支付状态：{{ OrderHelper::paymentStatus($order->payment_status) }}
                    @if((int)$order->payment_status === 0)
                        <a href="/store/orders/{{ $order->id }}" style="color:red;font-size: large">
                        &nbsp;现在支付
                        </a>
                    @endif
                    <br>
                    订单状态：{{ OrderHelper::orderStatus($order->status) }}<br>
                    商品名称：{{ $order->product['name'] }}<br>
                    订单详情：微信首发版<br>
                    快递公司：{{ $order->product['express_company'] }}<br>
                    快递单号：{{ $order->product['express_number'] }}<br>
                    {{--剩余支付时间：<br>--}}
                    {{--<input type="submit" name="buttionAction"    class="btn btn-warning" value="取消">--}}
                </p>
            </div>
        </div>
    </div>
@endforeach