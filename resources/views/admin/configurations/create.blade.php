@extends('layouts.shop_admin')

@section('content')
<div class="container">

    <h1>Create New Configuration</h1>
    <hr/>

    {!! Form::open(['url' => '/admin/configurations', 'class' => 'form-horizontal']) !!}

                <div class="form-group {{ $errors->has('config_id') ? 'has-error' : ''}}">
                {!! Form::label('config_id', 'Config Id', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('config_id', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('config_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('scope') ? 'has-error' : ''}}">
                {!! Form::label('scope', 'Scope', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('scope', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('scope', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('scope_id') ? 'has-error' : ''}}">
                {!! Form::label('scope_id', 'Scope Id', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('scope_id', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('scope_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('path') ? 'has-error' : ''}}">
                {!! Form::label('path', 'Path', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('path', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('path', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('value') ? 'has-error' : ''}}">
                {!! Form::label('value', 'Value', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('value', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('value', '<p class="help-block">:message</p>') !!}
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