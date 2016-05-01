@extends('admin.layout.admin_template')

@section('content')

    <a href="{{ url('/admin/create_product') }}" class="btn btn-success"><i class="fa fa-pencil"></i> Add Product</a>
    <br/>
    <br/>

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <table id="list_products" class="table table-condensed table-hover ">
                        <thead>
                        <tr class="info">
                            <td>ID Product</td>
                            <td>Product Name</td>
                            <td>Category</td>
                            <td>Price</td>
                            <td>Stock</td>
                            <td>On Order</td>
                            <td>Status</td>
                            <td>Action</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $row)
                            <tr>
                                <td>{{ $row->id_product }}</td>
                                <td>{{ $row->product_name }}</td>
                                <td>{{ Ucfirst(App\Category::whereCategory_id1('product')->whereCategory_id2($row->category)->first()->category_name) }}</td>
                                <td align="right">{{ number_format($row->price,0,',','.') }}</td>
                                <td align="right">{{ number_format($row->stock,0,',','.') }}</td>
                                <td align="right">{{ $row->on_order }}</td>
                                <td>{{ Ucfirst($row->status) }}</td>
                                <td><a href="{{ url('admin/view_product/'.$row->id_product) }}"><i
                                                class="fa fa-eye"></i></a>
                                    <a href="{{ url('admin/edit_product/'.$row->id_product) }}"><i
                                                class="fa fa-pencil"></i></a>
                                    <a href="javascript:void(0)" onclick="delete_product('{{ $row->id_product }}')"><i
                                                class="glyphicon glyphicon-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection
@include('admin.layout.script')

<script type="text/javascript" src="{!! asset('public/js/jquery-1.12.0.min.js') !!}"></script>
<script>

    $.noConflict();
    jQuery( document ).ready(function( $ ) {
        // Code that uses jQuery's $ can follow here.
        $('#pesanku').html('thanks');
    });

    function delete_product(num) {
        if (confirm('Are you sure want to delete this product?')) {
            $.ajax({
                url: "delete_product/" + num,
                type: "get",
                data: {},
                success: function (response) {

                  //  console.log(response);
                    location.reload();

                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }

            });
        }
    }
</script>
