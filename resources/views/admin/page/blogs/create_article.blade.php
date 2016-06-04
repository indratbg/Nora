@extends('admin.layout.admin_template')
@section('content')
@include('errors.error')
{!! Form::open(['url'=>'admin/create_article','role'=>'form']) !!}
@include('admin.page.blogs._form', ['btnText' => 'Posting'])
{!! Form::close() !!}
@stop
