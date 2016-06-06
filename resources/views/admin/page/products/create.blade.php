@extends('admin.layout.admin_template')
@section('content')
@include('errors.error')
{!! Form::open(['url'=>'admin/create_product','files'=>true,'class'=>'form-horizontal']) !!}
	@include('admin.page.products._form', [ 'btnText'=> 'Save'])
{!! Form::close() !!}
@stop
