@extends('app')

@section('content')
	{!! Form::model($link, ['route' => ['links.update', $link->id], 'method' => 'put']) !!}
		@include('links._form')
	{!! Form::close() !!}
@stop