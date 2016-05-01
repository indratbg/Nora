@extends('layout.main')
@section('breadcrumb',$breadcrumb)
@section('content')

    @include('visitor.home.slide')

    <hr class="divided"/>
    <legend>New Product</legend>
    <div class="row">
        @foreach($recent_product as $row)
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <a href="{{ url('/product/detail/'.$row->id_product) }}">
                        <img class="img-rounded" src="{!! asset('storage/app/public/product/'.
                            App\Picture::whereId_product($row->id_product)->firstorFail()->filename) !!}"
                             alt="{{  $breadcrumb }}"/>
                    </a>

                    <div class="caption">
                        <h3>{{ $row->product_name }}</h3>

                        <div class="row">
                            <div class="col-sm-6">
                                <p class="price">IDR {{ number_format($row->price,0,',','.') }}</p>
                            </div>
                            <div class="col-sm-6 ">
                                <a href="" class="btn btn-primary pull-right">Buy</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach
    </div>


    <legend>Testimonial</legend>

    @include('visitor.home.testimo')



@endsection
