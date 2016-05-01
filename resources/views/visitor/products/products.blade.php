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
            {!! $data->links() !!}
        </div>
    </div>

@endsection
@section('script')
    @include('layout.script')
@stop