<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tokokita.com</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, maximum-scale=1, minimum-scale=1, initial-scale=1">
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
    {{--<link rel="stylesheet"--}}
    {{--href="{!! asset('public/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') !!}">--}}
    {{--Slider Product --}}
    <link href="{!! asset('public/css/pgwslideshow.min.css') !!}" media="all" rel="stylesheet" type="text/css"/>
    {{--Home Slider--}}
    <link href="{!! asset('public/css/nerveSlider.min.css') !!}" media="all" rel="stylesheet" type="text/css"/>
    {{--Product--}}
    <link rel="stylesheet" href="{!! asset('public/css/front_style.css') !!}" type="text/css">
</head>
<body>
<div class="container">
    <br/>
    @include('layout.shoppingCart')
    @include('layout.header')
</div>
<div class="container">
    @yield('slinder')
</div>


<div class="container">
    @yield('content')
    @include('layout.footer')
</div>

<script type="text/javascript" src="{!! asset('public/js/jquery-1.12.0.min.js') !!}"></script>

<script type="text/javascript" src="{!! asset('public/js/bootstrap.js') !!}"></script>
<script type="text/javascript" src="{!! asset('public/js/pgwslideshow.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('public/js/jquery-ui-1.10.2.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('public/js/jquery.nerveSlider.min.js') !!}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{!! asset('public/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') !!}"></script>
@yield('script')
</body>

</html>


