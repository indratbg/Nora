<nav class="menu_bar navbar navbar-inverse navbar-inverse">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#menu-bar-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="menu-bar-1">
            <ul class="nav navbar-nav">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li class="dropdown">
                    <a href="{{ url('product') }}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">Product <span class="caret"></span></a>
                    <ul class="dropdown-menu navbar-inverse">
                        @foreach(App\Category::whereCategory_id1('product')->orderBy('category_name','asc')->get() as $row)
                            <li>
                                <a href="{{ url('/product/'.strtolower($row->category_name)) }}">{{ $row->category_name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li><a href="{{ url('/contact_us') }}">Contacts Us</a></li>
                <li><a href="{{ url('/blog') }}">Blog</a></li>
            </ul>
            <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                    {{--<div id="custom-search-input">--}}
                        <div class="input-group col-md-12 ">
                            <input type="search" class="form-control" placeholder="Search"/>
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="submit">
                                        <span class="fa fa-search fa-lg "></span>
                                    </button>
                                </span>
                        </div>
                    {{--</div>--}}
                </div>
            </form>
            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    <li><a href="{{url('/login')}}"><span class="fa fa-user fa-lg "></span> Login</a></li>
                    <li><a href="{{url('/register')}}"><span class="fa fa-user-plus fa-lg "></span> Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Ucfirst( Auth::user()->name) }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu navbar-inverse" role="menu">
                            <li><a href="{{ url('/my_account') }}"><i class="fa fa-btn fa-user"></i>&nbsp;My Account</a>
                            </li>
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>&nbsp;Logout</a>
                            </li>
                        </ul>
                    </li>
                @endif
                <li class="hidden-sm"><a href="https://www.facebook.com/sharer/sharer.php?u={{url('/')}}" target="_blank"><i
                                class="fa fa-facebook-official fa-lg"></i>&nbsp;</a></li>
                <li class="hidden-sm"><a href="https://twitter.com/home?status={{url('/')}}" class="btn-link" target="_blank"><i
                                class="fa fa-twitter fa-lg"></i>&nbsp;</a></li>
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