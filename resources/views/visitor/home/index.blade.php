@extends('layout.main')
@section('breadcrumb',$breadcrumb)
@section('content')

    @include('visitor.home.slide')

    <hr class="divided"/>
    <legend>New Product</legend>
    <div class="row">
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <img src="{{ asset('img/product/necklace/clothing1.jpg') }}"
                     class="img-thumbnail" alt="Necklace1">

                <div class="caption">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Necklace 001</h3>
                        </div>
                        <div class="panel-body">
                            <h3 class="text-center">Only IDR 70.000</h3>
                            <button class="btn btn-danger btn-block">BUY</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <img src="{{ asset('img/product/necklace/clothing1.jpg') }}" class="img-thumbnail" alt="Necklace2">

                <div class="caption">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Necklace 002</h3>
                        </div>
                        <div class="panel-body">
                            <p align="justify">A beautiful necklace make you confidance anyware and everyware</p>

                            <h3 class="text-center">Only IDR 70.000</h3>
                            <button class="btn btn-danger btn-block">BUY</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <img src="{{ asset('img/product/necklace/clothing1.jpg') }}"
                     class="img-thumbnail" alt="Necklace3">

                <div class="caption">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Clothing 001</h3>
                        </div>
                        <div class="panel-body">
                            <p align="justify">A beautiful clothing make you confidance anyware and everyware</p>

                            <h3 class="text-center">Only IDR 70.000</h3>
                            <button class="btn btn-danger btn-block">BUY</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <legend>Testimonial</legend>

    @include('visitor.home.testimo')



@endsection
