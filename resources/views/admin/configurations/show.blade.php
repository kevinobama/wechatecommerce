@extends('layouts.shop_admin')

@section('content')
<div class="container">

    <h1>Configuration {{ $configuration->id }}
        <a href="{{ url('admin/configurations/' . $configuration->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Configuration"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['admin/configurations', $configuration->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete Configuration',
                    'onclick'=>'return confirm("Confirm delete?")'
            ));!!}
        {!! Form::close() !!}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $configuration->id }}</td>
                </tr>
                <tr><th> Config Id </th><td> {{ $configuration->config_id }} </td></tr><tr><th> Scope </th><td> {{ $configuration->scope }} </td></tr><tr><th> Scope Id </th><td> {{ $configuration->scope_id }} </td></tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
