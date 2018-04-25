@extends('layouts.shop_admin')

@section('content')
<div class="container">

    <h1>{{ Lang::get('menu.create') }} {{ Lang::get('menu.categories') }}</h1>
    <hr/>

    {!! Form::open(['url' => '/admin/categories', 'class' => 'form-horizontal']) !!}

            <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                {!! Form::label('name', '名称', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('attribute_set_id') ? 'has-error' : ''}}">
                {!! Form::label('attribute_set_id', '属性集标识', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('attribute_set_id', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('attribute_set_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('parent_id') ? 'has-error' : ''}}">
                {!! Form::label('parent_id', '父ID', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('parent_id', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('parent_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

            <div class="form-group {{ $errors->has('path') ? 'has-error' : ''}}">
                {!! Form::label('path', '路径', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('path', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('path', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('position') ? 'has-error' : ''}}">
                {!! Form::label('position', '位置', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('position', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('position', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('level') ? 'has-error' : ''}}">
                {!! Form::label('level', '级别', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('level', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('level', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('children_count') ? 'has-error' : ''}}">
                {!! Form::label('children_count', '子数', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('children_count', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('children_count', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('创建', ['class' => 'btn btn-primary form-control']) !!}
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