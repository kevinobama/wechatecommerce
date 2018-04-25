@extends('layouts.mobile_store')

@section('content')

@include('store.store_home.partials.swiper')
<div class="list">
    @include('store.store_home.partials.menu')
    @include('store.store_home.partials.products')
</div>
@include('layouts.partials.store.footer')

@endsection