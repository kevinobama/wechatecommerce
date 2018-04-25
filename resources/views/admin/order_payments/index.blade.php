@extends('layouts.shop_admin')

@section('content')
<div class="container">

    <h1>Order_payments <a href="{{ url('/admin/order_payments/create') }}" class="btn btn-primary btn-xs" title="Add New Order_payment"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> Id </th><th> Order Id </th><th> Payment Gateway </th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($order_payments as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->id }}</td><td>{{ $item->order_id }}</td><td>{{ $item->payment_gateway }}</td>
                    <td>
                        <a href="{{ url('/admin/order_payments/' . $item->id) }}" class="btn btn-success btn-xs" title="View Order_payment"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        <a href="{{ url('/admin/order_payments/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Order_payment"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/admin/order_payments', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Order_payment" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Order_payment',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $order_payments->render() !!} </div>
    </div>

</div>
@endsection
