@extends('layouts.shop_admin')

@section('content')
<div class="container">

    <h1>Order_payment {{ $order_payment->id }}
        <a href="{{ url('admin/order_payments/' . $order_payment->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Order_payment"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['admin/order_payments', $order_payment->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete Order_payment',
                    'onclick'=>'return confirm("Confirm delete?")'
            ));!!}
        {!! Form::close() !!}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $order_payment->id }}</td>
                </tr>
                <tr><th> Id </th><td> {{ $order_payment->id }} </td></tr><tr><th> Order Id </th><td> {{ $order_payment->order_id }} </td></tr><tr><th> Payment Gateway </th><td> {{ $order_payment->payment_gateway }} </td></tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
