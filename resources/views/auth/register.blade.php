@extends('app')

@section('content')
	<h1>Login</h1>
	{!! Form::open(['url' => '/auth/register', 'method' => 'post']) !!}
		<div class="form-group">
			{!! Form::label('name', 'Name') !!}
			{!! Form::text('name', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('email', 'E-mail') !!}
			{!! Form::email('email', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('password', 'Password') !!}
			{!! Form::password('password', ['class' => 'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('password_confirmation', 'Confirm Password') !!}
			{!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::submit('Register', ['class' => 'btn btn-primary']) !!}
		</div>
	{!! Form::close() !!}
@stop