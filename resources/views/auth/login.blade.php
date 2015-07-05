@extends('app')

@section('content')
	<h1>Login</h1>
	{!! Form::open(['url' => '/auth/login', 'method' => 'post']) !!}
		<div class="form-group">
			{!! Form::label('email', 'E-mail') !!}
			{!! Form::email('email', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('password', 'Password') !!}
			{!! Form::password('password', ['class' => 'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::submit('Login', ['class' => 'btn btn-primary']) !!}
		</div>
	{!! Form::close() !!}
@stop