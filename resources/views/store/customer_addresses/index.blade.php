@extends('layouts.shop_admin')

@section('content')
<div class="container">

    <h1>Customer_addresses <a href="{{ url('/store/customer_addresses/create') }}" class="btn btn-primary btn-xs" title="Add New Customer_address"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> User Id </th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($customer_addresses as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->user_id }}</td>
                    <td>
                        <a href="{{ url('/store/customer_addresses/' . $item->id) }}" class="btn btn-success btn-xs" title="View Customer_address"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        <a href="{{ url('/store/customer_addresses/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Customer_address"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/store/customer_addresses', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Customer_address" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Customer_address',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $customer_addresses->render() !!} </div>
    </div>

</div>
@endsection
