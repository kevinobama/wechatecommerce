@extends('layouts.shop_admin')

@section('content')
<div class="container">

    <h1>CustomerServiceMessage {{ $customerservicemessage->id }}
        <a href="{{ url('admin/customer-service-messages/' . $customerservicemessage->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit CustomerServiceMessage"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['admin/customerservicemessages', $customerservicemessage->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete CustomerServiceMessage',
                    'onclick'=>'return confirm("Confirm delete?")'
            ));!!}
        {!! Form::close() !!}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $customerservicemessage->id }}</td>
                </tr>
                <tr><th> Name </th><td> {{ $customerservicemessage->name }} </td></tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
