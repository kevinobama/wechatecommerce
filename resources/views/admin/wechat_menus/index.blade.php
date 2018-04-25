@extends('layouts.shop_admin')

@section('content')
<div class="container">
    <h1>menus</h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>menus|
                        <a href="/admin/wechat_menus/create">Create</a>|
                        <a href="/admin/wechat_menus/destroy">Delete</a>
                    </th>
                </tr>
            </thead>
            <tbody>
            <td height="170"><pre><code>{{ $menus }}</code></pre></td>
            </tbody>
        </table>
    </div>
</div>
@endsection
