@extends('layouts.shop_admin')

@section('content')
<div class="container">

    <h1>Customerservicemessages <a href="{{ url('/admin/customer-service-messages/create') }}" class="btn btn-primary btn-xs" title="Add New CustomerServiceMessage"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> Name </th><th>Actions</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>

</div>
@endsection
