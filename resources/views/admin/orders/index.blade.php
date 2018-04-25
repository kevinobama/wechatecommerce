@extends('layouts.shop_admin')

@section('content')
<div class="container">

    <h1>{{ Lang::get('menu.order.orders') }} </h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>{{ Lang::get('menu.order.goods') }}</th>
                    <th>{{ Lang::get('menu.order.quantity') }}</th>
                    <th>{{ Lang::get('menu.order.customer') }}</th>
                    <th>{{ Lang::get('menu.order.Amount') }}</th>
                    <th>{{ Lang::get('menu.order.payment_status') }}</th>
                    <th>{{ Lang::get('menu.order.status') }}</th>
                    <th>{{ Lang::get('menu.actions') }}</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($orders as $item)
                <tr>
                    <td>{{ Lang::get('menu.order.orders') }}id:{{ $item->id }}</td>
                    <td colspan="5">{{ Lang::get('menu.order.orders') }} {{ Lang::get('menu.id') }}:{{ $item->out_trade_no }}</td>
                    <td>{{ Lang::get('menu.order.OrderDateTime') }}:{{ $item->created_at }}</td>
                </tr>
                <tr>
                    <td>{{ $item->product['name'] }}<br>
                        <img width='70' height='70' src="/images/products/{{ $item->product['image'] }}">

                        <br>
                        客户备注:{{ $item->customer_note }}
                    </td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->customer_id }}</td>
                    <td>{{ $item->total_amount }}
                        @if ($item->shipping_fee > 0)
                            ({{ Lang::get('menu.order.shipping_fee') }}:{{ $item->shipping_fee }})
                        @endif
                    </td>
                    <td>
                            <span  class="text-danger">{{ OrderHelper::paymentStatus($item->payment_status) }}</span>
                    </td>
                    <td>
                        @if($item->status == 'Processing')
                            <span  class="text-danger">{{ OrderHelper::orderStatus($item->status) }}</span>
                        @else
                            <span class="text-success"> {{ OrderHelper::orderStatus($item->status) }}</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ url('/admin/orders/create?id=' . $item->id) }}" class="btn btn-primary btn-xs" title="发货">发货</a>
                        <a href="{{ url('/admin/orders/' . $item->id) }}" class="btn btn-success btn-xs" title="View Order">{{ Lang::get('menu.view') }}</a>
                        <a href="{{ url('/admin/orders/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Order">{{ Lang::get('menu.edit') }}</a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/admin/orders', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button(Lang::get('menu.delete'), array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Order',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
                <tr>
                    <td colspan="7">{{ Lang::get('menu.order.customer') }}:{{ $item->customer_name }},{{ Lang::get('menu.order.Address') }}:{{ $item->customer_address }}</td>
                </tr>
                <td colspan="7" style="background-color: #98AFC7;line-height: 1px;">&nbsp;</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $orders->render() !!} </div>
    </div>

</div>
@endsection
