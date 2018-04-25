@extends('layouts.shop_admin')

@section('content')
<div class="container">

    <h1>{{ Lang::get('menu.categories') }} <a href="{{ url('/admin/categories/create') }}" class="btn btn-primary btn-xs" title="Add New Category"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th> {{ Lang::get('menu.id') }} </th>
                    <th> {{ Lang::get('menu.Name') }} </th>

                    <th>{{ Lang::get('menu.actions') }}</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($categories as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                        <a href="{{ url('/admin/categories/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Category">{{ Lang::get('menu.edit') }}</a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/admin/categories', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button(Lang::get('menu.delete'), array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Category',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $categories->render() !!} </div>
    </div>

</div>
@endsection
