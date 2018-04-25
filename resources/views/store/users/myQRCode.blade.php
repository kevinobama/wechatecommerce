@extends('layouts.mobile_store')

@section('content')

    {{ QRcode::png("My First QR Code") }}

@endsection
