@extends('layouts.master')

@section('content')

@if ( $errors->count() > 0 )
<div class="alert alert-danger">
<p>The following errors have occurred:</p>

<ul>
    @foreach( $errors->all() as $message )
    <li>{{ $message }}</li>
    @endforeach
</ul>
</div>
@endif

<h2 class="form-signin-heading">Please Login</h2>

{{ Form::open(array('url'=>'user/signin', 'class'=>'form-horizontal')) }}
<div class='form-group'>
	{{Form::label('username', 'Username: ', array('class'=>'col-sm-2 control-label')) }}
	<div class='col-sm-4'>
		{{ Form::text('username', null, array('class'=>'form-control', 'placeholder'=>'Username (try: admin)', 'required'=>'true')) }}
	</div>	
</div>
<div class='form-group'>
	{{Form::label('password', 'Password: ', array('class'=>'col-sm-2 control-label')) }}
	<div class='col-sm-4'>
		{{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password (try: letmein)', 'required'=>'true')) }}
	</div>	
</div>
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-4">
        {{ Form::submit('Login', array('class'=>'btn btn-large btn-primary')) }}
    </div>
</div>    
{{ Form::close() }}

@stop