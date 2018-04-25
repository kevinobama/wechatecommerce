@extends('layouts.shop_admin')
@section('content')
<script src="/ckeditor/ckeditor.js"></script>
<div class="container">
    <ul class="nav nav-tabs">
        <li><a href="/admin/products">{{ Lang::get('menu.management') }}</a></li>
        <li class="active"><a data-toggle="tab" href="#productCreate">{{ Lang::get('menu.create') }}</a></li>
        <li><a data-toggle="tab" href="#productRepeatPurchaseDiscount">{{ Lang::get('admin_products_edit.PurchaseSettings') }}</a></li>
        <li><a data-toggle="tab" href="#productDistribution">{{ Lang::get('admin_products_edit.DistributionCommission') }}</a></li>
        <li><a data-toggle="tab" href="#productReceiveCash">{{ Lang::get('admin_products_edit.ReceiveCash') }}</a></li>
        <li><a data-toggle="tab" href="#purchasePop">{{ Lang::get('admin_products_edit.PurchasePop') }}</a></li>
    </ul>
    <hr/>
    {!! Form::open(['url' => '/admin/products', 'class' => 'form-horizontal', 'files' => true]) !!}
    <div class="tab-content">
    <!-- the first part begin -->
    <div id="productCreate" class="tab-pane fade in active">
        @include('admin.products.partials.basic')
    </div>
    <!-- the first part end -->
    <!-- the second part begin -->
    <div id="productRepeatPurchaseDiscount" class="tab-pane fade">
        @include('admin.products.partials.productRepeatPurchaseDiscount')
    </div>
    <!-- the second part end -->
    <!-- the third part begin -->
    <div id="productDistribution" class="tab-pane fade">
        @include('admin.products.partials.productDistribution')
    </div>
    <!-- the third part end -->
    <!-- the fourth part begin -->
    <div id="productReceiveCash" class="tab-pane fade">
        @include('admin.products.partials.productReceiveCash')
    </div>

    <div id="purchasePop" class="tab-pane fade">
        @include('admin.products.partials.purchasePop')
    </div>
    </div>
    {!! Form::close() !!}
    <!-- the fourth part end -->
    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
</div>
@endsection