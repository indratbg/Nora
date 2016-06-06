<html>
<head>
    <title>{{ $title or "Administrator" }}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{!! asset('public/admin/bootstrap/css/bootstrap.min.css') !!}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{!! asset('public/css/font-awesome.min.css') !!}" type="text/css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{!! asset('public/admin/dist/css/ionicons.min.css') !!}">
    <!-- Ionicons -->
    <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
    <!-- Theme style -->
    <link rel="stylesheet" href="{!! asset('public/admin/dist/css/AdminLTE.min.css') !!}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{!! asset('public/admin/dist/css/skins/_all-skins.min.css') !!}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{!! asset('public/admin/plugins/iCheck/flat/blue.css') !!}">
    <!-- Morris chart -->
    <!-- {{--<link rel="stylesheet" href="plugins/morris/morris.css">--}} -->
    <!-- jvectormap -->
    <!-- <link rel="stylesheet" href="{!! asset('public/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css') !!}"> -->
    <!-- Date Picker -->
    <link rel="stylesheet" href="{!! asset('public/admin/plugins/datepicker/datepicker3.css') !!}">
    <!-- Daterange picker -->
    <!-- <link rel="stylesheet" href="{!! asset('public/admin/plugins/daterangepicker/daterangepicker-bs3.css') !!}"> -->
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet"
          href="{!! asset('public/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') !!}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{!! asset('public/admin/plugins/datatables/dataTables.bootstrap.css') !!}">
    {{--Add css--}}
    <link rel="stylesheet" href="{!! asset('public/admin/dist/css/add.css') !!}">
    <!-- CK Editor -->
    <!-- <script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script> -->
    <script src="{!! asset('public/admin/plugins/ckeditor/ckeditor.js') !!}"></script>
</head>

<body>
<body class="hold-transition skin-red sidebar-mini   ">
{{--<body class="hold-transition skin-red sidebar-mini fixed sidebar-collapse ">--}}
<div class="wrapper">

    <!-- Header -->
    @include('admin.layout.header')

            <!-- Sidebar -->
    @include('admin.layout.sidebar')

            <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                {{ $title or ''}}

            </h1>
            <ol class="breadcrumb">
                <li><a href=" {{ url('dashboard') }} "><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">{{ $title or ''}}</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            @if(session('success'))
                <div class="alert alert-dismissible alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <p><strong>{!! Session::get('success') !!}</strong></p>
                </div>
            @endif
                @if(session('error'))
                    <div class="alert alert-dismissible alert-danger">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <p><strong>{!! Session::get('error') !!}</strong></p>
                    </div>
                @endif
            @yield('content')

        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    <!-- Footer -->
    @include('admin.layout.footer')
</div> <!--end wrapper-->


<!-- jQuery 2.1.4 -->
<script type="text/javascript" src="{!! asset('public/admin/plugins/jQuery/jQuery-2.1.4.min.js') !!}"></script>

<script type="text/javascript" src="{!! asset('public/js/jquery-1.12.0.min.js') !!}"></script>

<!-- Bootstrap 3.3.5 -->
<script src="{!! asset('public/admin/bootstrap/js/bootstrap.min.js') !!}"></script>
<!-- Slimscroll -->
<script src="{!! asset('public/admin/plugins/slimScroll/jquery.slimscroll.min.js') !!}"></script>
<!-- FastClick -->
<script src="{!! asset('public/admin/plugins/fastclick/fastclick.min.js') !!}"></script>
<!-- AdminLTE App -->
<script src="{!! asset('public/admin/dist/js/app.min.js') !!}"></script>

<!-- bootstrap time picker -->
<script src="{!! asset('public/admin/plugins/datepicker/bootstrap-datepicker.js') !!}"></script>
<!-- DataTables -->
<script src="{!! asset('public/admin/plugins/datatables/jquery.dataTables.min.js') !!}"></script>
<script src="{!! asset('public/admin/plugins/datatables/dataTables.bootstrap.min.js') !!}"></script>

@yield('script')

</body>
</html>
<script type="text/javascript">

    $(".datepicker").datepicker({'format': 'dd/mm/yyyy'});
    $(' #list_article, #list_category').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false
    });


</script>