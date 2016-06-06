@extends('admin.layout.admin_template')

@section('content')
<div class="row">
    <div class="col-md-2 col-sm-3 col-xs-3">
         <label>Product Name</label>
    </div>
    <div class="col-md-9 col-sm-9 col-xs-9">
        <label>{{ $data->product_name }}</label>
    </div>
</div>
<div class="row">
    <div class="col-md-2 col-sm-3 col-xs-3">
         <label>Category</label>
    </div>
    <div class="col-md-9 col-sm-9 col-xs-9">
        <label>{{ App\Category::Where('category_id2','002')->where('category_id1','product')->first()->category_name }}</label>
    </div>
</div>
<div class="row">
    <div class="col-md-2 col-sm-3 col-xs-3">
         <label>From Date</label>
    </div>
    <div class="col-md-2 col-sm-3 col-xs-3">
        <label>{{ $data->post_date_from }}</label>
    </div>
    <div class="col-md-2 col-sm-3 col-xs-3">
        <label>To Date</label>
    </div>
    <div class="col-md-2 col-sm-3 col-xs-3">
        <label>{{ $data->post_date_to }}</label>
    </div>
</div>
<div class="row">
    <div class="col-md-2 col-sm-3 col-xs-3">
         <label>Price</label>
    </div>
    <div class="col-md-2 col-sm-3 col-xs-3">
        <label>{{ number_format($data->price,0,',','.') }}</label>
    </div>
    <div class="col-md-2 col-sm-3 col-xs-3">
        <label>Discount</label>
    </div>
    <div class="col-md-2 col-sm-3 col-xs-3">
        <label>{{ number_format($data->discount_perc,2,',','.') }}</label>
    </div>
</div>
<div class="row">
    <div class="col-md-2 col-sm-3 col-xs-3">
         <label>New Price</label>
    </div>
    <div class="col-md-2 col-sm-3 col-xs-3">
        <label>{{ number_format($data->new_price,0,',','.') }}</label>
    </div>
    <div class="col-md-2 col-sm-3 col-xs-3">
        <label>Stock</label>
    </div>
    <div class="col-md-2 col-sm-3 col-xs-3">
        <label>{{ number_format($data->stock,0,',','.') }}</label>
    </div>
</div>
<div class="row">
    <div class="col-md-2 col-sm-3 col-xs-3">
         <label>On Order</label>
    </div>
    <div class="col-md-2 col-sm-3 col-xs-3">
        <label>{{ number_format($data->on_order,0,',','.') }}</label>
    </div>
    <div class="col-md-2 col-sm-3 col-xs-3">
        <label>Status</label>
    </div>
    <div class="col-md-2 col-sm-3 col-xs-3">
        <label>{{ $data->status }}</label>
    </div>
</div>
<div class="row">
    <div class="col-md-2 col-sm-3 col-xs-3">
         <label>Description</label>
    </div>
    <div class="col-md-9 col-sm-9 col-xs-9">
        <p>{!! $data->description !!}</p>
    </div>
</div>
<br>

    <div id="list_image">
        @include('admin.page.products.list_image_product')
    </div>

@endsection
@section('script')
<script>

    var id_product = '{!!  $data->id_product  !!}';
    // alert(id_product);
    function delete_image(id, filename)
    {
        $.ajax({
            url: "delete_image/" + id+'/'+filename,
            type: "get",
            data: {},
            dataType: 'json',
            success: function (response) {

                reload_list_image(id);
            },
            async: false,
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }

        });
    }
    function reload_list_image(id_product)
    {
        $.get( '{!! url('admin/product/get_list_image_product') !!}/'+id_product, function (data) {
            $('#list_image').html(data);
        });
    }
</script>
@stop
