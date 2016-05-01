@extends('layout.main')
@section('breadcrumb',$breadcrumb)
@section('content')

    <div class="row">
        <div class="col-md-2">
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
                    <li><a href="{{ url('blog_detail/'.$row->id) }}"> {{ substr($row->title,0,20) }}</a></li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-10">
            <h2 class=""> {{ $data->title  }}
                <small>{{ '&emsp;'.$data->subtitle  }}</small>
            </h2>
            <small><span class="fa fa-clock-o">&nbsp;Created at &nbsp;</span>{{ $data->created_at->diffForHumans() }}</small>

            <p>{!! $data->body !!} </p>
        </div>
    </div>
@endsection