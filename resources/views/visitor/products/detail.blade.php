@extends('layout.main')

@section('breadcrumb',Ucfirst($breadcrumb))
@section('content')
<div class="row">
    <div class="col-md-8">
        <legend>{{ $data->product_name }}</legend>
    </div>
    <div class="col-md-4">
    <legend>Detail Product</legend>
        <div class="row">
            <div class="col-xs-6">
                <strong>Price</strong>
            </div>
            <div class="col-xs-6">
                <strong>IDR {{ number_format($data->price,0,',','.') }}</strong>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6">
                <strong>Quantity</strong>
            </div>
            <div class="col-xs-6">

            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
    @include('layout.script')
@stop