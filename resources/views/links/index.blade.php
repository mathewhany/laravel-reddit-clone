@extends('app')

@section('content')
	@forelse ($links as $link)
		<article class="link">
			<div class="title">{{ $link->title }}</div>
			<div class="url">{{ $link->url }}</div>
		</article>
	@empty
		<div class="alert alert-info">No links, yet!</div>		
	@endforelse
@stop