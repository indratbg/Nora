@extends('layout.main')
@section('breadcrumb',$breadcrumb)
@section('content')
    <h3>Change Password</h3>
    <div class="row">
        <div class="col-md-4 col-sm-6 col-md-offset-4">
            {{-- <form class="form-horizontal" action="{{ url('change_password')}}" method="post">
                 <div class="form-group">
                     <input type="password" name="old_password" class="form-control" placeholder="Old Password">
                 </div>
                 <div class="form-group">
                     <input type="password" name="new password" class="form-control" placeholder="New Password">
                 </div>
                 <div class="form-group">
                     <input type="password" name="conform_password" class="form-control"
                            placeholder="Confirmation New Password">
                 </div>
                 <div class="form-group">
                     <input type="submit" value="Change" class="btn btn-primary">
                 </div>

             </form>--}}
            {!! Form::open(array('url'=>'change_password','class'=>'form-horizontal')) !!}
           <div class="form-group">
               {{ Form::label('email', 'E-Mail Address') }}
               {{ Form::password('old_password',null,array('class'=>'form-control')) }}
               {{ Form::password('new_password',null,array('class'=>'form-control')) }}
               {{ Form::submit('Save') }}

           </div>
            {!! Form::Close() !!}
        </div>

    </div>

@stop
@include('layout.script')