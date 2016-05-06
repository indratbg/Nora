@extends('admin.layout.admin_template')
@include('admin.layout.script')
@section('content')
    <div id="message"></div>
    <a href="{{ url('/admin/create_product') }}" class="btn btn-success"><i class="fa fa-pencil"></i> Add Product</a>
    <br/>
    <br/>
    <div id="list_content">
        @include('admin.page.products.list_products')
    </div>


@endsection
{{--@include('admin.layout.script')--}}

{{--<script type="text/javascript" src="{!! asset('public/js/jquery-1.12.0.min.js') !!}"></script>--}}
<script>


    function delete_product(num) {
        if (confirm('Are you sure want to delete this product?')) {
            $.ajax({
                url: "delete_product/" + num,
                type: "get",
                data: {},
                success: function (response) {

                    var msg = '<div class="alert alert-dismissable alert-success">' +
                            '  <button type="button" class="close" data-dismiss="alert">&times;</button>' +
                            '<p>';
                    msg += 'Data Succesfully Deleted';
                    msg +='</p></di>';
                    $('#message').html(msg);
                    reload_table();

                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }

            });
        }
    }
    function reload_table() {
        $.get('get_list_product', function (data) {
            $('#list_content').html(data);
        })
    }
</script>
