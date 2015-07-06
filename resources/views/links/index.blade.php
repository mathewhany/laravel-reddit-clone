@extends('app')

@section('content')
	@if (Auth::check())
		{!! link_to_route('links.create', 'Create new one?', [], ['class' => 'btn btn-default center-block']) !!}
	@endif
	<h1>All links</h1>
	@forelse ($links as $link)
		<article class="link">
			<div class="row">
				<div class="col-lg-1">
					<div class="vote-count">{{ $link->voteCount }}</div>
				</div>
				<div class="col-lg-11">
					<div class="row">
						<div class="col-lg-7">
							<div class="title">
								<a href="{{ $link->url }}">{{ $link->title }}</a>
								<div class="label label-success">{{ $link->url }}</div>
							</div>
						</div>
						<div class="col-lg-5">
							@if (Auth::check())
								<div class="control-buttons">
									@if (Auth::user()->own($link))
										{!! link_to_route('links.edit', 'Edit', [$link->id], ['class' => 'btn btn-primary']) !!}
										{!! Form::open(['route' => ['links.destroy', $link->id], 'method' => 'delete']) !!}
											{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
										{!! Form::close() !!}
									@else
										@if ($value = Auth::user()->getVotingValue($link))
											<label>
												You had voted	
												@if ($value === 1)
													up
												@elseif ($value === -1)
													down
												@endif
												...
											</label>
											{!! link_to_action(
												'VoteController@undoVote', 
												'Undo vote?', 
												[$link->id], 
												['class' => 'btn btn-danger']
											) !!}
										@else
											<div class="btn-group">
												{!! link_to_action(
													'VoteController@voteUp', 
													'Vote up', 
													[$link->id], 
													['class' => 'btn btn-default']
												) !!}
												{!! link_to_action(
													'VoteController@voteDown', 
													'Vote down', 
													[$link->id], 
													['class' => 'btn btn-default']
												) !!}
											</div>
										@endif
									@endif
								</div>
							@endif
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<div class="details">
								By
								<div class="user">{{ $link->user->name }}</div>
								about
								<div class="time">{{ $link->created_at->diffForHumans() }}</div>.
							</div>			
						</div>
					</div>
				</div>
			</div>
		</article>
	@empty
		<div class="alert alert-info">No links, yet!</div>		
	@endforelse
@stop