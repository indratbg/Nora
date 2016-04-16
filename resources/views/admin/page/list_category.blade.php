@extends('admin.layout.admin_template')

@section('content')
        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCategory">
    <span class="fa fa-plus">&nbsp;</span>Add Category
</button>
<br/><br/>

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-body">
                <table id="list_category" class="table table-condensed table-hover ">
                    <thead>
                    <tr class="info">
                        <td>Sub</td>
                        <td>Category Code</td>
                        <td>Category Name</td>
                        <td>Created At</td>
                        <td>Action</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $row)
                        <tr>
                            <td>{{ $row->category_id1 }}</td>
                            <td>{{ $row->category_id2 }}</td>
                            <td>{{ $row->category_name }}</td>
                            <td>{{ $row->created_at }}</td>
                            <td>
                                <a href="{{ url('admin/edit_category/'.$row->id) }}"><i class="fa fa-pencil"></i></a>
                                <a href="" class="delete" onclick="delete_category({{ $row->id }})"><i
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


<!-- Modal -->
<div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <form class="form-horizontal" action="{{ url('admin/add_category') }}" method="post">
                    {!! csrf_field() !!}
                    <fieldset>
                        <!-- Form Name -->
                        <legend>Add Category</legend>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="category_id1">Parameter 1</label>

                            <div class="col-md-4">
                                <input id="category_id1" name="category_id1" type="text" placeholder="Parameter 1"
                                       class="form-control input-md" required="">

                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="category_id2">Parameter 2</label>

                            <div class="col-md-4">
                                <input id="category_cd2" name="category_id2" type="text" placeholder="Parameter 2"
                                       class="form-control input-md" required="">

                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="category_id3">Parameter 3</label>

                            <div class="col-md-4">
                                <input id="category_cd3" name="category_id3" type="text" placeholder="Parameter 3"
                                       class="form-control input-md">

                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="category_name">Category Name</label>

                            <div class="col-md-4">
                                <input id="category_name" name="category_name" type="text" placeholder="Category Name"
                                       class="form-control input-md" required="">

                            </div>
                        </div>

                        <!-- Button (Double) -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="button1id">Double Button</label>

                            <div class="col-md-8">
                                <button id="button1id" name="button1id" class="btn btn-success">Save</button>
                                <button id="button2id" name="button2id" data-dismiss="modal" class="btn btn-danger">
                                    Close
                                </button>
                            </div>
                        </div>

                    </fieldset>
                </form>

            </div>
            {{--  <div class="modal-footer">
                  <button type="button" class="btn btn-danger" >Close</button>
                  <button type="button" class="btn btn-success">Save changes</button>
              </div>--}}
        </div>
    </div>
</div>
@endsection
<script>
    function delete_category(num) {
        return false;
     /*   if(confirm('Are you sure want to delete ?'))
        {
        $.ajax({
            url: "delete_category/" + num,
            type: "get",
            data: {},
            success: function (response) {
                location.reload();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }

        });
        }*/

    }
</script>