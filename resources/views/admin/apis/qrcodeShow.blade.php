@extends('layouts.shop_admin')

@section('content')
<div class="container">

    <h1>Apis  </h1>
    <p><a href="/admin/apis/qrcodeCreate">Creeate qrcode</a>|<a href="/admin/apis/mediaUpload">apis media Upload</a></p>
    <div class="table">
        <img src="/images/QRCode/1.jpg">
        <hr>
        {!! $materialBatchGetMaterial !!}
    </div>
</div>
@endsection
