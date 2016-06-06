
<?php 

$optionsArray = array();
$option = App\Category::whereCategory_id1("product")->orderBy('category_name', 'asc')->get();
foreach ($option as $row) {
	$optionsArray[$row->category_id2] =$row->category_name;
}
?>


<div class="row-fluid">
<div class="form-group {{ $errors->has('id_product')?'has-error':'' }}"> 
{!! Form::label('id_product', 'ID Product',['class'=>'col-md-2 col-sm-3 control-label']) !!}
<div class="col-lg-3 col-md-3 col-sm-6"> 
{!! Form::text('id_product', null, ['class'=>'form-control']) !!}
</div>
</div>
<div class="form-group "> 
{!! Form::label('post_date_from', 'From Date',['class'=>'col-md-2 col-sm-3 col-xs-3 control-label']) !!}
<div class="col-md-3 col-sm-3 col-xs-3 {{ $errors->has('post_date_from')?'has-error':'' }}" >
{!! Form::text('post_date_from',null, ['class'=>'form-control datepicker','placeholder'=>'dd/mm/yyyy']) !!}
</div>
{!! Form::label('post_date_to', 'Post Date To',['class'=>'col-md-2 col-sm-3 col-xs-3 control-label']) !!}
<div class="col-md-3 col-sm-3 col-xs-3 {{ $errors->has('post_date_to')?'has-error':'' }}" >
{!! Form::text('post_date_to',null, ['class'=>'form-control datepicker','placeholder'=>'dd/mm/yyyy']) !!}
</div>
</div>

<div class="form-group {{ $errors->has('category')?'has-error':'' }}"> 
{!! Form::label('category', 'Category',['class'=>'col-md-2 col-sm-3 col-xs-3 control-label']) !!}
<div class="col-md-3 col-sm-3"> 
{!! Form::select('category',$optionsArray, null,['class'=>'form-control','placeholder'=>'-Select-']) !!}
</div>
</div>
<div class="form-group {{ $errors->has('product_name')?'has-error':'' }} "> 
{!! Form::label('product_name', 'Product Name',['class'=>'col-md-2 col-sm-3 control-label']) !!}
<div class="col-md-10 col-sm-9"> 
{!! Form::text('product_name',null, ['class'=>'form-control']) !!}
</div>
</div>
<div class="form-group {{ $errors->has('description')?'has-error':'' }}"> 
{!! Form::label('description', 'Description',['class'=>'col-md-2 col-sm-3 control-label']) !!}
<div class="col-md-10 col-sm-9"> 
{!! Form::textarea('description', null, ['class'=>'form-control ckeditor','rows'=>'3']) !!}
</div>
</div>
<div class="form-group {{ $errors->has('price')?'has-error':'' }}"> 
{!! Form::label('price', 'Price',['class'=>'col-md-2 col-sm-3 control-label']) !!}
<div class="col-md-3 col-sm-6"> 
{!! Form::number('price', null, ['class'=>'form-control']) !!}
</div>
</div>
<div class="form-group {{ $errors->has('discount_perc')?'has-error':'' }}"> 
{!! Form::label('discount_perc', 'Discount',['class'=>'col-md-2 col-sm-3 control-label']) !!}
<div class="col-md-3 col-sm-6"> 
{!! Form::text('discount_perc', null, ['class'=>'form-control']) !!}
</div>
</div>
<div class="form-group {{ $errors->has('new_price')?'has-error':'' }}"> 
{!! Form::label('new_price', 'New Price',['class'=>'col-md-2 col-sm-3 control-label']) !!}
<div class="col-md-3 col-sm-6"> 
{!! Form::number('new_price', null, ['class'=>'form-control','readonly'=>'readonly']) !!}
</div>
</div>
<div class="form-group {{ $errors->has('stock')?'has-error':'' }}"> 
{!! Form::label('stock', 'Stock',['class'=>'col-md-2 col-sm-3 control-label']) !!}
<div class="col-md-3 col-sm-6"> 
{!! Form::number('stock', null, ['class'=>'form-control']) !!}
</div>
</div>
<div class="form-group {{ $errors->has('on_order')?'has-error':'' }}"> 
{!! Form::label('on_order', 'On Order',['class'=>'col-md-2 col-sm-3 control-label']) !!}
<div class="col-md-3 col-sm-6"> 
{!! Form::number('on_order', null, ['class'=>'form-control','readonly'=>'readonly']) !!}
</div>
</div>
<div class="form-group {{ $errors->has('status')?'has-error':'' }}"> 
{!! Form::label('status', 'Status',['class'=>'col-md-2 col-sm-3 control-label']) !!}
<div class="col-md-3 col-sm-6"> 
{!! Form::select('status', array('active'=>'Active','inactive'=>'Inactive'), 'active', ['class'=>'form-control','placeholder'=>'-Select-']) !!}
</div>
</div>
<div class="form-group {{ $errors->has('file')?'has-error':'' }}">
{!! Form::label('image', 'Picture',['class'=>'col-md-2 col-sm-3 control-label'] ) !!}
<div class="col-md-3 col-sm-6"> 
{!! Form::file('image[]', ['class'=>'btn btn-github ','accept'=>'image/png, image/jpeg, image/gif']) !!}
</div>
</div>
<div class="form-group">
 <div class="col-md-offset-2 col-sm-offset-3 col-sm-10 ">
{!! Form::submit($btnText, ['class'=>'btn btn-success']) !!}
</div>
</div>

</div>
@section('script')
<script>

$("[name=discount_perc]").change(function(){
	 cek_discount();
});

function cek_discount()
{
	var price = $("[name=price]").val();
	var new_price = parseInt(price)- ((parseInt(price) * $("[name=discount_perc]").val())/100);
$("[name=new_price]").val(parseInt(new_price));
}
</script>
@stop