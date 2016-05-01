@extends('layout.main')
@section('breadcrumb',$breadcrumb)
@section('content')

<div class="row">
    <div class="col-sm-2">
        <h1 class="lead">Categories</h1>
        <ul class="list-unstyled">
            @foreach(App\Category::whereCategory_id1('article')->get() as $row)
                <li ><a  href="{{ url('blog/'.$row->category_id2) }}">{{ $row->category_name }} <span class="badge">{{ App\Blog::where('category','like',
                $row->category_id2)->count() }}</span></a></li>
            @endforeach

        </ul>
        <h2 class="lead">Recent Post</h2>
        <ul class="list-unstyled">
            @foreach(App\Blog::orderBy('created_at','desc')->limit(3)->get() as $row)
                <li><a href="{{ url('blog_detail/'.$row->id) }}"> {{  substr($row->title,0,20) }}</a></li>
            @endforeach
        </ul>
    </div>
    <div class="col-sm-10">
         <div class="posts">
            @foreach($data as $row)
            <h2 class=""><a href="{{ url('blog_detail/'.$row->id) }}" class="link"> {{ $row->title  }}<small>{{ '&emsp;'.$row->subtitle  }}</small></a></h2>
            <small><span class="fa fa-clock-o">&nbsp;Created at &nbsp;</span>{{ $row->created_at->diffForHumans() }}</small>
            <p>{!! substr($row->body,0,500) !!}<a href="{{ url('blog_detail/'.$row->id) }}"> [....]</a></p>
                <div class="clearfix"></div>
            @endforeach

            {!! $data->links() !!}
        </div>
    </div>
</div>
@endsection
<script type="text/javascript" src="{!! asset('public/js/jquery-1.12.0.min.js') !!}"></script>
  <script>
    $(window).on('hashchange', function() {
        if (window.location.hash) {
            var page = window.location.hash.replace('#', '');
            if (page == Number.NaN || page <= 0) {
                return false;
            } else {
                getPosts(page);
            }
        }
    });
    $(document).ready(function() {
        $(document).on('click', '.pagination a', function (e) {
            e.preventDefault();
            getPosts($(this).attr('href').split('page=')[1]);
        });
    });
    function getPosts(page) {
        $.ajax({
            url : '?page=' + page,
            dataType: 'json',
        }).done(function (data) {
            $('.posts').html(data);
            location.hash = page;
        }).fail(function () {
            console.log('Posts could not be loaded.');
        });
    }
    </script>