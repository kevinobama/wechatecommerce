@extends('layouts.shop_admin')

@section('content')
<div class="container">

    <h1>用户
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $user->id }}</td>
                </tr>
                <tr><th> 名称 </th><td> {{ $user->name }} </td></tr>
                <tr><th> 订单数 </th><td> {{ $user->orders->count() }} </td></tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
