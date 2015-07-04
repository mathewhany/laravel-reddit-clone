@extends('app')

@section('content')
	<article class="link">
		<div class="title">{{ $link->title }}</div>
		<div class="url">{{ $link->url }}</div>
		{!! Form::open(['route' => ['links.destroy', $link->id], 'method' => 'delete']) !!}
			{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
		{!! Form::close() !!}
	</article>
@stop