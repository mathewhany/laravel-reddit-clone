@extends('app')

@section('content')
	{!! link_to_route('links.create', 'Create new one?', [], ['class' => 'btn btn-default center-block']) !!}
	<h1>All links</h1>
	@forelse ($links as $link)
		<article class="link">
			<h2 class="title"><a href="{{ $link->url }}">{{ $link->title }}</a></h2>
			<div class="url">{{ $link->url }}</div>
				<div class="control-buttons">
				{!! link_to_route('links.edit', 'Edit', [$link->id], ['class' => 'btn btn-primary']) !!}
				{!! Form::open(['route' => ['links.destroy', $link->id], 'method' => 'delete']) !!}
					{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
				{!! Form::close() !!}
			</div>
		</article>
	@empty
		<div class="alert alert-info">No links, yet!</div>		
	@endforelse
@stop