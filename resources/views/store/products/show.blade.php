@extends('layouts.mobile_store')

@section('content')
<div id="menu-container" style="display: block;">
    <section class="menu">
        <section class="list listimg disgood">
            <dl>
            <div class="promotion" data-type="productGroup" data-id="product_promotion" data-spec="280X280">
                <ul class="clearfix" id="menu_id">
                    <li><img src="/images/products/{{ $product->image }}" width="89%" style="padding-left: 35px; padding-bottom: 3px;"></li>
                    <table width="100%">
                        {{--<tr>--}}
                            {{--<td colspan="4">详情></td>--}}
                        {{--</tr>--}}
                        {{--<tr>--}}
                            {{--<td>产品名称：</td><td>{{ $product->name }}</td><td>&nbsp;</td><td>&nbsp;</td>--}}
                        {{--</tr>--}}
                        {{--<tr>--}}
                            {{--<td>价格：</td><td>{{ $product->price }}</td><td>&nbsp;</td><td>&nbsp;</td>--}}
                        {{--</tr>--}}
                        @if($product->detail)
                        <tr>
                            <td colspan="4" width="100%" style="text-align: center;">
                                <style>
                                    img {

                                        max-width: 100%;
                                        max-height: 100%;
                                    }
                                </style>
                                <div style="width: 95%; padding-left: 12px;">
                                {!! $product->detail !!}
                                </div>
                            </td>
                        </tr>
                        @endif
                    </table>
                </ul>
            </div>
            </dl>
        </section>
        <div id="mcover">
            <div id="Popup" style="display: block;">
                <div class="imgPopup" style="padding:0px;">
                    <p class="jianjie" id="detailinfo"></p>
                </div>
            </div>
            @include('store.products.partials.footer')
        </div>
    </section>
</div>
<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="productModalLabel">{{ $product->name }} </h4>
            </div>

            {!! Form::open(['url' => '/store/orders', 'class' => 'form-horizontal']) !!}
            {!! Form::hidden('product_id', $product->id) !!}
            {!! Form::hidden('single_amount', $product->price) !!}
            {!! Form::hidden('shipping_fee', $product->shipping_fee) !!}

            {{--{!! Form::hidden('total_amount', $product->price) !!}--}}

            <div class="modal-body">
                    <div class="form-group" style="height: 131px;">
                    <div class="col-xs-6"><img src="/images/products/{{ $product->image }}" width="80" height="130"></div>
                    <div class="col-xs-6">
                        <p><strong>单价:</strong> &nbsp;&nbsp; ¥ {{ $product->price }} </p>
                        {{--<p><strong>Presales:</strong> &nbsp;&nbsp; 5</p>--}}
                        {{--<p><strong>selected:</strong> &nbsp;&nbsp; M</p>--}}
                    </div>
                    </div>
                    <div class="form-group" >
                        <br>
                        <label for="recipient-name" class="form-control-label"><!--<strong>尺寸:</strong> S|M|L--></label>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label"><strong>购买数量:</strong></label>
                        {!! Form::text('quantity', 1, ['class' => 'form-control', 'required' => 'required', 'style' => 'border: 1px black solid;width:50px;float:right;margin-right:15px;']) !!}
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">立即购买</button>
            </div>
            {!! Form::close() !!}
            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</div>

@endsection
