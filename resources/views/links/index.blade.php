@extends('app')

@section('content')
	<h1>All links</h1>
	@forelse ($links as $link)
		<div class="link" id="link-{{ $link->id }}">@include('links._show')</div>
	@empty
		<div class="alert alert-info">No links, yet!</div>		
	@endforelse
@stop