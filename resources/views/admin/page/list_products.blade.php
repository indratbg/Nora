@extends('admin.layout.admin_template')

@section('content')
    <p id="pesanku"></p>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <table id="list_products" class="table table-condensed table-hover ">
                        <thead>
                        <tr class="info">
                            <td>ID Product</td>
                            <td>Product Name</td>
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
<script>

    $('#pesanku').html('thanks');
    function delete_product(num) {
        if (confirm('Are you sure want to delete this product?')) {
            $.ajax({
                url: "delete_product/" + num,
                type: "get",
                data: {},
                success: function (response) {

                    console.log(response);
                    //location.reload();

                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }

            });
        }
    }
</script>
