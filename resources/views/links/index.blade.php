@extends('app')

@section('content')
	@if (Auth::check())
		{!! link_to_route('links.create', 'Create new one?', [], ['class' => 'btn btn-default center-block']) !!}
	@endif
	<h1>All links</h1>
	@forelse ($links as $link)
		<article class="link">
			<div class="title">
				<a href="{{ $link->url }}">{{ $link->title }}</a>
				<div class="label label-success">{{ $link->url }}</div>
			</div>
			@if ($link->user_id == Auth::id())
				<div class="control-buttons">
					{!! link_to_route('links.edit', 'Edit', [$link->id], ['class' => 'btn btn-primary']) !!}
					{!! Form::open(['route' => ['links.destroy', $link->id], 'method' => 'delete']) !!}
						{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
					{!! Form::close() !!}
				</div>
			@endif
			<div class="clearfix"></div>
			<div class="details">
				By <div class="user">{{ $link->user->name }}</div> at <div class="time">{{ $link->created_at->diffForHumans() }}</div>
			</div>
		</article>
	@empty
		<div class="alert alert-info">No links, yet!</div>		
	@endforelse
@stop