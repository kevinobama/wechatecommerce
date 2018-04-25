@extends('layouts.shop_admin')

@section('content')
<div class="container">

    <h1>{{ Lang::get('menu.withdrawDeposits.UserWithdrawDeposit') }}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>{{ Lang::get('menu.id') }}</th><td>{{ $userwithdrawdeposit->id }}</td>
                </tr>
                <tr>
                    <th>红包</th><td>{{ $userwithdrawdeposit->red_packet_result }}</td>
                </tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
