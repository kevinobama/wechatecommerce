@extends('layouts.shop_admin')

@section('content')
<div class="container">

    <h1>Customer_address {{ $customer_address->id }}
        <a href="{{ url('store/customer_addresses/' . $customer_address->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Customer_address"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['store/customer_addresses', $customer_address->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete Customer_address',
                    'onclick'=>'return confirm("Confirm delete?")'
            ));!!}
        {!! Form::close() !!}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $customer_address->id }}</td>
                </tr>
                <tr><th> User Id </th><td> {{ $customer_address->user_id }} </td></tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
