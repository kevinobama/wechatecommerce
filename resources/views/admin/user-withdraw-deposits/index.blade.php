@extends('layouts.shop_admin')

@section('content')
<div class="container">
    <h1>{{ Lang::get('menu.withdrawDeposits.UserWithdrawDeposit') }}</h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>{{ Lang::get('menu.id') }}</th>
                    <th>{{ Lang::get('menu.withdrawDeposits.UserName') }}</th>
                    <th>{{ Lang::get('menu.withdrawDeposits.amount') }}</th>
                    <th>{{ Lang::get('menu.withdrawDeposits.status') }}</th>
                    <th>{{ Lang::get('menu.withdrawDeposits.mch_billno') }}</th>
                    <th>{{ Lang::get('menu.created_at') }}</th>
                    <th>{{ Lang::get('menu.actions') }}</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($userwithdrawdeposits as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->user['name'] }}</td>
                    <td>{{ $item->amount }}</td>
                    <td>
                        @if($item->status == 0)
                            待发红包
                        @elseif($item->status == 1)
                            已发红包
                        @elseif($item->status == 2)
                            已收红包
                        @elseif($item->status == 3)
                            未收红包
                        @endif
                    </td>

                    <td>{{ $item->mch_billno }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>
                        <a href="{{ url('/admin/user-withdraw-deposits/' . $item->id) }}" class="btn btn-success btn-xs" title="View UserWithdrawDeposit">{{  Lang::get('menu.view') }}</a>
                        <a href="{{ url('/admin/user-withdraw-deposits/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" onclick="return confirm('Are you sure you want to send red packet?');" title="Edit UserWithdrawDeposit">{{  Lang::get('menu.edit') }}</a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/admin/user-withdraw-deposits', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button(Lang::get('menu.delete'), array(
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
