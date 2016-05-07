@extends('layout.main')
@section('breadcrumb',$breadcrumb)
@section('content')
    @include('visitor.home.slide')
    <hr class="divided"/>
    <legend>New Product</legend>
    @include('visitor.home.newProduct')
    <legend>Testimonial</legend>
    @include('visitor.home.testimo')
    {{--@include('visitor.home.subscribe')--}}
@endsection
@include('layout.script')
<script>
    $(document).ready(function () {
        $('#subscribe_modal').modal('show');
    })
</script>
