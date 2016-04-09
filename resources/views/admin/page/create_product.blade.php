@extends('admin.layout.admin_template')

@section('content')

    <form class="form-horizontal" action="{{ url('admin/create_product') }}" method="post"
          enctype="multipart/form-data">
        {!! csrf_field() !!}
        <div class="form-group <?php if ($errors->has('product_name')) echo 'has-error' ?>">
            <label for="inputProductName" class="col-sm-2 control-label">Product Name</label>

            <div class="col-sm-5">
                <input type="text" class="form-control" name="product_name" value="{{ old('product_name') }}"
                       placeholder="Product Name">
                @if ($errors->has('product_name'))
                    <span class="help-block">
                <strong>{{ $errors->first('product_name') }}</strong>
            </span>
                @endif
            </div>
        </div>
        <div class="form-group <?php if ($errors->has('post_date_from')) echo 'has-error' ?>">
            <label for="inputPost_date_from" class="col-sm-2 control-label">From Date</label>

            <div class="col-sm-5">
                <input type="text" class="datepicker form-control" name="post_date_from"
                       value="{{ old('post_date_from') }}" placeholder="dd/mm/yyyy">
                @if ($errors->has('post_date_from'))
                    <span class="help-block">
                <strong>{{ $errors->first('post_date_from') }}</strong>
            </span>
                @endif
            </div>
        </div>
        <div class="form-group <?php if ($errors->has('post_date_to')) echo 'has-error' ?>">
            <label for="inputPost_date_to" class="col-sm-2 control-label">To Date</label>

            <div class="col-sm-5">
                <input type="text" class="datepicker form-control" name="post_date_to" value="{{ old('post_date_to') }}"
                       placeholder="dd/mm/yyyy">
                @if ($errors->has('post_date_to'))
                    <span class="help-block">
                <strong>{{ $errors->first('post_date_to') }}</strong>
            </span>
                @endif
            </div>
        </div>
        <div class="form-group <?php if ($errors->has('category')) echo 'has-error' ?>">
            <label for="category" class="col-sm-2 control-label">Category</label>

            <div class="col-sm-5">
                <select name="category" class="form-control">
                    <option value="" @if(old('category')=='')selected="selected" @endif >--Select--</option>
                    @foreach($category_cd as $row )
                        <option value="{{ $row->category_id2 }}" @if(old('category')==$row->category_id2 )selected="selected" @endif >{{ Ucfirst($row->category_name) }}</option>
                    @endforeach
                </select>
                @if ($errors->has('category'))
                    <span class="help-block">
                <strong>{{ $errors->first('category') }}</strong>
            </span>
                @endif
            </div>

        </div>
        <div class="form-group <?php if ($errors->has('description')) echo 'has-error' ?>">
            <label for="category" class="col-sm-2 control-label">Description</label>

            <div class="col-sm-5">
                <textarea class="form-control" name="description">{{ old('description')}}</textarea>
                @if ($errors->has('description'))
                    <span class="help-block">
                <strong>{{ $errors->first('description') }}</strong>
            </span>
                @endif
            </div>
        </div>
        <div class="form-group <?php if ($errors->has('price')) echo 'has-error' ?>">
            <label for="inputPrice" class="col-sm-2 control-label">Price</label>

            <div class="col-sm-5">
                <input type="number" class="form-control" name="price" value="{{ old('price') }}" placeholder="Price">
                @if ($errors->has('price'))
                    <span class="help-block">
                <strong>{{ $errors->first('price') }}</strong>
            </span>
                @endif
            </div>
        </div>
        <div class="form-group <?php if ($errors->has('stock')) echo 'has-error' ?>">
            <label for="inputPrice" class="col-sm-2 control-label">Stock</label>

            <div class="col-sm-5">
                <input type="number" class="form-control" name="stock" value="{{ old('stock') }}" placeholder="Stock">
                @if ($errors->has('stock'))
                    <span class="help-block">
                <strong>{{ $errors->first('stock') }}</strong>
            </span>
                @endif
            </div>
        </div>
        <div class="form-group <?php if ($errors->has('status')) echo 'has-error' ?>">
            <label for="inputstatus" class="col-sm-2 control-label">Status</label>

            <div class="col-sm-5">
                <select name="status" class="form-control">
                    <option value="" @if(old('status')=='')selected="selected" @endif >--Select--</option>
                    <option value="active" @if(old('status')=='active')selected="selected" @endif >Active</option>
                    <option value="inactive" @if(old('status')=='inactive')selected="selected" @endif >Inactive</option>
                </select>
                @if ($errors->has('status'))
                    <span class="help-block">
                <strong>{{ $errors->first('status') }}</strong>
            </span>
                @endif
            </div>
        </div>
        <div class="form-group <?php if ($errors->has('file')) echo 'has-error' ?>">
            <label for="inputPrice" class="col-sm-2 control-label">Picture</label>

            <div class="col-sm-5">


                <input type="file" accept="image/png, image/jpeg, image/gif" name="image[]" class="btn btn-github"
                       multiple>

                @if ($errors->has('file'))
                    <span class="help-block">
                <strong>{{ $errors->first('file') }}</strong>
            </span>
                @endif
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-2"></div>
            <div class="col-sm-5">
                <input type="submit" value="Save" class="btn btn-primary"/>
            </div>
        </div>

    </form>

@endsection