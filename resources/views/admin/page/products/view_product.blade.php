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


    {{--Image of Product--}}
    <div class="container">
        <div class="row">
            <?php $x = 0;?>
            @foreach($images as $image)

                <div class="col-sm-6 col-md-3">
                    <div class="thumbnail">
                        <img src="{!! asset('storage/app/public/product/'.$image->filename) !!}"
                             alt="{{ $image->original_filename }}"/>

                        <div class="caption">
                            <button href="javascript:void(0)" onclick="delete_image('{{ $image->id_product }}','{{ $image->filename }}')" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                            <button class="btn btn-dropbox" data-toggle="modal" data-target="#myModal-{{ $x }}"><i
                                        class="fa fa-eye"></i></button>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="myModal-{{ $x }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">{{ $image->original_filename }}</h4>
                            </div>
                            <div class="thumbnail">
                                <img class="image img-rounded"
                                     src="{!! asset('storage/app/public/product/'.$image->filename) !!}"
                                     alt="{{ $image->original_filename }}"/>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <a href="javascript:void(0)" onclick="delete_image('{{ $image->id_product }}','{{ $image->filename }}')" class="btn btn-danger">Delete</a>

                            </div>
                        </div>
                    </div>
                </div>


                <?php $x++; ?>
            @endforeach
        </div>
    </div>

@endsection
<script>

    function delete_image(id, filename)
    {
        $.ajax({
            url: "delete_image/" + id+'/'+filename,
            type: "get",
            data: {},
            dataType: 'json',
            success: function (response) {

                 console.log(response.status);
                if(response.status =='success')
                {
                   // alert('test');
                    location.reload();
                }
            },
            async: false,
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }

        });
    }
</script>