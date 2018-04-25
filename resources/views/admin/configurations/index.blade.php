@extends('layouts.shop_admin')

@section('content')
<div class="container">

    <h1>Configurations <a href="{{ url('/admin/configurations/create') }}" class="btn btn-primary btn-xs" title="Add New Configuration"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> Config Id </th><th> Scope </th><th> Scope Id </th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($configurations as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->config_id }}</td><td>{{ $item->scope }}</td><td>{{ $item->scope_id }}</td>
                    <td>
                        <a href="{{ url('/admin/configurations/' . $item->id) }}" class="btn btn-success btn-xs" title="View Configuration"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        <a href="{{ url('/admin/configurations/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Configuration"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/admin/configurations', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Configuration" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Configuration',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $configurations->render() !!} </div>
    </div>

</div>
@endsection
