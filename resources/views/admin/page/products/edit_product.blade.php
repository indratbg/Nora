@extends('admin.layout.admin_template')

@section('content')

    <form class="form-horizontal" action="{{ url('admin/update_product/'.$data->id_product) }}" method="post"
          enctype="multipart/form-data">
        {!! csrf_field() !!}
        <div class="form-group <?php if ($errors->has('product_name')) echo 'has-error' ?>">
            <label for="inputProductName" class="col-sm-2 control-label">Product Name</label>

            <div class="col-sm-5">
                <input type="text" class="form-control" name="product_name" value="{{ $data->product_name }}"
                       placeholder="Product Name">
                @if ($errors->has('product_name'))
                    <span class="help-block">
                <strong>{{ $errors->first('product_name') }}</strong>
            </span>
                @endif
            </div>
        </div>
        <div class="form-group <?php if ($errors->has('post_date_from')) echo 'has-error' ?>">
            <label for="inputPost_date_from" class="col-sm-2 control-label">From Date</label>

            <div class="col-sm-5">
                <input type="text" class="datepicker form-control" name="post_date_from"
                       value="{{ $data->post_date_from }}" placeholder="dd/mm/yyyy">
                @if ($errors->has('post_date_from'))
                    <span class="help-block">
                <strong>{{ $errors->first('post_date_from') }}</strong>
            </span>
                @endif
            </div>
        </div>
        <div class="form-group <?php if ($errors->has('post_date_to')) echo 'has-error' ?>">
            <label for="inputPost_date_to" class="col-sm-2 control-label">To Date</label>

            <div class="col-sm-5">
                <input type="text" class="datepicker form-control" name="post_date_to" value="{{ $data->post_date_to }}"
                       placeholder="dd/mm/yyyy">
                @if ($errors->has('post_date_to'))
                    <span class="help-block">
                <strong>{{ $errors->first('post_date_to') }}</strong>
            </span>
                @endif
            </div>
        </div>
        <div class="form-group <?php if ($errors->has('category')) echo 'has-error' ?>">
            <label for="category" class="col-sm-2 control-label">Category</label>

            <div class="col-sm-5">
                <select name="category" class="form-control">
                    <option value="" @if($data->category=='')selected="selected" @endif >--Select--</option>
                    @foreach(App\Category::whereCategory_id1('product')->get() as $row )
                        <option value="{{ $row->category_id2 }}"
                                @if($data->category ==$row->category_id2 )selected="selected" @endif >{{ Ucfirst($row->category_name) }}</option>
                    @endforeach
                </select>
                @if ($errors->has('category'))
                    <span class="help-block">
                <strong>{{ $errors->first('category') }}</strong>
            </span>
                @endif
            </div>

        </div>
        <div class="form-group <?php if ($errors->has('description')) echo 'has-error' ?>">
            <label for="category" class="col-sm-2 control-label">Description</label>

            <div class="col-sm-10">
                <textarea class="form-control ckeditor" name="description" >{{ $data->description }}</textarea>
                @if ($errors->has('description'))
                    <span class="help-block">
                <strong>{{ $errors->first('description') }}</strong>
            </span>
                @endif
            </div>
        </div>
        <div class="form-group <?php if ($errors->has('price')) echo 'has-error' ?>">
            <label for="inputPrice" class="col-sm-2 control-label">Price</label>

            <div class="col-sm-5">
                <input type="number" class="form-control" name="price" value="{{ $data->price }}" placeholder="Price">
                @if ($errors->has('price'))
                    <span class="help-block">
                <strong>{{ $errors->first('price') }}</strong>
            </span>
                @endif
            </div>
        </div>
        <div class="form-group <?php if ($errors->has('stock')) echo 'has-error' ?>">
            <label for="inputPrice" class="col-sm-2 control-label">Stock</label>

            <div class="col-sm-5">
                <input type="number" class="form-control" name="stock" value="{{ $data->stock }}" placeholder="Stock">
                @if ($errors->has('stock'))
                    <span class="help-block">
                <strong>{{ $errors->first('stock') }}</strong>
            </span>
                @endif
            </div>
        </div>
        <div class="form-group <?php if ($errors->has('status')) echo 'has-error' ?>">
            <label for="inputstatus" class="col-sm-2 control-label">Status</label>

            <div class="col-sm-5">
                <select name="status" class="form-control">
                    <option value="" @if($data->status=='')selected="selected" @endif >--Select--</option>
                    <option value="active" @if($data->status=='active')selected="selected" @endif >Active</option>
                    <option value="inactive" @if($data->status=='inactive')selected="selected" @endif >Inactive</option>
                </select>
                @if ($errors->has('status'))
                    <span class="help-block">
                <strong>{{ $errors->first('status') }}</strong>
            </span>
                @endif
            </div>
        </div>
        <div class="form-group <?php if ($errors->has('file')) echo 'has-error' ?>">
            <label for="inputPrice" class="col-sm-2 control-label">Picture</label>
            <div class="col-sm-5">
                <input type="file" accept="image/png, image/jpeg, image/gif" name="image[]" class="btn btn-github"
                       multiple>

                @if ($errors->has('file'))
                    <span class="help-block">
                <strong>{{ $errors->first('file') }}</strong>
            </span>
                @endif
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-2"></div>
            <div class="col-sm-5">
                <input type="submit" value="Save" class="btn btn-success"/>
            </div>
        </div>

    </form>


    {{--Image of Product--}}
    <div class="container">
        <div class="row">
            <?php $x = 0;?>
            @foreach($images as $image)

                <div class="col-sm-6 col-md-3">
                    <div class="thumbnail">
                        <a href="javacript:void(0)" data-toggle="modal" data-target="#myModal-{{ $x }}"> <img class="image img-thumbnail" src="{!! asset('storage/app/public/product/'.$image->filename) !!}"
                                                                                                              alt="{{ $image->original_filename }}"/>
                        </a>
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
                                <img class="img-rounded"
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
@include('admin.layout.script')

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