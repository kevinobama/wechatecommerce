@extends('layouts.shop_admin')

@section('content')
<div class="container">

    <h1>Logs |<a href="{{ url('/admin/logs/create') }}" class="btn btn-primary btn-xs" title="git pull">git pull</a>|
        <a href="{{ url('/admin/logs/truncate') }}" class="btn btn-primary btn-xs" title="empty data">empty data</a>
    </h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <tr>
                <td colspan="4">
                    <textarea name="log_content" cols="119" rows="17">{{ $logContent }}</textarea>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <textarea name="log_content" cols="119" rows="17">{{ $laravelLog }}</textarea>
                </td>
            </tr>
            <thead>
                <tr>
                    <th>Actions</th><th>ID</th><th> Title </th><th> Log Content </th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($logs as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>
                        <a href="{{ url('/admin/logs/' . $item->id) }}" class="btn btn-success btn-xs" title="View Log"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        <a href="{{ url('/admin/logs/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Log"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/admin/logs', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                        {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Log" />', array(
                                'type' => 'submit',
                                'class' => 'btn btn-danger btn-xs',
                                'title' => 'Delete Log',
                                'onclick'=>'return confirm("Confirm delete?")'
                        ));!!}
                        {!! Form::close() !!}
                    </td>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->title }}
                    <br>
                        Create at:{{$item->created_at}}
                    </td>
                    <td>
                        <textarea name="log_content" cols="110" rows="10">{{ $item->log_content }}</textarea>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $logs->render() !!} </div>
    </div>

</div>
@endsection
