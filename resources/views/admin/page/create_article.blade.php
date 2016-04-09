@extends('admin.layout.admin_template')

@section('content')


<form class="form-horizontal" action="{{ url('admin/create_article') }}" method="post" enctype="multipart/form-data">
 {!! csrf_field() !!}
	<div class="form-group <?php if ($errors->has('title'))echo  'has-error' ?>">
		<!-- <label for="inputProductName" class="col-sm-2 control-label">Title</label> -->
		<div class="col-sm-5">
		<input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="Title">
		   @if ($errors->has('title'))
            <span class="help-block">
                <strong>{{ $errors->first('title') }}</strong>
            </span>
       		@endif
		</div>
	</div>
	<div class="form-group <?php if ($errors->has('subtitle'))echo  'has-error' ?>">
		<!-- <label for="inputsubtitle" class="col-sm-2 control-label">Sub Title</label> -->
		<div class="col-sm-5">
		<input type="text" class="form-control" name="subtitle" value="{{ old('subtitle') }}" placeholder="Sub Title">
		   @if ($errors->has('subtitle'))
            <span class="help-block">
                <strong>{{ $errors->first('subtitle') }}</strong>
            </span>
       		@endif
		</div>
	</div>

	<div class="form-group <?php if ($errors->has('category'))echo  'has-error' ?>">
		<!-- <label for="category" class="col-sm-2 control-label">Category</label> -->
		<div class="col-sm-5">
		<select name="category" class="form-control">
		  		<option value="" @if(old('category')=='')selected="selected" @endif >--Select Category--</option>
                <option value="0" @if(old('category')=='0')selected="selected" @endif >Accesories</option>
                <option value="1" @if(old('category')=='1')selected="selected" @endif >Clothes</option>
        </select>
         @if ($errors->has('category'))
            <span class="help-block">
                <strong>{{ $errors->first('category') }}</strong>
            </span>
       	@endif
		</div>
		
	</div>


	<div class="form-group <?php if ($errors->has('body'))echo  'has-error' ?>">
		<!-- <label for="category" class="col-sm-2 control-label">Description</label> -->
		<div class="col-sm-10">
		<textarea class="form-control ckeditor" name="body" >{{ old('body')}}</textarea>
		  @if ($errors->has('body'))
            <span class="help-block">
                <strong>{{ $errors->first('body') }}</strong>
            </span>
       	@endif
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-2"></div>
		<div class="col-sm-5">
			<input type="submit" value="Save" class="btn btn-primary btn-block" />
		</div>
</form>

@endsection