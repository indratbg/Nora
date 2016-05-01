@extends('layout.main')
@section('breadcrumb',$breadcrumb)
@section('content')

    <div class="row">
        <div class="col-md-2">
            <h3>Categories</h3>
            <ul class="list-unstyled">
                @foreach(App\Category::whereCategory_id1('contact_us')->orderBy('category_name','asc')->get() as $row)
                <li><a href="">{{ $row->category_name }}</a></li>
                @endforeach


            </ul>
        </div>
        <div class="col-md-10">
            <h1>Contact Us</h1>
            <!--  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.4802652449503!2d106.85198531417119!3d-6.2001946624641215!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f38003c63ad7%3A0xdff535d6e84f5d15!2s7-Eleven+Matraman+-+Sevelin+kiosk!5e0!3m2!1sid!2sid!4v1458367301340" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe> -->
            <br/>
            <br/>
            {{--Komentar--}}
            <div class="col-sm-8">
                <form method="post" action="{{ url('/contact_us/feedback') }}">
                    {!! csrf_field() !!}
                    <div class="form-group input-group ">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i> </span>
                        <input type="text" class="form-control" name="name" placeholder="Name"
                               value="{{ old('name') }} ">
                        @if ($errors->has('name'))
                            <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i> </span>
                        <input type="email" class="form-control" name="email" placeholder="Email"
                               value="{{ old('email') }}">
                        @if ($errors->has('email'))
                            <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="subject" placeholder="Subject"
                               value="{{ old('subject') }} ">
                        @if ($errors->has('subject'))
                            <span class="help-block">
                                <strong>{{ $errors->first('subject') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="body" rows="5">{{ old('body') }}</textarea>
                        @if ($errors->has('body'))
                            <span class="help-block">
                                <strong>{{ $errors->first('body') }}</strong>
                            </span>
                        @endif
                    </div>
                    <input type="submit" class="btn btn-primary" value="Send"/>
                </form>
            </div>
            {{--Alamat Seller--}}
            <div class="col-sm-4">

                <address>
                    <strong>TOKOKITA, PT.</strong><br>
                    795 Folsom Ave, Suite 600<br>
                    San Francisco, CA 94107<br>
                    <abbr title="Phone">P:</abbr> (123) 456-7890
                </address>

                <address>
                    <strong>Nora Situmorang</strong><br>
                    <a href="mailto:#">first.last@example.com</a>
                </address>
            </div>

        </div>
    </div>
@endsection