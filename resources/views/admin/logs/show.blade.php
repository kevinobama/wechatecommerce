@extends('layouts.shop_admin')

@section('content')
<div class="container">

    <h1>Log {{ $log->id }}
        <a href="{{ url('admin/logs/' . $log->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Log"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['admin/logs', $log->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete Log',
                    'onclick'=>'return confirm("Confirm delete?")'
            ));!!}
        {!! Form::close() !!}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $log->id }}</td>
                </tr>
                <tr><th> Title </th><td> {{ $log->title }} </td></tr><tr><th> Log Content </th><td> {{ $log->log_content }} </td></tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
