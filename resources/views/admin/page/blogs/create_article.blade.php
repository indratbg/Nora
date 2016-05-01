@extends('admin.layout.admin_template')

@section('content')


    <form class="form-horizontal" action="{{ url('admin/create_article') }}" method="post"
          enctype="multipart/form-data">
        {!! csrf_field() !!}
        <div class="form-group <?php if ($errors->has('title')) echo 'has-error' ?>">
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
        <div class="form-group <?php if ($errors->has('subtitle')) echo 'has-error' ?>">
            <!-- <label for="inputsubtitle" class="col-sm-2 control-label">Sub Title</label> -->
            <div class="col-sm-5">
                <input type="text" class="form-control" name="subtitle" value="{{ old('subtitle') }}"
                       placeholder="Sub Title">
                @if ($errors->has('subtitle'))
                    <span class="help-block">
                <strong>{{ $errors->first('subtitle') }}</strong>
            </span>
                @endif
            </div>
        </div>

        <div class="form-group <?php if ($errors->has('category')) echo 'has-error' ?>">
            <!-- <label for="category" class="col-sm-2 control-label">Category</label> -->
            <div class="col-sm-5">
                <select name="category" class="form-control">
                    <option value="" @if(old('category')=='')selected="selected" @endif >--Select Category--</option>
                    @foreach($category_cd as $row )
                        <option value="{{ $row->category_id2 }}"
                                @if(old('category')==$row->category_id2 )selected="selected" @endif >{{ Ucfirst($row->category_name) }}</option>
                    @endforeach
                </select>
                @if ($errors->has('category'))
                    <span class="help-block">
                <strong>{{ $errors->first('category') }}</strong>
            </span>
                @endif
            </div>

        </div>
        <div class="form-group <?php if ($errors->has('post_at')) echo 'has-error' ?>">
            <div class="col-sm-1">
                <label for="post_at">Post At</label>
            </div>

            <div class="col-sm-2">
                <input type="text" class="form-control datepicker" name="post_at" value="{{ old('post_at') }}"
                       placeholder="dd/mm/yyyy">
                @if ($errors->has('post_at'))
                    <span class="help-block">
                <strong>{{ $errors->first('post_at') }}</strong>
            </span>
                @endif
            </div>
        </div>

        <div class="form-group <?php if ($errors->has('body')) echo 'has-error' ?>">
            <div class="col-sm-10">
                <textarea class="form-control ckeditor" name="body">{{ old('body')}}</textarea>
                @if ($errors->has('body'))
                    <span class="help-block">
                <strong>{{ $errors->first('body') }}</strong>
            </span>
                @endif
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-5">
                <input type="submit" value="Save" class="btn btn-success"/>
            </div>
    </form>

@endsection
@include('admin.layout.script')