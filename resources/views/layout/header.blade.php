<nav class="navbar navbar-default">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">Product <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        @foreach(App\Category::whereCategory_id1('product')->orderBy('category_name','asc')->get() as $row)
                            <li><a href="{{ url('/product/'.strtolower($row->category_name)) }}">{{ $row->category_name }}</a></li>
                        @endforeach

                    </ul>
                </li>
                <li><a href="{{ url('/contact_us') }}">Contacts Us</a></li>
                <li><a href="{{ url('/blog') }}">Blog</a></li>
            </ul>
            <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                    <input type="text" class=" form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-primary"><span class="fa fa-search"></span> </button>
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
                            <li><a href="{{ url('/my_account') }}"><i class="fa fa-btn fa-user"></i>&nbsp;My Account</a>
                            </li>
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>&nbsp;Logout</a>
                            </li>
                        </ul>
                    </li>
                @endif

                <li><a href="https://www.facebook.com/sharer/sharer.php?u={{url('/')}}" target="_blank"><i
                                class="fa fa-facebook-official fa-lg"></i></a></li>
                <li><a href="https://twitter.com/home?status={{url('/')}}" class="btn-link"><i
                                class="fa fa-twitter fa-lg"></i></a></li>
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