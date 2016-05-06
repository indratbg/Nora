@extends('admin.layout.admin_template')

@section('content')
    <div id="message"></div>
    <button type="button" onclick="addTestimoni()" class="btn btn-success">
        <span class="fa fa-plus">&nbsp;</span>Add Testimonial
    </button>
    <br/><br/>

    <div id="list_content">
        @include('admin.page.testimoni.list_testimoni')
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addTestimoni" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-body">

                    <form id="form_testimoni" class="form-horizontal" action="javascript:void(0)">
                        {!! csrf_field() !!}
                        <input type="hidden" name="id" id="id"/>
                        <fieldset>
                            <!-- Form Name -->
                            <legend id="title">Add Testmonial</legend>
                            <div id="error_msg"></div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="name">Name</label>

                                <div class="col-md-5">
                                    <input id="name" name="name" type="text" placeholder="Name"
                                           class="form-control input-md">

                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="email">Email</label>

                                <div class="col-md-5">
                                    <input id="email" name="email" type="email" placeholder="Email"
                                           class="form-control input-md">

                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="subject">Subject</label>

                                <div class="col-md-5">
                                    <input id="subject" name="subject" type="text" placeholder="subject"
                                           class="form-control input-md">

                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="body">Message</label>

                                <div class="col-md-8">
                                    <textarea name="body" class="form-control" rows="2"></textarea>

                                </div>
                            </div>

                            <!-- Button (Double) -->
                            <div class="form-group">
                                <div class="col-md-4"></div>

                                <div class="col-md-8">
                                    <button id="button1id" onclick="save()" name="button1id" class="btn btn-success">
                                        Save
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
{{--@include('admin.layout.script')--}}

<script>


    function addTestimoni() {
        save_method = 'add';
        $('#form_testimoni')[0].reset(); // reset form on modals
        $('#addTestimoni').modal('show'); // show bootstrap modal
    }


    function save() {
        var url;
        if (save_method == 'add') {
            url = "add_testimoni";
        }
        else {
            url = "update_testimoni";
        }

        // ajax adding data to database
        $.ajax({
            url: url,
            type: "POST",
            data: $('#form_testimoni').serialize(),
            dataType: "JSON",
            success: function (data) {
                //if success close modal and reload ajax table
                $('#addTestimoni').modal('hide');
                var msg = '<div class="alert alert-dismissable alert-success">' +
                        '  <button type="button" class="close" data-dismiss="alert">&times;</button>' +
                        '<p>';
                msg += 'Data Succesfully Saved';
                msg +='</p></di>';
                $('#message').html(msg);

                reload_table();
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

    function edit_testimoni(num) {
        save_method = 'update';
        $('#form_testimoni')[0].reset(); // reset form on modals

        //Ajax Load data from ajax
        $.ajax({
            url: "edit_testimoni/" + num,
            type: "GET",
            dataType: "JSON",
            success: function (data) {

                $('[name="id"]').val(data.id);
                $('[name="name"]').val(data.name);
                $('[name="email"]').val(data.email);
                $('[name="subject"]').val(data.subject);
                $('[name="body"]').val(data.body);

                $('#addTestimoni').modal('show');
                $('#title').html('Update Testimonial');
                $('#button1id').html('Update');

            },
            error: function (jqXHR, textStatus, errorThrown) {
               console.log(jqXHR);
            }
        });
    }

    function delete_testimoni(num) {

        if (confirm('Are you sure want to delete ?')) {
            $.ajax({
                url: "delete_testimoni/" + num,
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
        $.get('get_list_testimoni', function (data) {
            $('#list_content').html(data);
        })
    }
</script>