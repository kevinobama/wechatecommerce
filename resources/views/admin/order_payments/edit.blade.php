@extends('layouts.shop_admin')

@section('content')
<div class="container">

    <h1>Edit Order_payment {{ $order_payment->id }}</h1>

    {!! Form::model($order_payment, [
        'method' => 'PATCH',
        'url' => ['/admin/order_payments', $order_payment->id],
        'class' => 'form-horizontal'
    ]) !!}

                <div class="form-group {{ $errors->has('id') ? 'has-error' : ''}}">
                {!! Form::label('id', 'Id', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('id', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('order_id') ? 'has-error' : ''}}">
                {!! Form::label('order_id', 'Order Id', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('order_id', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('order_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('payment_gateway') ? 'has-error' : ''}}">
                {!! Form::label('payment_gateway', 'Payment Gateway', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('payment_gateway', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('payment_gateway', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('total_amount') ? 'has-error' : ''}}">
                {!! Form::label('total_amount', 'Total Amount', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('total_amount', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('total_amount', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('ip_address') ? 'has-error' : ''}}">
                {!! Form::label('ip_address', 'Ip Address', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('ip_address', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('ip_address', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('created_at') ? 'has-error' : ''}}">
                {!! Form::label('created_at', 'Created At', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('created_at', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('created_at', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('successful_at') ? 'has-error' : ''}}">
                {!! Form::label('successful_at', 'Successful At', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('successful_at', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('successful_at', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
                {!! Form::label('status', 'Status', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('status', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    </div>
    {!! Form::close() !!}

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

</div>
@endsection