@extends('admin.layout.admin_template')

@section('content')

    <hr class="divider"/>

    <div class="row">
        <div class="col-sm-6 col-sm-offset-1">
            <form action="{{ url('admin/add_slider') }}" id="FormAddImage" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <div class="form-group">
                    <legend>Add Image</legend>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="title" placeholder="Image Title"/>
                </div>
                <div class="form-group">
                    <textarea rows="2" name="desc" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <input type="file" accept="image/png, image/jpeg, image/gif" name="image" class="btn btn-github"
                           multiple>
                    <div class="well well-sm">900 X 500</div>
                </div>
                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        <input type="submit" value="SAVE" class="btn btn-google">


                    </div>
                </div>
            </formac>
        </div>
        <div class="col-sm-6">

        </div>
    </div>

    <br/> <br/>

    <div class="list_image">
    </div>


@endsection
@include('admin.layout.script')

<script>
    $(document).ready(function () {
        getImage();
    })


    function getImage() {
        $.ajax({
            url: "{{ url('admin/list_slider') }}",
            type: "get",
            data: {},
            success: function (response) {
                //    location.reload();
                $('.list_image').html(response);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            },
            async: false

        });
    }

    function delete_image(filename)
    {
        $.ajax({
            url: '{{ url('admin/slider/delete') }}'+'/'+filename,
            type: "get",
            data: {},
            dataType: 'json',
            success: function (response) {

                console.log(response.status);
                if(response.status =='success')
                {
                    $('.modal').modal('hide');
                    getImage();
                }
            },
            async: false,
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
            }

        });
    }
</script>