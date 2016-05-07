@extends('admin.layout.admin_template')

@section('content')

    <table class="table table-responsive" style="width: 80%">
        <tr>
            <td>Product Name</td>
            <td>:</td>
            <td colspan="4">{{ $data->product_name }}</td>
        </tr>
        <tr>
            <td>Posting From</td>
            <td>:</td>
            <td>{{ $data->post_date_from }}</td>
            <td>Until</td>
            <td>:</td>
            <td>{{ $data->post_date_to }}</td>
        </tr>
        <tr>
            <td>Stock</td>
            <td>:</td>
            <td>{{ number_format($data->stock,0,',','.') }}</td>
            <td>On Order</td>
            <td>:</td>
            <td>{{ number_format($data->on_order,0,',','.') }}</td>
        </tr>
        <tr>
            <td>Price</td>
            <td>:</td>
            <td colspan="4">{{ number_format($data->price,0,',','.') }}</td>

        </tr>
        <tr>
            <td>Description</td>
            <td>:</td>
            <td>{!! $data->description !!}</td>
        </tr>

    </table>


    <div id="list_image">
        @include('admin.page.products.list_image_product')
    </div>

@endsection
@include('admin.layout.script')
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