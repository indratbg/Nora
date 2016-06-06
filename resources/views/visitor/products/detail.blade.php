@extends('layout.main')

@section('breadcrumb',Ucfirst($breadcrumb))
@section('content')
    <div class="row">
        <div class="col-md-8">
            <legend>{{ $data->product_name }}</legend>
            {{--Image Product--}}
            <ul class="slide_product">
                @foreach($images as $image)
                    <li>
                        <img class="img-responsive" src="{!! asset('storage/app/public/product/'.$image->filename) !!}"
                             alt="{{ $image->title }}"
                             data-description="{{ $image->desc }}">
                    </li>
                @endforeach
            </ul>
        <!-- Descriprion -->
        <br/>
<div role="tabpanel">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active">
            <a href="#desc" aria-controls="desc" role="tab" data-toggle="tab">Description</a>
        </li>
        <li role="presentation">
            <a href="#feedback" aria-controls="feedback" role="tab" data-toggle="tab">Feedback <span class="badge">9</span></a>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="desc">{!! $data->description !!}</div>
        <div role="tabpanel" class="tab-pane" id="feedback">
        <br/>
            {!! Form::open(['url'=>'feedback/'.$data->id_product]) !!}
                <div class="form-group input-group">
                    <span class="input-group-addon">
                    <i class="glyphicon glyphicon-user"></i>
                    </span>
                    {!! Form::text('username', null, ['class'=>'form-control','placeholder'=>'Name']) !!}
                </div>
                 <div class="form-group input-group">
                    <span class="input-group-addon">
                    <i class="glyphicon glyphicon-envelope"></i>
                    </span>
                    {!! Form::email('email', null, ['class'=>'form-control','placeholder'=>'Email']) !!}
                </div>
                <div class="form-group">
                    {!! Form::text('subject', null, ['class'=>'form-control','placeholder'=>'Subject']) !!}
                </div>
                <div class="form-group">
                    {!! Form::textarea('body', null, ['class'=>'form-control','rows'=>3]) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Submit', ['class'=>'btn btn-danger']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

        </div>
        <div class="col-md-4">
            <legend>Detail Product</legend>
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <label>Price</label>
                </div>
                 <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <label>{{ number_format($data->price,0,',','.') }}</label>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <label>Discount</label>
                </div>
                 <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <label>{{ number_format($data->discount_perc,0,',','.') }}</label>
                </div>
            </div>   
             <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <label>New Price</label>
                </div>
                 <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <label>{{ number_format($data->new_price,0,',','.') }}</label>
                </div>
            </div>    
            {!! Form::open(['url'=>'order_product','class'=>'form-horizontal','role'=>'form']) !!}
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <label>Quantity</label>
                </div>
                 <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    {!! Form::number('qty', 1, ['class'=>'form-control input-sm']) !!}
                </div>
            </div> 
            <div class="row">
                 <div class="col-md-4 col-sm-4 col-xs-6">
                 <br/>
                {!! Form::submit('Buy', ['class'=>'btn btn-block btn-primary ']) !!}
                </div>
            </div>    
            {!! Form::close() !!}


        </div>
</div>
<!-- END DETAIL -->
@endsection
@section('script')

    <script>
        $(document).ready(function () {
            $('.slide_product').pgwSlideshow({
                transitionEffect: 'fading',
                maxHeight: '300px'
            });
        });
    </script>
@stop