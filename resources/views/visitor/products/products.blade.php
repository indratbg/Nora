@extends('layout.main')

@section('breadcrumb',$breadcrumb)
@section('content')

    <div class="row">
        <div class="col-sm-2">
            @include('layout.product')
        </div>
        <div class="col-sm-10">
            <div class="row">
                @foreach($data as $row)
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <img src="..." alt="...">

                            <div class="caption">
                                <h3>{{ $row->product_name }}</h3>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="price">IDR {{ number_format($row->price,0,',','.') }}</p>
                                    </div>
                                    <div class="col-sm-6">
                                        <a href="" class="btn btn-primary">Buy</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
    </div>

@endsection