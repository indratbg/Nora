
<?php 

$optionsArray = array();
$option = App\Category::whereCategory_id1("product")->orderBy('category_name', 'asc')->get();
foreach ($option as $row) {
	$optionsArray[$row->category_id2] =$row->category_name;
}
?>
<div class="form-group {{ $errors->has('id_product')?'has-error':'' }}"> 
{!! Form::label('id_product', 'ID Product') !!}
{!! Form::text('id_product', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group {{ $errors->has('post_date_from')?'has-error':'' }}"> 
{!! Form::label('post_date_from', 'Post Date From') !!}
{!! Form::text('post_date_from',date('d/m/Y'), ['class'=>'form-control datepicker']) !!}
</div>
<div class="form-group {{ $errors->has('post_date_to')?'has-error':'' }}"> 
{!! Form::label('post_date_to', 'Post Date To') !!}
{!! Form::text('post_date_to',date('d/m/Y'), ['class'=>'form-control datepicker']) !!}
</div>
<div class="form-group {{ $errors->has('category')?'has-error':'' }}"> 
{!! Form::label('category', 'Category') !!}
{!! Form::select('category',$optionsArray, null,['class'=>'form-control','placeholder'=>'-Select-']) !!}
</div>
<div class="form-group {{ $errors->has('product_name')?'has-error':'' }} "> 
{!! Form::label('product_name', 'Product Name') !!}
{!! Form::text('product_name',null, ['class'=>'form-control']) !!}
</div>
<div class="form-group {{ $errors->has('description')?'has-error':'' }}"> 
{!! Form::label('description', 'Description') !!}
{!! Form::textarea('description', null, ['class'=>'form-control ckeditor','rows'=>'3']) !!}
</div>
<div class="form-group {{ $errors->has('price')?'has-error':'' }}"> 
{!! Form::label('price', 'Price') !!}
{!! Form::number('price', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group {{ $errors->has('dicount_perc')?'has-error':'' }}"> 
{!! Form::label('dicount_perc', 'Discount') !!}
{!! Form::text('dicount_perc', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group {{ $errors->has('new_price')?'has-error':'' }}"> 
{!! Form::label('new_price', 'New Price') !!}
{!! Form::number('new_price', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group {{ $errors->has('stock')?'has-error':'' }}"> 
{!! Form::label('stock', 'Stock') !!}
{!! Form::number('stock', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group {{ $errors->has('on_order')?'has-error':'' }}"> 
{!! Form::label('on_order', 'On Order') !!}
{!! Form::number('on_order', null, ['class'=>'form-control','readonly'=>'readonly']) !!}
</div>
<div class="form-group {{ $errors->has('status')?'has-error':'' }}"> 
{!! Form::label('status', 'Status') !!}
{!! Form::select('status', array('active'=>'Active','inactive'=>'Inactive'), 'active', ['class'=>'form-control','placeholder'=>'-Select-']) !!}
</div>
<div class="form-group {{ $errors->has('file')?'has-error':'' }}">
{!! Form::file('image[]', ['class'=>'btn btn-github','accept'=>'image/png, image/jpeg, image/gif']) !!}
</div>
<div class="form-group">
{!! Form::submit($btnText, ['class'=>'btn btn-success']) !!}
</div>

