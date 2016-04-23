<html>
<head>
    <title>Login Adminstrator</title>

    <!-- CSS And JavaScript -->
    <link href="{!! asset('public/css/bootstrap.min.css') !!}" media="all" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{!! asset('public/css/font-awesome.min.css') !!}" type="text/css">
    <style>


        .wrapper {
            margin-top: 80px;
            margin-bottom: 80px;
        }

        .form-signin {
            max-width: 380px;
            padding: 15px 35px 45px;
            margin: 0 auto;
            background-color: #fff;
            border: 1px solid rgba(0,0,0,0.1);

        .form-signin-heading,
        .checkbox {
            margin-bottom: 30px;
        }

        .checkbox {
            font-weight: normal;
        }

        .form-control {
            position: relative;
            font-size: 16px;
            height: auto;
            padding: 10px;


        &:focus {
             z-index: 2;
         }
        }

        input[type="text"] {
            margin-bottom: -1px;
            border-bottom-left-radius: 0;
            border-bottom-right-radius: 0;
        }

        input[type="password"] {
            margin-bottom: 20px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
        }

         body{
             background-image: url( {{ asset('img/slide/slide1.jpg') }} );
         }
    </style>


    <script type="text/javascript" src="{!! asset('public/js/jquery-1.12.0.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('public/js/bootstrap.js') !!}"></script>
</head>
<body>

</body>
</html>

<div class="container-fluid">
    <div class="wrapper" >

        <form class="form-signin" method="post" action="{{ action('AdminController@showProfile') }}" >
            <h2 class="form-signin-heading">Please Login</h2>
            {{ csrf_field() }}

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <input type="text" class="form-control" name="email" value = "{{ old('email')}}" placeholder="Email"  autofocus="" />
            <br/>
            <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password" />
            <br/>
            <input type="submit" value="Login" class="btn btn-lg btn-primary btn-block" >


        </form>
    </div>

</div>
