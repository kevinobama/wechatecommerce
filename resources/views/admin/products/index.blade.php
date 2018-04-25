@extends('layouts.shop_admin')

@section('content')
<div class="container">
    <ul class="nav nav-tabs">
        <li class="active"><a href="/admin/products">{{ Lang::get('menu.management') }}</a></li>
        <li ><a href="/admin/products/create">{{ Lang::get('menu.create') }}</a></li>
    </ul>
    <h1>{{ Lang::get('menu.products') }}  {{ Lang::get('menu.management') }} <a href="{{ url('/admin/products/create') }}" class="btn btn-primary btn-xs" title="Add New Product"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>详细</th>
                    <th>价格</th>
                    <th>库存</th>
                    <th>创建时间</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
            @foreach($products as $item)
                <tr>
                    <td>
                    <table>
                        <tr>
                            <td><img src="/images/products/{{ $item->image }}" width="50" height="50"></td>
                            <td>ID:{{ $item->id }}&nbsp;&nbsp;<strong>{{ $item->name }}</strong><br>
                                Category:{{ $item->category_id }}&nbsp;|Status:{{ $item->status }}<br>
                                <a href="/admin/products/{{ $item->id }}">Copy the link</a>
                                 &nbsp;|unavailable<br>
                            </td>
                        </tr>
                    </table>
                    </td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->sku }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>
                        <a href="{{ url('/admin/products/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Product">{{ Lang::get('menu.edit') }}</a>
                        <a href="{{ url('/admin/products/' . $item->id) }}" class="btn btn-success btn-xs" title="View Product">{{ Lang::get('menu.view') }}</a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/admin/products', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button(Lang::get('menu.delete'), array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Product',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $products->render() !!} </div>
    </div>

</div>
@endsection
