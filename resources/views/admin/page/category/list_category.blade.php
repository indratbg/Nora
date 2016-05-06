@extends('admin.layout.admin_template')

@section('content')
        <!-- Button trigger modal -->
<button type="button" onclick="addCategory()" class="btn btn-primary">
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
                                <a href="javascript:void(0)" onclick="edit_category({{ $row->id }})"><i
                                            class="fa fa-pencil"></i></a>
                                <a href="javascript:void(0)" onclick="delete_category({{ $row->id }})"><i
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

                <form id="form_category" class="form-horizontal" action="javascript:void(0)">
                    {!! csrf_field() !!}
                    <input type="hidden" name="id" id="id"/>
                    <fieldset>
                        <!-- Form Name -->
                        <legend id="title">Add Category</legend>
                        <div id="error_msg"></div>
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="category_id1">Parameter 1</label>

                            <div class="col-md-4">
                                <input id="category_id1" name="category_id1" type="text" placeholder="Parameter 1"
                                       class="form-control input-md">

                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="category_id2">Parameter 2</label>

                            <div class="col-md-4">
                                <input id="category_cd2" name="category_id2" type="text" placeholder="Parameter 2"
                                       class="form-control input-md">

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
                                       class="form-control input-md">

                            </div>
                        </div>

                        <!-- Button (Double) -->
                        <div class="form-group">
                            <div class="col-md-4"></div>

                            <div class="col-md-8">
                                <button id="button1id" onclick="save()" name="button1id" class="btn btn-success">Save
                                </button>
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
@include('admin.layout.script')

<script type="text/javascript">
    var save_method; //for save method string

    function addCategory() {
        save_method = 'add';
        $('#form_category')[0].reset(); // reset form on modals
        $('#addCategory').modal('show'); // show bootstrap modal
    }

    function edit_category(num) {
        save_method = 'update';
        $('#form_category')[0].reset(); // reset form on modals

        //Ajax Load data from ajax
        $.ajax({
            url: "edit_category/" + num,
            type: "GET",
            dataType: "JSON",
            success: function (data) {

                $('[name="id"]').val(data.id);
                $('[name="category_id1"]').val(data.category_id1);
                $('[name="category_id2"]').val(data.category_id2);
                $('[name="category_id3"]').val(data.category_id3);
                $('[name="category_name"]').val(data.category_name);

                $('#addCategory').modal('show');
                $('#title').html('Update Category');
                $('#button1id').html('Update');

            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax');
            }
        });
    }

    function delete_category(num) {

        if (confirm('Are you sure want to delete ?')) {
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
        }
    }

    function save() {
        var url;
        if (save_method == 'add') {
            url = "add_category";
        }
        else {
            url = "update_category";
        }

        // ajax adding data to database
        $.ajax({
            url: url,
            type: "POST",
            data: $('#form_category').serialize(),
            dataType: "JSON",
            success: function (data) {
                //if success close modal and reload ajax table
                $('#addCategory').modal('hide');
                window.location.reload();
                // reload_table();
            },
            async: false,
            error: function (data) {
                var errors = data.responseJSON;

                errorsHtml = '<div class="alert alert-dismissable alert-danger">' +
                        '  <button type="button" class="close" data-dismiss="alert">&times;</button>' +
                        '<ul>';

                $.each(errors, function (key, value) {
                    errorsHtml += '<li>' + value[0] + '</li>'; //showing only the first error.
                });
                errorsHtml += '</ul></di>';

                $('#error_msg').html(errorsHtml);
            }
        });
    }
</script>

