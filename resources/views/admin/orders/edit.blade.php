@extends('layouts.shop_admin')

@section('content')
<div class="container">

    <h1>编辑订单</h1>

    {!! Form::model($order, [
        'method' => 'PATCH',
        'url' => ['/admin/orders', $order->id],
        'class' => 'form-horizontal'
    ]) !!}

    <div class="form-group {{ $errors->has('express_company') ? 'has-error' : ''}}">
        {!! Form::label('express_company', ' 快递公司', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::text('express_company', null, ['class' => 'form-control', 'required' => 'required']) !!}
            {!! $errors->first('express_company', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="form-group {{ $errors->has('express_number') ? 'has-error' : ''}}">
        {!! Form::label('express_number', '快递单号', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::text('express_number', null, ['class' => 'form-control', 'required' => 'required']) !!}
            {!! $errors->first('express_number', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

    <div class="form-group {{ $errors->has('quantity') ? 'has-error' : ''}}">
        {!! Form::label('quantity', '数量', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::text('quantity', null, ['readonly','class' => 'form-control', 'required' => 'required']) !!}
            {!! $errors->first('quantity', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    {{--<div class="form-group {{ $errors->has('single_amount') ? 'has-error' : ''}}">--}}
        {{--{!! Form::label('single_amount', 'Single Amount', ['class' => 'col-sm-3 control-label']) !!}--}}
        {{--<div class="col-sm-6">--}}
            {{--{!! Form::text('single_amount', null, ['class' => 'form-control', 'required' => 'required']) !!}--}}
            {{--{!! $errors->first('single_amount', '<p class="help-block">:message</p>') !!}--}}
        {{--</div>--}}
    {{--</div>--}}
    <div class="form-group {{ $errors->has('total_amount') ? 'has-error' : ''}}">
        {!! Form::label('total_amount', '总金额', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::text('total_amount', null, ['readonly','class' => 'form-control', 'required' => 'required']) !!}
            {!! $errors->first('total_amount', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    {{--<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">--}}
        {{--{!! Form::label('status', 'Status', ['class' => 'col-sm-3 control-label']) !!}--}}
        {{--<div class="col-sm-6">--}}
            {{--{!! Form::text('status', null, ['class' => 'form-control', 'required' => 'required']) !!}--}}
            {{--{!! $errors->first('status', '<p class="help-block">:message</p>') !!}--}}
        {{--</div>--}}
    {{--</div>--}}

    <div class="form-group {{ $errors->has('customer_name') ? 'has-error' : ''}}">
        {!! Form::label('customer_name', '顾客姓名', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::text('customer_name', null, ['readonly','class' => 'form-control', 'required' => 'required']) !!}
            {!! $errors->first('customer_name', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="form-group {{ $errors->has('customer_address') ? 'has-error' : ''}}">
        {!! Form::label('customer_address', '客户地址', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::text('customer_address', null, ['readonly','class' => 'form-control', 'required' => 'required']) !!}
            {!! $errors->first('customer_address', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

    <div class="form-group {{ $errors->has('shipping_method') ? 'has-error' : ''}}">
        {!! Form::label('shipping_method', '运输方式', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::text('shipping_method', null, ['readonly','class' => 'form-control', 'required' => 'required']) !!}
            {!! $errors->first('shipping_method', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

    {{--<div class="form-group {{ $errors->has('customer_note') ? 'has-error' : ''}}">--}}
        {{--{!! Form::label('customer_note', 'Customer Note', ['class' => 'col-sm-3 control-label']) !!}--}}
        {{--<div class="col-sm-6">--}}
            {{--{!! Form::text('customer_note', null, ['class' => 'form-control', 'required' => 'required']) !!}--}}
            {{--{!! $errors->first('customer_note', '<p class="help-block">:message</p>') !!}--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="form-group {{ $errors->has('total_item_count') ? 'has-error' : ''}}">--}}
        {{--{!! Form::label('total_item_count', 'Total Item Count', ['class' => 'col-sm-3 control-label']) !!}--}}
        {{--<div class="col-sm-6">--}}
            {{--{!! Form::text('total_item_count', null, ['class' => 'form-control', 'required' => 'required']) !!}--}}
            {{--{!! $errors->first('total_item_count', '<p class="help-block">:message</p>') !!}--}}
        {{--</div>--}}
    {{--</div>--}}

    {{--<div class="form-group {{ $errors->has('shipping_arrival_date') ? 'has-error' : ''}}">--}}
        {{--{!! Form::label('shipping_arrival_date', 'Shipping Arrival Date', ['class' => 'col-sm-3 control-label']) !!}--}}
        {{--<div class="col-sm-6">--}}
            {{--{!! Form::text('shipping_arrival_date', null, ['class' => 'form-control', 'required' => 'required']) !!}--}}
            {{--{!! $errors->first('shipping_arrival_date', '<p class="help-block">:message</p>') !!}--}}
        {{--</div>--}}
    {{--</div>--}}

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
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