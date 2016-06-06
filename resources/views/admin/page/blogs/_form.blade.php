<?php 
$optionsArray = array();
$option = App\Category::whereCategory_id1("article")->orderBy('category_name', 'asc')->get();
foreach ($option as $row) {
	$optionsArray[$row->category_id2] =$row->category_name;
}
?>

{!! Form::hidden('id', null, []) !!}
<div class="form-group {{ $errors->has('title')?'has-error':'' }}">
{!! Form::label('title', 'Title') !!}
{!! Form::text('title', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group {{ $errors->has('subtitle')?'has-error':'' }}">
{!! Form::label('subtitle', 'Sub Title') !!}
{!! Form::text('subtitle', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group {{ $errors->has('category')?'has-error':'' }}"> 
{!! Form::label('category', 'Category') !!}
{!! Form::select('category',$optionsArray, null,['class'=>'form-control','placeholder'=>'-Select-']) !!}
</div>
<div class="form-group {{ $errors->has('post_at')?'has-error':'' }}"> 
{!! Form::label('post_at', 'Post At') !!}
{!! Form::text('post_at', date('d/m/Y'), ['class'=>'form-control datepicker']) !!}
</div>
<div class="form-group {{ $errors->has('body')?'has-error':'' }}">
{!! Form::label('body', 'Text') !!}
{!! Form::textarea('body', null, ['class'=>'form-control ckeditor']) !!}
</div>
<div class="form-group {{ $errors->has('status')?'has-error':'' }}"> 
{!! Form::label('status', 'Status') !!}
{!! Form::select('status', array('active'=>'Active','inactive'=>'Inactive'), 'active', ['class'=>'form-control','placeholder'=>'-Select-']) !!}
</div>

<div class="form-group">
{!! Form::submit($btnText, ['class'=>'btn btn-success']) !!}
</div>