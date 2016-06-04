@extends('layout.main')
@section('breadcrumb',$breadcrumb)
@section('slinder')
    @include('visitor.home.slide')
@stop

@section('content')

    <hr class="divided"/>
    <legend>New Product</legend>
    @include('visitor.home.newProduct')
    <legend>Testimonial</legend>
    @include('visitor.home.testimo')
    {{--@include('visitor.home.subscribe')--}}
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $('#subscribe_modal').modal('show');
        })
    </script>
@stop
