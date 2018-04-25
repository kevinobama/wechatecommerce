@extends('layouts.shop_admin')

@section('content')
<div class="container">

    <h1>{{ Lang::get('menu.user.Users') }}</h1>
    {{--<p><a href="{{ url('/admin/users/createUserByFollow') }}" class="btn btn-primary btn-xs">create User By Follow</a></p>--}}
    <div class="table">
        <table class="table table-bordered table-striped table-hover"  >
            <thead>
                <tr>
                    <th>{{ Lang::get('menu.id') }}</th>
                    <th>{{ Lang::get('menu.user.headphoto') }}  </th>
                    <th>{{ Lang::get('menu.user.Name') }}  </th>
                    <th>{{ Lang::get('menu.user.parent_user_name_one') }}</th>
                    <th>{{ Lang::get('menu.user.openid') }}</th>
                    <th>{{ Lang::get('menu.user.expiresin') }}</th>
                    <th>{{ Lang::get('menu.user.follow_at') }}</th>
                    <th>{{ Lang::get('menu.user.lastlogin') }}</th>

                    <th>{{ Lang::get('menu.actions') }}</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($users as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>
                        <img src="{{ $item->head_img_url }}" style="width:10.0rem;">
                    </td>
                    <td>{{ $item->name }}</td>
                    <td>
                        {{ $item->parent_user_name_one }}&nbsp;

                    </td>
                    <td>{{ $item->open_id }}</td>
                    <td>{{ $item->expires_in }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->updated_at }}</td>

                    <td>
                        <a href="{{ url('/admin/users/' . $item->id) }}" class="btn btn-success btn-xs" title="View User">view</a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/admin/users', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete User',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
                <tr>
                    <td colspan="9">
                        上一级:{{ $item->parent_user_name_one }}&nbsp;|
                        上二级:{{ $item->parent_user_name_two }}&nbsp;|
                        上三级:{{ $item->parent_user_name_three }}&nbsp;|

                        下一级:{{ $item->child_user_name_one }}&nbsp;|
                        下二级:{{ $item->child_user_name_two }}&nbsp;|
                        下三级:{{ $item->child_user_name_three }}&nbsp;|
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $users->render() !!} </div>
    </div>

</div>
@endsection
