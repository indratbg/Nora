<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tokokita.com</title>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- You can use Open Graph tags to customize link previews.
   Learn more: https://developers.facebook.com/docs/sharing/webmasters -->
    <meta property="og:url" content="{{ url('/') }}"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="{{ url('/') }}"/>
    <meta property="og:description" content="{{ url('/') }} adalah web penjual accesories"/>
    <meta property="og:image" content=""/>

    <!-- CSS And JavaScript -->
    {{--<link href="{!! asset('public/css/bootstrap.min.css') !!}" media="all" rel="stylesheet" type="text/css"/>--}}
    <!-- united theme -->
    {{--<link href="{!! asset('public/css/bootstrap_united.min.css') !!}" media="all" rel="stylesheet" type="text/css"/>--}}
    <!-- simplex theme -->
    {{--<link href="{!! asset('public/css/bootstrap_simplex.min.css') !!}" media="all" rel="stylesheet" type="text/css"/>  --}}
    <!--pakai superhero theme -->
    <link href="{!! asset('public/css/bootstrap_superhero.min.css') !!}" media="all" rel="stylesheet" type="text/css"/>
    <!-- cosmo theme -->
    {{--<link href="{!! asset('public/css/bootstrap_cosmo.min.css') !!}" media="all" rel="stylesheet" type="text/css"/>--}}

    <link rel="stylesheet" href="{!! asset('public/css/font-awesome.min.css') !!}" type="text/css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet"
          href="{!! asset('public/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') !!}">
{{--Product--}}
    <link rel="stylesheet" href="{!! asset('public/css/product.css') !!}" type="text/css">



</head>

<body>

<div class="container">
    <br/>

    <div class="row">
        <div class="col-md-5">
            <h1><a href="{{url('/')}}"> Toko kita</a></h1>
        </div>
        <div class="col-md-6">
            <div class="text-right">
                <a href="#">Shopping Cart - IDR <span class="fa fa-shopping-cart fa-3x"></span></a>
            </div>
        </div>
        <div class="col-md-1">
        </div>
    </div>
    @include('layout.header')

    @yield('content')

    @include('layout.footer')

</div>

<script type="text/javascript" src="{!! asset('public/js/jquery-1.12.0.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('public/js/bootstrap.js') !!}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{!! asset('public/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') !!}"></script>

</body>
</html>

<script>
    $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        // CKEDITOR.replace('editor1');
        //bootstrap WYSIHTML5 - text editor
        $(".editor").wysihtml5();
    });
</script>