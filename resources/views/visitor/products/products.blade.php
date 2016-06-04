@extends('layout.main')

@section('breadcrumb',Ucfirst($breadcrumb))
@section('content')

    <div class="row">
        <div class="col-md-2 col-sm-2 hidden-xs">
            @include('layout.product')
        </div>
        <div class="col-sm-10">
            @if(count($data)==0)
                <div class="well well-sm">
                    <strong>No data found for product which selected.</strong>
                </div>
            @endif
            <div class="row">
                @foreach($data as $row)
                    <div class="col-sm-6 col-md-3 col-xs-6">
                        <div class="thumbnail">
                            <a href="{{ url('/product/detail/'.$row->id_product) }}">
                                <img class="img-rounded" src="{!! asset('storage/app/public/product/thumb/'.
                            App\Picture::whereId_product($row->id_product)->firstorFail()->filename) !!}"
                                     alt="{{  $breadcrumb }}"/>
                            </a>

                            <div class="caption">
                                <h3>{{ $row->product_name }}</h3>

                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <p class="price">IDR {{ number_format($row->price,0,',','.') }}</p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button class="btn btn-danger btn-block"><span class="fa fa-list"></span>
                                                Add to Wishlist
                                            </button>
                                            <button class="btn btn-primary btn-block"><span
                                                        class="fa fa-shopping-cart fa-lg"></span> Buy
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
            {!! $data->links() !!}
        </div>
    </div>

@endsection