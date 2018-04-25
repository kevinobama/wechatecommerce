@extends('layouts.shop_admin')

@section('content')
<div class="container">

    <h1>Ecommerce {{ $ecommerce->id }}
        <a href="{{ url('admin/ecommerces/' . $ecommerce->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Ecommerce"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['admin/ecommerces', $ecommerce->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete Ecommerce',
                    'onclick'=>'return confirm("Confirm delete?")'
            ));!!}
        {!! Form::close() !!}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $ecommerce->id }}</td>
                </tr>
                <tr><th> Title </th><td> {{ $ecommerce->title }} </td></tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
