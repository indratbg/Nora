@extends('layout.main')
@section('breadcrumb',$breadcrumb)
@section('content')

<div class="row">
    <div class="col-md-2">
        <h1 class="lead">Categories</h1>
        <ul class="list-unstyled">
            <li><a href="#"> Categori 1</a></li>
            <li><a href="#"> Categori 2</a></li>
        </ul>
        <h2 class="lead">Recent Post</h2>
        <ul class="list-unstyled">
            <li><a href="#"> Necklace on Jermany</a></li>
            <li><a href="#"> Which one do you want?</a></li>
        </ul>
    </div>
    <div class="col-md-10">
         <div class="posts">
            @foreach($data as $row)
            <h2 class=""><a href="{{ url('blog_detail/'.$row->id) }}" class="link"> {{ $row->title  }}<small>{{ '&emsp;'.$row->subtitle  }}</small></a></h2>
            <small>{{ "Create at : " .$row->created_at }}</small>
            <p>{!! substr($row->body,0,500) !!}<a href="{{ url('blog_detail/'.$row->id) }}"> [....]</a></p>
                <div class="clearfix"></div>
            @endforeach

            {!! $data->links() !!}
        </div>
    </div>
</div>
@endsection
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
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
            alert('Posts could not be loaded.');
        });
    }
    </script>