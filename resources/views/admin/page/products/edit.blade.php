@extends('admin.layout.admin_template')
@section('content')
@include('errors.error')
{!! Form::model($data, ['url'=>'admin/update_product/'.$data->id_product,'files'=>true]) !!}
	@include('admin.page.products._form', [ 'btnText'=> 'Update'])
{!! Form::close() !!}

    <div id="list_image">
        @include('admin.page.products.list_image_product')
    </div>

@stop
@section('script')

<script>

    var id_product = '{!!  $data->id_product  !!}';
    function delete_image(id, filename)
    {
        $.ajax({
            url: "delete_image/" + id+'/'+filename,
            type: "get",
            data: {},
            dataType: 'json',
            success: function (response) {
                $('.modal').modal('hide');
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
