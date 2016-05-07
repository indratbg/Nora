@extends('layout.main')

@section('breadcrumb',Ucfirst($breadcrumb))
@section('content')
    <div class="row">
        <div class="col-md-8">
            <legend>{{ $data->product_name }}</legend>
            {{--Image Product--}}
            <ul class="slide_product">
                @foreach($images as $image)
                    <li>
                        <img class="img-responsive" src="{!! asset('storage/app/public/product/'.$image->filename) !!}"
                            alt="{{ $image->title }}"
                             data-description="{{ $image->desc }}">
                    </li>
                @endforeach
            </ul>


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
@include('layout.script')

<script>
    $(document).ready(function () {
        $('.slide_product').pgwSlideshow({transitionEffect: 'fading',
            maxHeight:'300px'});
    });
</script>