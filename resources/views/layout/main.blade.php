<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tokokita.com</title>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- You can use Open Graph tags to customize link previews.
   Learn more: https://developers.facebook.com/docs/sharing/webmasters -->
    <meta property="og:url"           content="{{ url('/') }}" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="{{ url('/') }}" />
    <meta property="og:description"   content="{{ url('/') }} adalah web penjual accesories" />
    <meta property="og:image"         content="" />

    <!-- CSS And JavaScript -->
     {{--<link href="{!! asset('public/css/bootstrap.min.css') !!}" media="all" rel="stylesheet" type="text/css"/>--}}
    <!-- united theme -->
     {{--<link href="{!! asset('public/css/bootstrap_united.min.css') !!}" media="all" rel="stylesheet" type="text/css"/>--}}
    <!-- simplex theme -->
      {{--<link href="{!! asset('public/css/bootstrap_simplex.min.css') !!}" media="all" rel="stylesheet" type="text/css"/>  --}}
    <!--pakai superhero theme -->
     {{--<link href="{!! asset('public/css/bootstrap_superhero.min.css') !!}" media="all" rel="stylesheet" type="text/css"/>--}}
    <!-- cosmo theme -->
      <link href="{!! asset('public/css/bootstrap_cosmo.min.css') !!}" media="all" rel="stylesheet" type="text/css"/>

    <link rel="stylesheet" href="{!! asset('public/css/font-awesome.min.css') !!}" type="text/css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{!! asset('public/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') !!}">


</head>

<body>
@extends('layout.footer')
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

    <nav class="navbar navbar-default">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
              {{--  <a class="navbar-brand" href="{{ url('/') }}">
                    Blog Pertama
                </a>--}}

            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Product <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ url('/fashion') }}">Fassion</a></li>
                            <li><a href="{{ url('/necklace') }}">Necklace</a></li>

                        </ul>
                    </li>
                    <li><a href="{{ url('/contact_us') }}">Contacts Us</a></li>
                    <li><a href="{{ url('/blog') }}">Blog</a></li>
                </ul> 
                    <form class="navbar-form navbar-left" role="search">
                        <div class="form-group">
                            <input type="text" class=" form-control" placeholder="Search">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                    <ul class="nav navbar-nav navbar-right">
                       
                        @if (Auth::guest())
                        <li><a href="{{url('/login')}}"><span class="fa fa-user fa-lg "> Login</span></a></li>
                            <li><a href="{{url('/register')}}"><span class="fa fa-user-plus fa-lg "> Register </span></a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Ucfirst( Auth::user()->name) }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ url('/my_account') }}"><i class="fa fa-btn fa-user"></i>&nbsp;My Account</a></li>
                                    <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>&nbsp;Logout</a></li>
                                </ul>
                            </li>
                        @endif

                        <li><a href="https://www.facebook.com/sharer/sharer.php?u={{url('/')}}" target="_blank"   ><i class="fa fa-facebook-official fa-lg"></i></a></li>
                        <li><a href="https://twitter.com/home?status={{url('/')}}" class="btn-link"><i class="fa fa-twitter fa-lg"></i></a></li>
                   <li>&emsp;&emsp;</li>
                    </ul>


            </div><!-- /.navbar-collapse -->


        </div><!-- /.container-fluid -->

    </nav>

    {{--set breadcumb--}}
    <ol class="breadcrumb">
        <li><a href="{{ url('/') }}">Home</a></li>
        <li class="active">@yield('breadcrumb')</li>
    </ol>

    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{ Session::get('success') }}
        </div>

    @endif

    @yield('content')

    @section('footer')
    @endsection


</div>

    <script type="text/javascript" src="{!! asset('public/js/jquery-1.12.0.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('public/js/bootstrap.js') !!}"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{!! asset('public/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') !!}"></script>
</body>
</html>