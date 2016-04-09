<style>
    .slide {
        width: 100%;
        height: 400px !important;
    }

    .carousel-inner {
        width: 100%;
        height: 400px !important;
    }

    /* Carousel */

    #quote-carousel {
        padding: 0 10px 30px 10px;
        margin-top: 30px;
        /* Control buttons  */
        /* Previous button  */
        /* Next button  */
        /* Changes the position of the indicators */
        /* Changes the color of the indicators */
    }
    #quote-carousel .carousel-control {
        background: none;
        color: #CACACA;
        font-size: 2.3em;
        text-shadow: none;
        margin-top: 30px;
    }
    #quote-carousel .carousel-control.left {
        left: -60px;
    }
    #quote-carousel .carousel-control.right {
        right: -60px;
    }
    #quote-carousel .carousel-indicators {
        right: 50%;
        top: auto;
        bottom: 0px;
        margin-right: -19px;
    }
    #quote-carousel .carousel-indicators li {
        width: 50px;
        height: 50px;
        margin: 5px;
        cursor: pointer;
        border: 4px solid #CCC;
        border-radius: 50px;
        opacity: 0.4;
        overflow: hidden;
        transition: all 0.4s;
    }
    #quote-carousel .carousel-indicators .active {
        background: #333333;
        width: 128px;
        height: 128px;
        border-radius: 100px;
        border-color: #f33;
        opacity: 1;
        overflow: hidden;
    }
    .carousel-inner {
        min-height: 300px;
    }
    .item blockquote {
        border-left: none;
        margin: 0;
    }
    .item blockquote p:before {
        content: "\f10d";
        font-family: 'Fontawesome';
        float: left;
        margin-right: 10px;
    }

</style>
@extends('layout.main')
@section('breadcrumb',$breadcrumb)
@section('content')
   

        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="{{ asset('img/slide/slide1.jpg') }}" class="slide" alt="Necklace Black Roll">

                    <div class="carousel-caption">
                        <h2>Necklace Black Roll</h2>
                    </div>
                </div>
                <div class="item">
                    <img src="{{ asset('img/slide/slide2.jpg') }}" class="slide"
                         alt="Gold Necklace">

                    <div class="carousel-caption">
                        <h2>Gold Necklace</h2>
                    </div>
                </div>
                <div class="item">
                    <img src="{{ asset('img/slide/slide3.jpg') }}" class="slide"
                         alt="Stainless Necklace">
                    <div class="carousel-caption">
                        <h2>Stainless Necklace</h2>
                    </div>
                </div>
                <div class="item">
                    <img src="{{ asset('img/slide/slide4.jpg') }}" class="slide"
                         alt="Stainless Necklace">
                    <div class="carousel-caption">
                        <h2>East Necklace</h2>
                    </div>
                </div>
                <div class="item">
                    <img src="{{ asset('img/slide/slide5.jpg') }}" class="slide"
                         alt="Stainless Necklace">
                    <div class="carousel-caption">
                        <h2>Model of Necklace</h2>
                    </div>
                </div>
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
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

        <div class="row">
            <div class="col-md-12" data-wow-delay="0.1s">
                <div class="carousel slide" data-ride="carousel" id="quote-carousel">
                    <!-- Bottom Carousel Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#quote-carousel" data-slide-to="0" class="active">
                            <img class="img-responsive " src="{{ asset('img/testimonial/128.png') }}" alt="">
                        </li>
                        <li data-target="#quote-carousel" data-slide-to="1">
                            <img class="img-responsive" src="{{ asset('img/testimonial/129.png') }}" alt="">
                        </li>
                        <li data-target="#quote-carousel" data-slide-to="2">
                            <img class="img-responsive" src="{{ asset('img/testimonial/130.png') }}" alt="">
                        </li>
                        <li data-target="#quote-carousel" data-slide-to="3">
                            <img class="img-responsive" src="{{ asset('img/testimonial/130.png') }}" alt="">
                        </li>
                    </ol>

                    <!-- Carousel Slides / Quotes -->
                    <div class="carousel-inner text-center">

                        <!-- Quote 1 -->
                        <div class="item active">
                            <blockquote>
                                <div class="row">
                                    <div class="col-sm-8 col-sm-offset-2">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. !</p>
                                        <small>Someone famous</small>
                                    </div>
                                </div>
                            </blockquote>
                        </div>
                        <!-- Quote 2 -->
                        <div class="item">
                            <blockquote>
                                <div class="row">
                                    <div class="col-sm-8 col-sm-offset-2">

                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
                                        <small>Someone famous</small>
                                    </div>
                                </div>
                            </blockquote>
                        </div>
                        <!-- Quote 3 -->
                        <div class="item">
                            <blockquote>
                                <div class="row">
                                    <div class="col-sm-8 col-sm-offset-2">

                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. .</p>
                                        <small>Someone famous</small>
                                    </div>
                                </div>
                            </blockquote>
                        </div>
                        <!-- Quote 4 -->
                        <div class="item">
                            <blockquote>
                                <div class="row">
                                    <div class="col-sm-8 col-sm-offset-2">

                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. .</p>
                                        <small>Someone famous</small>
                                    </div>
                                </div>
                            </blockquote>
                        </div>
                    </div>

                    <!-- Carousel Buttons Next/Prev -->
                    <a data-slide="prev" href="#quote-carousel" class="left carousel-control"><i class="fa fa-chevron-left"></i></a>
                    <a data-slide="next" href="#quote-carousel" class="right carousel-control"><i class="fa fa-chevron-right"></i></a>
                </div>
            </div>
        </div>



@endsection
