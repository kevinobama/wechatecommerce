@extends('layouts.shop_admin')

@section('content')
<div class="container">

    <h1>UserWithdrawDeposit {{ $userwithdrawdeposit->id }}
        <a href="{{ url('store/user-withdraw-deposits/' . $userwithdrawdeposit->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit UserWithdrawDeposit"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['store/userwithdrawdeposits', $userwithdrawdeposit->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete UserWithdrawDeposit',
                    'onclick'=>'return confirm("Confirm delete?")'
            ));!!}
        {!! Form::close() !!}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $userwithdrawdeposit->id }}</td>
                </tr>
                <tr><th> User Id </th><td> {{ $userwithdrawdeposit->user_id }} </td></tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
