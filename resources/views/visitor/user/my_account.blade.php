@extends('layout.main')
@section('breadcrumb',$breadcrumb)
@section('content')
    <h3>Change Password</h3>
    <div class="row">
        <div class="col-md-4 col-sm-6 col-md-offset-4">
            {!! Form::open(array('url'=>'change_password','class'=>'form-horizontal')) !!}
           <div class="form-group">
               {{ Form::label('old_password', 'Old Password') }}
               {!! Form::password('old_password', ['class'=>'form-control','placeholder'=>'Old Password']) !!}
            </div>
          <div class="form-group">
            {{ Form::label('new_password', 'New Password') }}
            {{ Form::password('new_password',['class'=>'form-control','placeholder'=>'New Password']) }}
          </div>
        <div class="form-group">
          {!! Form::label('password_confirmation', 'Confirmation Password') !!}
          {!! Form::password('password_confirmation', ['class'=>'form-control','placeholder'=>'Confirmmation Password']) !!}
        </div>
        <div class="form-group">
            {{ Form::submit('Save',['class'=>'btn btn-primary']) }}
        </div>

            {!! Form::Close() !!}
        </div>

    </div>

@stop