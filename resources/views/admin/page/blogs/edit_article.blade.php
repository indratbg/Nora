@extends('admin.layout.admin_template')
@section('content')
@include('errors.error')
{!! Form::model($data, ['url'=>'admin/update_article/'.$data->id]) !!}
@include('admin.page.blogs._form', ['btnText' => 'Update'])
{!! Form::close() !!}
@stop
