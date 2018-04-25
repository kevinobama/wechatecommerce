@extends('layouts.shop_admin')

@section('content')
<div class="container">

    <h1>Userwithdrawdeposits <a href="{{ url('/store/user-withdraw-deposits/create') }}" class="btn btn-primary btn-xs" title="Add New UserWithdrawDeposit"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> User Id </th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($userwithdrawdeposits as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->user_id }}</td>
                    <td>
                        <a href="{{ url('/store/user-withdraw-deposits/' . $item->id) }}" class="btn btn-success btn-xs" title="View UserWithdrawDeposit"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        <a href="{{ url('/store/user-withdraw-deposits/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit UserWithdrawDeposit"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/store/user-withdraw-deposits', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete UserWithdrawDeposit" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete UserWithdrawDeposit',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $userwithdrawdeposits->render() !!} </div>
    </div>

</div>
@endsection
