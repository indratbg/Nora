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
            <h2 class=""> {{ $data->title  }}
                <small>{{ '&emsp;'.$data->subtitle  }}</small>
            </h2>
            <small>{{ "Create at : " .$data->created_at }}</small>
            <p>{!! $data->body !!} </p>
        </div>
    </div>
@endsection