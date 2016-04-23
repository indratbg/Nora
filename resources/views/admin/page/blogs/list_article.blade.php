@extends('admin.layout.admin_template')

@section('content')

    <a href="{{ url('/admin/create_article') }}" class="btn btn-success"><i class="fa fa-pencil"></i> Post Article</a>
    <br/>
    <br/>


    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <table id="list_article" class="table table-condensed table-hover " >
                        <thead>
                        <tr class="info">
                            <td>Title</td>
                            <td>Subtitle</td>
                            <td>Category</td>
                            <td>Status</td>
                            <td>Create at</td>
                            <td>Post At</td>
                            <td>Action</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $row)
                            <tr>
                                <td>{{ $row->title }}</td>
                                <td>{{ $row->subtitle }}</td>
                                <td>{{ App\Category::whereCategory_id1('article')->whereCategory_id2($row->category)->first()->category_name }}</td>
                                <td>{{ $row->status=='A'?'Post':'Draft' }}</td>
                                <td>{{ $row->created_at }}</td>
                                <td>{{ $row->post_at }}</td>
                                <td>
                                    <a href="{{ url('admin/edit_article/'.$row->id) }}"><i class="fa fa-pencil"></i></a>
                                    <a href="javascript:void(0)" onclick="delete_article({{ $row->id }})"><i
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

    function delete_article(num) {

        if (confirm('Are you sure want to delete ?')) {
            $.ajax({
                url: "delete_article/" + num,
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
</script>