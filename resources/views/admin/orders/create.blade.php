@extends('layouts.shop_admin')

@section('content')
<div class="container">

    <h1>Create New Order</h1>
    <hr/>

    {!! Form::open(['url' => '/admin/orders', 'class' => 'form-horizontal']) !!}

            <div class="form-group {{ $errors->has('repeat_purchase_amount') ? 'has-error' : ''}}">
                {!! Form::label('repeat_purchase_amount', 'Repeat Purchase Amount', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('repeat_purchase_amount', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('repeat_purchase_amount', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('increment_id') ? 'has-error' : ''}}">
                {!! Form::label('increment_id', 'Increment Id', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('increment_id', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('increment_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('customer_id') ? 'has-error' : ''}}">
                {!! Form::label('customer_id', 'Customer Id', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('customer_id', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('customer_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('product_id') ? 'has-error' : ''}}">
                {!! Form::label('product_id', 'Product Id', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('product_id', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('product_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('quantity') ? 'has-error' : ''}}">
                {!! Form::label('quantity', 'Quantity', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('quantity', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('quantity', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('single_amount') ? 'has-error' : ''}}">
                {!! Form::label('single_amount', 'Single Amount', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('single_amount', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('single_amount', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('total_amount') ? 'has-error' : ''}}">
                {!! Form::label('total_amount', 'Total Amount', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('total_amount', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('total_amount', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
                {!! Form::label('status', 'Status', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('status', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('customer_email') ? 'has-error' : ''}}">
                {!! Form::label('customer_email', 'Customer Email', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('customer_email', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('customer_email', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('customer_name') ? 'has-error' : ''}}">
                {!! Form::label('customer_name', 'Customer Name', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('customer_name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('customer_name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('customer_address') ? 'has-error' : ''}}">
                {!! Form::label('customer_address', 'Customer Address', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('customer_address', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('customer_address', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('remote_ip') ? 'has-error' : ''}}">
                {!! Form::label('remote_ip', 'Remote Ip', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('remote_ip', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('remote_ip', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('shipping_method') ? 'has-error' : ''}}">
                {!! Form::label('shipping_method', 'Shipping Method', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('shipping_method', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('shipping_method', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('x_forwarded_for') ? 'has-error' : ''}}">
                {!! Form::label('x_forwarded_for', 'X Forwarded For', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('x_forwarded_for', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('x_forwarded_for', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('customer_note') ? 'has-error' : ''}}">
                {!! Form::label('customer_note', 'Customer Note', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('customer_note', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('customer_note', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('total_item_count') ? 'has-error' : ''}}">
                {!! Form::label('total_item_count', 'Total Item Count', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('total_item_count', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('total_item_count', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('customer_gender') ? 'has-error' : ''}}">
                {!! Form::label('customer_gender', 'Customer Gender', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('customer_gender', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('customer_gender', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('shipping_arrival_date') ? 'has-error' : ''}}">
                {!! Form::label('shipping_arrival_date', 'Shipping Arrival Date', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('shipping_arrival_date', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('shipping_arrival_date', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Create', ['class' => 'btn btn-primary form-control']) !!}
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