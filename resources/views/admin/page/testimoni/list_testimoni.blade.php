
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-body">
                <table id="list_testimoni" class="table table-condensed table-hover ">
                    <thead>
                    <tr class="info">
                        <td>Name</td>
                        <td>Email</td>
                        <td>Subject</td>
                        <td>Created At</td>
                        <td>Action</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $row)
                        <tr>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->email }}</td>
                            <td>{{ $row->subject }}</td>
                            <td>{{ $row->created_at }}</td>
                            <td>
                                <a href="javascript:void(0)" onclick="edit_testimoni({{ $row->id }})"><i
                                            class="fa fa-pencil"></i></a>
                                <a href="javascript:void(0)" onclick="delete_testimoni({{ $row->id }})"><i
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

@include('admin.layout.script')

<script>

    $('#list_testimoni').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false
    });

</script>