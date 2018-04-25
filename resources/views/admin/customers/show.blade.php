@extends('layouts.shop_admin')

@section('content')
<div class="container">

    <h1>Customer {{ $customer->id }}
        <a href="{{ url('admin/customers/' . $customer->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Customer"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['admin/customers', $customer->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete Customer',
                    'onclick'=>'return confirm("Confirm delete?")'
            ));!!}
        {!! Form::close() !!}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $customer->id }}</td>
                </tr>
                <tr><th> Id </th><td> {{ $customer->id }} </td></tr><tr><th> Nickname </th><td> {{ $customer->nickname }} </td></tr><tr><th> Gender </th><td> {{ $customer->gender }} </td></tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
