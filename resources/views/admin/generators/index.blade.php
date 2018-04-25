@extends('layouts.shop_admin')

@section('content')
<div class="container">
    <h1>generators</h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
            <tr>
                <td>
                    @foreach($tables as $table)
                        @if ($currentTable == $table->Tables_in_wechatecommerce)
                            {{$table->Tables_in_wechatecommerce}}
                        @else
                            <a href="/admin/generators/index?table={{$table->Tables_in_wechatecommerce}}">
                            {{$table->Tables_in_wechatecommerce}} </a>
                        @endif
                            |
                    @endforeach
                </td>
            </tr>
            </tbody>
        </table>
        <table class="table table-bordered table-striped table-hover">
            <tbody>
            <tr>
                <td><textarea cols="150" rows="15">
                    php artisan crud:generate {{ $namespace }} --fields="@foreach($tableColumns as $key=>$column){{ $column->Field }}#string#required @if ($columnsCount[0]->count != $key+1), @endif   @endforeach" --route=yes --pk=id --view-path="admin" --namespace=Admin --route-group=admin

                    </textarea>
                </td>
            </tr>
            <tr>
                <td><textarea cols="150" rows="20">
                    @foreach($tableColumns as $key=>$column)
                        <tr>
                            <th>{{ $column->Field }}</th>
                            <td>start {{ '$product->'.$column->Field }} end</td>
                        </tr>
                    @endforeach
                    </textarea>
                </td>
            </tr>

            </tbody>
        </table>

    </div>

</div>
@endsection
