@extends('admin.layout.admin_template')

@section('content')

    <div class="row">
        <div class="form-control">
            <div class="col-xs-3">
                <label>Product Name</label>
            </div>
            <div class="col-xs-5">
                <label>{{ $data->product_name }}</label>
            </div>
        </div>

        <div class="form-control">
            <div class="col-xs-3">
                <label>Posting Date From</label>
            </div>
            <div class="col-xs-3">
                <label>{{ $data->post_date_from }}</label>
            </div>
            <div class="col-xs-1">
                <label>To</label>
            </div>
            <div class="col-xs-3">
                <label>{{ $data->post_date_to }}</label>
            </div>
        </div>
        <div class="form-control">
            <div class="col-xs-3">
                <label>Stock</label>
            </div>
            <div class="col-xs-3">
                <label>{{ number_format($data->stock,0,',','.') }}</label>
            </div>
        </div>
        <div class="form-control">
            <div class="col-xs-3">
                <label>Price</label>
            </div>
            <div class="col-xs-3">
                <label>{{ number_format($data->price,0,',','.') }}</label>
            </div>
        </div>
        <div class="form-control">
            <div class="col-xs-3">
                <label>On Order</label>
            </div>
            <div class="col-xs-3">
                <label>{{ number_format($data->on_order,0,',','.') }}</label>
            </div>
        </div>
        <div class="form-control">
            <div class="col-xs-3">
                <label>Description</label>
            </div>
            <div class="col-xs-9">
                <p>{{ $data->description }}</p>
            </div>
        </div>
        {{--Image of Product--}}
        <div class="row">
            @foreach($images as $image)

                <div class="col-xs-6 col-md-3">
                    <a href="#" class="thumbnail">
                        <img src="{!! asset('storage/app/public/product/'.$image->filename) !!}"
                             alt="{{ $image->original_filename }}"/>
                    </a>
                </div>


            @endforeach
        </div>
    </div>
@endsection
