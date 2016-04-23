@extends('layout.main')
@section('breadcrumb',$breadcrumb)
@section('content')


   <div class="row">
       <div class="col-md-2">
           <h4>Categories</h4>

           <button class="btn btn-primary" type="button">
               Product 1 <span class="badge">4</span>
           </button>

       </div>
       <div class="col-md-10">
           <div class="row">
               <div class="col-sm-6 col-md-4">
                   <div class="thumbnail">
                       <img src="{{ asset('img/product/necklace/necklace1.jpg')}}" alt="Necklace">
                       <div class="caption">
                           <h3>Necklace 001R</h3>
                           <p>...</p>
                           <p><a href="#" class="btn btn-primary" role="button">Buy</a> <a href="#" class="btn btn-default" role="button">Make Wish</a></p>
                       </div>
                   </div>
               </div>
               <div class="col-sm-6 col-md-4">
                   <div class="thumbnail">
                       <img src="{{ asset('img/product/necklace/necklace1.jpg')}}" alt="Necklace">
                       <div class="caption">
                           <h3>Necklace 002R</h3>
                           <p>...</p>
                           <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
                       </div>
                   </div>
               </div>
               <div class="col-sm-6 col-md-4">
                   <div class="thumbnail">
                       <img src="{{ asset('img/product/necklace/necklace1.jpg')}}" alt="Necklace">
                       <div class="caption">
                           <h3>Necklace 003R</h3>
                           <p>...</p>
                           <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
                       </div>
                   </div>
               </div>
       </div>
   </div>
@endsection