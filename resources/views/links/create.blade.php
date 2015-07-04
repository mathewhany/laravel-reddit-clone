@extends('app')

@section('content')
	<h1>Create a link</h1>
	{!! Form::model($link, ['route' => 'links.store', 'method' => 'post']) !!}
		@include('links._form')
	{!! Form::close() !!}
@stop