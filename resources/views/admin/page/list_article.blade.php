@extends('admin.layout.admin_template')

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <table id="list_article" class="table table-condensed table-hover " >
                        <thead>
                        <tr class="info">
                            <td>Title</td>
                            <td>Subtitle</td>
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
                                <td>{{ $row->substitle }}</td>
                                <td>{{ $row->status=='A'?'Post':'Draft' }}</td>
                                <td>{{ $row->created_at }}</td>
                                <td>{{ $row->post_at }}</td>
                                <td><a href="{{ url('admin/view_article/'.$row->id) }}" ><i class="fa fa-eye" ></i></a>
                                    <a href="{{ url('admin/edit_article/'.$row->id) }}"><i class="fa fa-pencil"></i></a>
                                    <a href="{{ url('admin/delete_article/'.$row->id) }}"><i class="glyphicon glyphicon-trash"></i></a>
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