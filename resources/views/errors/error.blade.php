@if (count($errors)>0)
<div class="alert alert-dismissible alert-danger">
<button type="button" class="close" data-dismiss="alert">&times;</button>
@foreach ($errors->all() as $message) 
    	<li>{{ $message }}</li>
@endforeach
 </div>
@endif

